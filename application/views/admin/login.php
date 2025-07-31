<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RPA | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="<?= asset('/js/app.js') ?>" defer></script>

    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="32x32">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('vendor/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/select2/css/select2-bootstrap4.min.css') ?>">

    <!-- Styles -->
    <link href="<?= asset('/css/app.css') ?>" rel="stylesheet">
    <link href="<?= asset('/css/style.css') ?>" rel="stylesheet">
    <style type="text/css">
      @font-face {
          font-family: cjfont !important;
          src: url('<?= asset("font/cjfont.ttf") ?>') !important; 
      }

      .pass {
        font-family: "Nunito Sans", sans-serif;
        /* font-weight: bold; */
      }

      .pass::placeholder {
        font-family: cjfont !important;
      }
      .myFont {
        font-size: 14px;
      }
      .select2-container--bootstrap4 .select2-results__option {
          font-size: 11px;
      }
      .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
          font-size: 11px !important;
      }
      .select2-container--bootstrap4 .select2-selection--single .select2-selection__placeholder {
          line-height: calc(2.2em + .75rem);
          color: #6c757d;
      }
      .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
          line-height: calc(2.2em + .75rem);
      }
    </style>
  </head>
  <body class="body-auth">
    <div id="app">
        <main>
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="card _card">
                          <div class="card-body">
                              <center>
                                  <img src="<?= asset('/img/logo.png') ?>"
                                      style="width: 200px; object-fit: cover; text-align: center; margin-bottom: 10px">
                              </center>

                              <h2 style="text-align: center; margin-bottom: 5px">SIGN IN</h2>
                              <h2 style="text-align: center; font-size: 14px; font-weight: 700">GENERATE QR</h2>
                              <form method="POST" action="<?= route('login') ?>">
                                <?php if ($this->session->flashdata('alert')): ?>
                                  <div class="invalid-feedback" role="alert" style="display: block !important;">
                                      <strong><?= $this->session->flashdata('alert') ?></strong>
                                  </div>
                                <?php unset($_SESSION['alert']); endif ?>
                                <!-- <div class="row mb-3">
                                  <div class="col-12">
                                    <label for="company" class="col-form-label text-md-end">Company</label>
                                    <select id="company" class="form-control" style="width: 100%;" name="company" required>
                                      <option></option>
                                      <option value="FEED">- PT. CJ FEED & CARE INDONESIA -</option>
                                      <option value="SUJA">- PT. SUPER UNGGAS JAYA -</option>
                                    </select>
                                  </div>
                                </div> -->

                                <div class="row mb-3">
                                  <div class="col-12">
                                    <label for="employee_id" class="col-form-label text-md-end">User ID</label>
                                    <input name="employee_id"
                                        class="form-control pass"
                                        id="input_login_employee_id" type="text" placeholder="Employee ID">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                      <div class="row">
                                          <div class="col-12">
                                              <label for="password" class="col-form-label text-md-end">Password</label>
                                          </div>
                                      </div>
                                      <input id="password" type="password"
                                          class="form-control pass" name="password"
                                          required autocomplete="current-password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-sign">SIGN IN</button>
                                    </div>
                                </div>
                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
        </main>
    </div>

</body>
<script src="<?= asset('js/jquery.min.js') ?>"></script>
<script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
<script>
   $('#company').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- CHOOSE COMPANY -",
        // allowClear: true,
        dropdownCssClass: "myFont" 
    });
</script>
</html>