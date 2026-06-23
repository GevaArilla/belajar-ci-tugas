<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransactionModel; 
use App\Models\TransactionDetailModel; 

class TransaksiController extends BaseController
{
    // Helper dan properti utama class
    protected $helpers = ['number', 'form']; 
    protected $cart;
    protected $client; 
    protected $apiKey; 
    protected $transaction; 
    protected $transaction_detail; 

    public function __construct()
    {
        $this->cart = service('cart');
        $this->client = new \GuzzleHttp\Client(); 
        $this->apiKey = env('COST_KEY'); 
        $this->transaction=new TransactionModel(); 
        $this->transaction_detail=new TransactionDetailModel();
    }

    public function index()
    {  
        $data = [
            'items' => $this->cart->contents(),
            'total' => $this->cart->total()  
        ];

        return view('v_keranjang', $data);
    }

    public function home()
    {
        $productModel = new \App\Models\ProductModel(); 
        $data['product'] = $productModel->findAll();

        return view('v_home', $data);
    }

    public function cart_add()
    {
        $this->cart->insert([
            'id'      => $this->request->getPost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('harga'),
            'name'    => $this->request->getPost('nama'),
            'options' => [
                'foto' => $this->request->getPost('foto')
            ]
        ]);
        
        session()->setFlashdata(
            'success',
            'Produk berhasil ditambahkan ke keranjang. <a href="' . base_url('keranjang') . '">Lihat</a>'
        );
        
        return redirect()->to(base_url('/'));
    }

    public function cart_edit()
    {
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $qty = $this->request->getPost('qty' . $i++);

            $this->cart->update([
                'rowid' => $item['rowid'],
                'qty'   => $qty
            ]);
        }

        session()->setFlashdata(
            'success',
            'Keranjang berhasil diperbarui'
        );

        return redirect()->to(base_url('keranjang'));
    }

    public function cart_delete($rowid)
    {
        $this->cart->remove($rowid);

        session()->setFlashdata(
            'success',
            'Produk berhasil dihapus dari keranjang'
        );

        return redirect()->to(base_url('keranjang'));
    }

    public function cart_clear()
    {
        $this->cart->destroy();

        session()->setFlashdata(
            'success',
            'Keranjang berhasil dikosongkan'
        );

        return redirect()->to(base_url('keranjang'));
    }

    public function checkout() 
    {   
        $data['items'] = $this->cart->contents(); 
        $data['total'] = $this->cart->total(); 
        return view('v_checkout', $data); 
    }

    public function getLocation() 
    { 
        $search = $this->request->getGet('search'); 
        if (empty($search)) {
            return $this->response->setJSON([]);
        }
        $url = 'https://rajaongkir.komerce.id/api/v1/destination/domestic-destination?search=' . urlencode($search) . '&limit=50';

        $response = $this->client->request( 
            'GET',  
            $url, [ 
                'headers' => [ 
                    'accept' => 'application/json', 
                    'key'    => $this->apiKey, 
                ], 
            ] 
        ); 
        $body = json_decode($response->getBody(), true);  
        $rawData = $body['data'] ?? [];

        // Langsung kirim data asli dari API Komerce ke JavaScript
        return $this->response->setJSON($rawData); 
    }
     
    public function getCost()
    {
        $destination = $this->request->getGet('destination');
     
        $url = 'https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost';

        $response = $this->client->request( 
            'POST',  
            $url, [ 
                'multipart' => [ 
                    [ 
                        'name' => 'origin', 
                        'contents' => '64999' 
                    ], 
                    [ 
                        'name' => 'destination', 
                        'contents' => $destination 
                    ], 
                    [ 
                        'name' => 'weight', 
                        'contents' => '1000' 
                    ], 
                    [ 
                        'name' => 'courier', 
                        'contents' => 'jne' 
                    ] 
                ], 
                'headers' => [ 
                    'accept' => 'application/json', 
                    'key'    => $this->apiKey, 
                ], 
            ] 
        ); 
     
        $body = json_decode($response->getBody(), true);  
        return $this->response->setJSON($body['data'] ?? []); 
    } 
    public function buy() 
{ 
    if ($this->request->getPost()) {  
        $dataForm = [ 
            'username' => $this->request->getPost('username'), 
            'total_harga' => $this->request->getPost('total_harga'), 
            'alamat' => $this->request->getPost('alamat'), 
            'ongkir' => $this->request->getPost('ongkir'), 
            'status' => 0, 
            'created_at' => date("Y-m-d H:i:s"), 
            'updated_at' => date("Y-m-d H:i:s") 
        ]; 
 
        $this->transaction->insert($dataForm); 
 
        $last_insert_id = $this->transaction->getInsertID(); 
 
        foreach ($this->cart->contents() as $value) { 
            $dataFormDetail = [ 
                'transaction_id' => $last_insert_id, 
                'product_id' => $value['id'], 
                'jumlah' => $value['qty'], 
                'diskon' => 0, 
                'subtotal_harga' => $value['qty'] * $value['price'], 
                'created_at' => date("Y-m-d H:i:s"), 
                'updated_at' => date("Y-m-d H:i:s") 
            ]; 
 
            $this->transaction_detail->insert($dataFormDetail); 
        } 
 
        $this->cart->destroy(); 
  
        return redirect()->to(base_url()); 
    } 
} 
} // <-- Kurung penutup class TransaksiController yang benar di paling bawah