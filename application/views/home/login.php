<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= $judul ?> | UMGO EVENT</title>
  <link rel="icon" type="image/x-icon" href="<?=base_url('assets/')?>logouniv.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/fonts/boxicons.css" /> -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/demo.css" />
  <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/css/pages/page-auth.css" />
  <script src="<?=base_url('assets/')?>vendor/js/helpers.js"></script>
  <script src="<?=base_url('assets/')?>js/config.js"></script>
  
  <script src="<?=base_url('assets/')?>vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/libs/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body>
  <?= $this->session->flashdata('pesan') ?>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="<?= base_url() ?>" class="gap-2 d-flex align-items-center">
                <img src="<?= base_url('assets/logouniv.png') ?>" alt="UMGO" style="width:20%;">
                <span class="text-body fw-bolder h1 my-0">UMGO EVENT</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Selamat datang! 👋</h4>
            <p class="mb-4">Silahkan login untuk masuk pada sistem UMGO Event</p>

            <form class="mb-3" action="" method="POST">
              <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="Username" placeholder="Silahkan masukkan username" />
              </div>
              <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="Password" placeholder="Silahkan masukkan password" />
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
              <div class="mb-3">
                <a href="<?= base_url('index.php/presensi') ?>" class="btn btn-success d-grid w-100">
                  Presensi
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?=base_url('assets/')?>vendor/libs/popper/popper.js"></script>
  <script src="<?=base_url('assets/')?>vendor/js/bootstrap.js"></script>
  <script src="<?=base_url('assets/')?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="<?=base_url('assets/')?>vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="<?=base_url('assets/')?>js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
