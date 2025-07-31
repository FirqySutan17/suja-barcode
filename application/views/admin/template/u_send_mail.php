<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eDMS | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url() ?>assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url() ?>assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/favicon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/style-admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <style type="text/css">
      body{
        font-family: 'Montserrat', sans-serif;
        
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    <!-- <div class="blobBox" style="width: 100%; position: fixed">
      <img src="<?= base_url('assets/img/blob/blob-1.png') ?>" alt="">
      <img src="<?= base_url('assets/img/blob/blob-2.png') ?>" alt="">
      <img src="<?= base_url('assets/img/blob/blob-3.png') ?>" alt="">
      <img src="<?= base_url('assets/img/blob/blob-4.png') ?>" alt="">
      <img src="<?= base_url('assets/img/blob/blob-5.png') ?>" alt="">
      <img src="<?= base_url('assets/img/blob/blob-6.png') ?>" alt="">
      <img src="<?= base_url('assets/img/blob/blob-7.png') ?>" alt="">
    </div> -->
    <div class="login-box">
      <div class="login-logo">
        <img src="<?= base_url('assets/img/cj-logo.png') ?>" class="img-fluid">
      </div>
      <div class="card">
      <br>&nbsp;&nbsp;

        <div class="card-body login-card-body">
          <?php if ($this->session->flashdata('alert')): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $this->session->flashdata('alert') ?>
            </div>
          <?php endif ?>

            <div class="row">
                <div class="col-12">
                  <h4>Please check your email for reset password</h4>
                  <a href="<?php echo base_url() ?>login_dashboard" class="btn-back">BACK</a>
                </div>
            </div>
         
        </div>
      </div>
    </div>
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

  </body>
</html>