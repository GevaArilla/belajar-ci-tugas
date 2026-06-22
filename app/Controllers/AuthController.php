<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel; 

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return redirect()->to(base_url('login'));
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $username = trim($this->request->getVar('username'));
            $password = $this->request->getVar('password');

            // MURNI CARI USER BERDASARKAN USERNAME DI DATABASE
            $dataUser = $this->userModel->where(['username' => $username])->first();

            if ($dataUser) {
                // Mencocokkan password ketikan dengan password Bcrypt di database ($2y$10$)
                if (password_verify($password, $dataUser['password'])) {
                    
                    // Jika password cocok, daftarkan session berdasarkan data database asli
                    session()->set([
                        'username'   => $dataUser['username'],
                        'role'       => $dataUser['role'], // Otomatis bernilai 'admin' atau 'guest' dari DB
                        'isLoggedIn' => TRUE
                    ]);
                    
                    return redirect()->to(base_url('/'));
                } else {
                    // Jika user ada tapi password salah
                    session()->setFlashdata('failed', 'Username atau Password Salah');
                    return redirect()->back();
                }
            } else {
                // Jika username tidak terdaftar sama sekali di database
                session()->setFlashdata('failed', 'Username Tidak Terdaftar');
                return redirect()->back();
            }
        }

        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}