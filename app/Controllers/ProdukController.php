<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Dompdf\Dompdf;
class ProdukController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        helper('form');
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // Mengambil data dan melemparkannya ke view produk/index
        $data['products'] = $this->productModel->findAll();
        return view('produk/index', $data);
    }

    public function create() 
    {
        // 1. Ambil file foto dari form input
        $dataFoto = $this->request->getFile('foto');
        
        // Logika acak nama file jika ada foto yang diunggah
        if ($dataFoto && $dataFoto->isValid() && ! $dataFoto->hasMoved()) {
            $namaFoto = $dataFoto->getRandomName();
            $dataFoto->move('img/', $namaFoto);
        } else {
            $namaFoto = ''; // Kosongkan jika tidak upload foto
        }

        // 2. Ambil semua data teks dari form input secara lengkap
        $dataForm = [
            'nama'   => $this->request->getPost('nama'),
            'harga'  => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'foto'   => $namaFoto
        ];
        
        // 3. Simpan data tersebut ke Database menggunakan Model
        $simpan = $this->productModel->insert($dataForm);
        
        // 4. Kembalikan (Redirect) ke halaman utama produk dengan membawa pesan info
        if ($simpan) {
            return redirect()->to(base_url('produk'))->with('success', 'Data produk berhasil disimpan!');
        } else {
            return redirect()->to(base_url('produk'))->with('failed', 'Gagal menyimpan data ke database.');
        }
    } 
    public function edit($id)
{
    $dataProduk = $this->productModel->find($id);

    $dataForm = [
        'nama' => $this->request->getPost('nama'),
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah') 
    ];

    if ($this->request->getPost('check') == 1) {
        if ($dataProduk['foto'] != '' and file_exists("img/" . $dataProduk['foto'] . "")) {
            unlink("img/" . $dataProduk['foto']);
        }

        $dataFoto = $this->request->getFile('foto');

        if ($dataFoto->isValid()) {
            $fileName = $dataFoto->getRandomName();
            $dataFoto->move('img/', $fileName);
            
            $dataForm['foto'] = $fileName;
        }
    }

    $this->productModel->update($id, $dataForm);

    return redirect('produk')->with('success', 'Data Berhasil Diubah');
}

public function delete($id)
{
    $dataProduk = $this->productModel->find($id);
    $this->productModel->delete($id);

    return redirect('produk')->with('success', 'Data Berhasil Dihapus');
}
public function download()
{
    // Ambil data produk dari database
    $products = $this->productModel->findAll();

    // Render view menjadi HTML
    $html = view('produk/download_pdf', [
        'products' => $products
    ]);

    // Nama file PDF
    $filename = date('Y-m-d-H-i-s') . '-produk.pdf';

    // Inisialisasi Dompdf
    $dompdf = new Dompdf();

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Setting ukuran kertas dan orientasi
    $dompdf->setPaper('A4', 'portrait');

    // Generate PDF
    $dompdf->render();

    // Download / tampilkan PDF
    $dompdf->stream($filename, [
        'Attachment' => true
    ]);
}


} // Penutup kelas ProdukController paling bawah