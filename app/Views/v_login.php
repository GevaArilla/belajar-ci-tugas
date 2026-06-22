<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
        <?php
$username = [
  'name'        => 'username',
  'id'          => 'username',
  'class'       => 'form-control',
  'required'    => 'required', // Diubah menjadi string 'required'
  'minlength'   => '6'
];

$password = [
  'name'        => 'password',
  'id'          => 'password',
  'class'       => 'form-control',
  'required'    => 'required', // Diubah menjadi string 'required'
  'minlength'   => '7'
];
?>
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                  <img src="<?php echo base_url() ?>NiceAdmin/assets/img/logo.png" alt="">
<span class="d-none d-lg-block">Warung Geva</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <?php
if (session()->getFlashData('failed')) {
?>
    <div class="col-12 alert alert-danger" role="alert">
        <hr>
        <p class="mb-0">
            <?= session()->getFlashData('failed') ?>
        </p>
    </div>
<?php
}
?>

<?= form_open('login', 'class = "row g-3 needs-validation"') ?>

<div class="col-12">
    <label for="yourUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <?= form_input($username) ?>
        <div class="invalid-feedback">Please enter your username.</div>
    </div>
</div>

<div class="col-12">
    <label for="yourPassword" class="form-label">Password</label>
		    <?= form_password($password) ?>
    <div class="invalid-feedback">Please enter your password!</div>
</div>
<div class="col-12">
    <?= form_submit('submit', 'Login', ['class' => 'btn btn-primary w-100']) ?>
</div>

<?= form_close() ?>



                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>
<link href="<?= base_url()?>NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?= base_url()?>NiceAdmin/assets/css/style.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">

<style>
  /* 1. Mengubah seluruh font menjadi bulat/gelembung */
  body, h1, h2, h3, h4, h5, h6, p, span, input, button {
    font-family: 'Fredoka', sans-serif !important;
  }

  /* 2. Mengubah Background Utama menjadi Pink Lucu (dengan gradasi lembut) */
  body {
    background: linear-gradient(135deg, #ffe3ec 0%, #ffccd5 100%) !important;
    background-attachment: fixed;
  }

  /* Mengubah judul "NiceAdmin Warung Geva" menjadi pink cerah & font gelembung */
  .logo span, 
  h1.logo, 
  .card-title,
  h5.card-title {
    font-family: 'Fredoka', sans-serif !important;
    color: #ff5c8a !important; /* Warna pink cerah yang gemas */
    font-weight: 600 !important;
    font-size: 28px !important; /* Ukuran bisa disesuaikan */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05); /* Efek bayangan halus agar lebih timbul */
  }


  /* 4. Mengubah Warna Tombol Login menjadi Lebih Cerah & Menggemaskan */
  .btn-primary, button[type="submit"], .btn-pink {
    background-color: #ff758f !important; /* Pink cerah */
    border-color: #ff758f !important;
    color: white !important;
    font-weight: 600;
    border-radius: 8px; /* Sudut lebih melengkung */
    transition: all 0.3s ease;
  }

  /* Efek saat tombol di-hover (disorot mouse) */
  .btn-primary:hover, button[type="submit"]:hover {
    background-color: #ff4d6d !important; /* Menjadi sedikit lebih tua saat disentuh */
    border-color: #ff4d6d !important;
    transform: scale(1.02); /* Efek membal sedikit */
  }

  /* 5. Opsional: Mengubah warna icon '@' di kolom username */
  .input-group-text {
    background-color: #fff0f3 !important;
    color: #ff758f !important;
    border-color: #ced4da;
  }


</style>
</head>

