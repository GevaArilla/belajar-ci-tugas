<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Rute untuk Autentikasi (Login & Logout)
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// 2. Rute Utama dan Fitur yang Wajib Login (Menggunakan Filter Auth)
$routes->group('', ['filter' => 'auth'], function ($routes) {
     
    // Halaman utama (/) menampilkan Grid Kartu Belanja
    $routes->get('/', 'TransaksiController::home'); 
     
    // Fitur Manajemen Produk (Admin)
    $routes->get('produk', 'ProdukController::index');
    $routes->post('produk/create', 'ProdukController::create');
    $routes->post('produk/edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('produk/delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('produk/download', 'ProdukController::download');
     
    // Grup Fitur Keranjang
    $routes->group('keranjang', function ($routes) {
        $routes->get('', 'TransaksiController::index');
        $routes->post('', 'TransaksiController::cart_add');
        $routes->post('edit', 'TransaksiController::cart_edit');
        $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
        $routes->get('clear', 'TransaksiController::cart_clear');
    });

    // Rute utama transaksi & AJAX (Dikeluarkan dari grup keranjang agar URL-nya singkat)
    $routes->get('checkout', 'TransaksiController::checkout'); 
    $routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);
    $routes->get('get-location', 'TransaksiController::getLocation'); 
    $routes->get('get-cost', 'TransaksiController::getCost');

}); // Penutup filter auth utama
