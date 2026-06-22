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
    
    // PERBAIKAN 1: Halaman utama (/) sekarang diarahkan ke TransaksiController atau HomeController yang menampilkan Grid Kartu Belanja
    $routes->get('/', 'TransaksiController::home'); 
    
    // Fitur Manajemen Produk (Tetap menampilkan tabel pink admin)
    $routes->get('produk', 'ProdukController::index');
    $routes->post('produk/create', 'ProdukController::create');
    $routes->post('produk/edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('produk/delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('produk/download', 'ProdukController::download');
    
    // Grup Fitur Keranjang / Transaksi
    $routes->group('keranjang', function ($routes) {
        $routes->get('', 'TransaksiController::index');
        $routes->post('', 'TransaksiController::cart_add');
        $routes->post('edit', 'TransaksiController::cart_edit');
        $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
        $routes->get('clear', 'TransaksiController::cart_clear');
    });
});