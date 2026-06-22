<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
<a href="<?= base_url() ?>" class="logo d-flex align-items-center">
<img src="/NiceAdmin/assets/img/logo.jpg" alt="Logo Warung Geva" style="max-height: 50px;">

  
  <span class="d-none d-lg-block">Warung Geva</span>
</a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
</head>


<body>
<div class="aksen-imut aksen-kiri-atas">✨</div>
<div class="aksen-imut aksen-kanan-atas">🌸</div>
<div class="aksen-imut aksen-kiri-bawah">☁️</div>
<div class="aksen-imut aksen-kanan-bawah">⭐</div>
</body>


<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="<?= base_url()?>NiceAdmin/assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="<?= base_url()?>NiceAdmin/assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="<?= base_url()?>NiceAdmin/assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?= base_url()?>NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('username'); ?> (<?= session()->get('role'); ?>)</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Kevin Anderson</h6>
          <span>Web Designer</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

<style>
/* Mengubah background utama menjadi bingkai imut */
body {
    background-image: url('<?= base_url("/NiceAdmin/assets/img/frame-kawaii.jpg") ?>') !important;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    min-height: 100vh;
    font-family: var(--font-imut);
    background-color: #fff5f7 !important;
}

/* Membuat area konten utama agak transparan agar bingkai terlihat */
#main {
    background-color: rgba(255, 255, 255, 0.85) !important;
    border-radius: 30px;
    margin: 20px;
    padding: 20px;
}

  
  :root {
    --pink-muda: #ffeaee;
    --pink-sedang: #ffcad4;
    --pink-tua: #f080a0;
    --font-imut: 'Fredoka', sans-serif;
  }

  


  /* Membuat Card/Kotak Data jadi bulat dan imut */
  .card {
    border-radius: 25px !important;
    border: 3px solid var(--pink-muda) !important;
    box-shadow: 8px 8px 0px var(--pink-muda); /* Efek bayangan kartun */
  }

  /* Mengubah Header Tabel */
  .table thead th {
    background-color: var(--pink-sedang) !important;
    color: white !important;
    border-radius: 15px 15px 0 0;
  }

  /* Membuat Button/Tombol jadi seperti permen */
  .btn {
    border-radius: 50px !important;
    font-weight: 600;
    transition: 0.3s;
  }

  .btn-primary {
    background-color: var(--pink-tua) !important;
    border: none;
  }

  .btn-primary:hover {
    transform: scale(1.1); /* Efek membesar saat disentuh */
    background-color: #ff4d6d !important;
  }

  /* Sidebar Bergaya Bubble */
  .sidebar-nav .nav-link {
    border-radius: 15px;
    margin: 5px 10px;
    color: var(--pink-tua) !important;
  }

  .sidebar-nav .nav-link.active {
    background-color: var(--pink-muda) !important;
    border: 2px dashed var(--pink-tua);
  }

  /* Logo Warung Geva */
  .logo span {
    font-family: var(--font-imut);
    font-size: 24px;
    color: var(--pink-tua) !important;
    text-shadow: 2px 2px white;
  }
  /* Pengaturan Umum untuk Semua Stiker */
.aksen-imut {
    position: fixed; /* Menggunakan fixed agar posisi tetap di pojok meskipun halaman di-scroll */
    font-size: 40px; /* Ukuran stiker agar terlihat jelas */
    opacity: 0.6;    /* Membuat stiker agak transparan (kalem, tidak menutupi teks) */
    z-index: 9999;   /* Memastikan stiker berada di lapisan paling atas */
    pointer-events: none; /* Agar stiker tidak bisa diklik dan tidak mengganggu tombol di bawahnya */
    animation: goyangImut 3s ease-in-out infinite; /* Efek animasi bergerak lembut */
}

/* Mengatur Posisi di Masing-Masing Pojok Layar */
.aksen-kiri-atas {
    top: 70px;    /* Diturunkan sedikit agar tidak menutupi header utama NiceAdmin */
    left: 20px;
}

.aksen-kanan-atas {
    top: 70px;
    right: 40px;
}

.aksen-kiri-bawah {
    bottom: 20px;
    left: 20px;
}

.aksen-kanan-bawah {
    bottom: 20px;
    right: 40px;
}

/* Animasi Tambahan agar Stikernya Bergerak Naik Turun Secara Lucu */
@keyframes goyangImut {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-10px) rotate(10deg); /* Bergerak ke atas 10px dan sedikit miring */
    }
}
#main {
  /* Berikan jarak atas minimal 80px sampai 100px tergantung tinggi header Anda */
  padding-top: 90px !important; 
}

@media (max-width: 1199px) {
  /* 1. Paksa Sidebar untuk selalu tampil di kiri dan tidak menyembunyikan diri */
  .sidebar {
    left: 0 !important;
  }

  /* 2. Geser Konten Utama ke kanan agar TIDAK tertimpa oleh sidebar */
  #main, #footer {
    margin-left: 300px !important; /* Sesuaikan dengan lebar sidebar NiceAdmin Anda (biasanya 300px) */
  }

  /* 3. Geser Header atas agar sejajar dengan konten */
  .header {
    left: 300px !important;
    width: calc(100% - 300px) !important;
  }
}

/* Mengunci layout agar sidebar dan konten utama selalu berdampingan secara permanen */

/* 1. Atur Sidebar agar selalu menetap di sisi kiri */
.sidebar {
  position: fixed;
  top: 60px; /* Sesuaikan dengan tinggi header Anda */
  left: 0 !important;
  width: 300px;
  height: calc(100vh - 60px);
  z-index: 996;
  transition: none !important; /* Matikan animasi geser yang merusak layout */
}

/* 2. Paksa Konten Utama untuk selalu bergeser ke kanan sejauh 300px */
#main, #footer {
  margin-left: 300px !important;
  transition: none !important;
}

/* 3. Sesuaikan Header atas agar tidak menusuk ke dalam area sidebar */
.header {
  left: 0 !important;
  z-index: 997;
}

/* 4. Memunculkan kembali tombol garis 3 dan mengubah warnanya menjadi pink cerah */
.toggle-sidebar-btn {
  display: block !important; /* Memunculkan kembali tombol */
  color: #ff6584 !important;  /* Warna pink muda cerah */
  font-size: 26px !important; /* Mengatur ukuran agar pas dan terlihat jelas */
  cursor: pointer;
  transition: all 0.3s ease;
  margin-right: 15px;        /* Memberi jarak manis dengan kotak Search */

}

/* Pastikan tombol garis 3 berada di lapisan paling atas agar bisa diklik */
.toggle-sidebar-btn {
  display: block !important;
  color: #ff6584 !important;
  font-size: 26px !important;
  cursor: pointer;
  position: relative;
  z-index: 9999 !important; /* Memaksa tombol di posisi paling atas */
}

/* KONDISI 1: Saat Sidebar Terbuka (Normal) */
body:not(.toggle-sidebar) .sidebar {
  left: 0 !important;
}
body:not(.toggle-sidebar) #main, 
body:not(.toggle-sidebar) #footer {
  margin-left: 300px !important;
}

/* KONDISI 2: Saat Tombol Diklik (Sidebar Menutup / Tersembunyi) */
body.toggle-sidebar .sidebar {
  left: -300px !important;
}
body.toggle-sidebar #main, 
body.toggle-sidebar #footer {
  margin-left: 0 !important;
}

/* Transisi halus saat sidebar bergeser */
.sidebar, #main, #footer {
  transition: all 0.3s ease !important;
}

/* 5.  Efek gemas saat tombol disentuh mouse (hover) */
.toggle-sidebar-btn:hover {
  color: #ff3b60 !important;  /* Pink sedikit lebih tua saat di-hover */
  transform: scale(1.1);      /* Efek sedikit membesar agar interaktif */
}

/* 6. Antisipasi jika di layar HP/Tablet kontennya menjadi terlalu sempit */
@media (max-width: 768px) {
  #main {
    padding: 10px !important;
  }
}

/* 1. Ambil font lucu/gelembung dari Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap');

/* 2. Ubah font & warna teks untuk seluruh area konten utama (#main) */
#main, 
#main h1, 
#main h2, 
#main h3, 
#main h4, 
#main h5, 
#main h6, 
#main p, 
#main span, 
#main div,
.breadcrumb-item,
.breadcrumb-item a {
  font-family: 'Fredoka', sans-serif !important;
  color: #ff6584 !important; /* Warna pink muda yang cerah, ceria, dan tetap terbaca jelas */
}

/* 3. Khusus untuk link breadcrumb (Home / Produk) agar saat diarahkan mouse warnanya sedikit berubah cantik */
.breadcrumb-item a:hover {
  color: #ff3b60 !important; /* Pink yang sedikit lebih tua saat di-hover */
}

/* 4. Opsional: Membuat background kartu (card) di dalamnya memiliki sedikit aksen pink transparan yang estetik */
#main .card {
  background-color: rgba(255, 240, 243, 0.9) !important; /* Putih agak pink lembut */
  border: 1px solid #ffccd5 !important;
  border-radius: 15px !important; /* Sudut melengkung lucu */
}

</style>

</header><!-- End Header -->