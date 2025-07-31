<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CJ Feed and Care">
    <meta name="keywords" content="CJ Feed and Care">
    <meta name="author" content="Cheiljedang Indonesia ">
    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="32x32">


    <title>Generate Code - PT. Super Unggas Jaya</title>

    <!-- Scripts -->
    <script src="<?= asset('js/app.js') ?>" defer></script>

    <!-- Font Awesome -->
    <link href="<?= asset('vendor/css/fontawesome.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/css/brands.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/css/solid.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/w3.css') ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= asset('vendor/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/select2/css/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/display.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/w3.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/Ionicons/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/dist/css/AdminLTE.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/dist/css/skins/_all-skins.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/datatables.net-bs/css/buttons.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/lightbox2/dist/css/lightbox.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <link href="<?= asset('css/style-master.css') ?>" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .btn-newicon svg {
            margin-top: -2px;
            margin-right: 5px;
        }

        @font-face {
            font-family: cjfont;
            src: url('<?= asset("font/cjfont.ttf") ?>');
        }

        .nav-dash,
        .slider {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            background-color: #ffffff;
            text-align: center;
            padding: 0 2em;
            height: 80vh;
        }

        .nav-dash h1,
        .slider h1 {
            font-family: cjfont;
            font-size: 2vw;
            margin: 0;
            padding-bottom: 0.5rem;
            letter-spacing: 0.5rem;
            color: #04302c;
            transition: all 0.3s ease;
            z-index: 3;
            margin-bottom: 20px
        }

        h1:hover {
            transform: translate3d(0, -10px, 22px);
            color: #ee141e;
        }

        .nav-dash h2,
        .slider h2 {
            font-size: 2vw;
            letter-spacing: 0.5rem;
            font-family: "ROBOTO", sans-serif;
            font-weight: 300;
            color: #ff9600;
            z-index: 4;
        }

        .nav-dash a {
            text-decoration: none;
            z-index: 10;
            background: #000;
            border: 1px solid transparent;
            color: #fff;
            font-size: 18px;
            padding: 10px 70px;
            border-radius: 10px;
            font-family: cjfont;
            transition: all 0.5s ease;
        }

        .nav-dash a:hover {
            background: transparent;
            border: 1px solid #000;
            color: #000;
        }

        .nav-dash-container {
            display: flex;
            flex-direction: row;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 75px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            background: #1e1f26;
            z-index: 10;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .nav-dash-container--top-first {
            position: fixed;
            top: 75px;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .nav-dash-container--top-second {
            position: fixed;
            top: 0;
        }

        .nav-dash-container--top-second {
            position: fixed;
            top: 0;
        }

        .nav-dash-tab {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            color: #03dac6;
            letter-spacing: 0.1rem;
            transition: all 0.5s ease;
            font-size: 2vw;
        }

        .nav-dash-tab:hover {
            color: #1e1f26;
            background: #03dac6;
            transition: all 0.5s ease;
        }

        .nav-dash-tab-slider {
            position: absolute;
            bottom: 0;
            width: 0;
            height: 5px;
            background: #03dac6;
            transition: left 0.3s ease;
        }

        .background {
            position: absolute;
            height: 100vh;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: auto;
        }

        .c-form form {
            width: 55%;
            margin-top: 50px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 7px !important;
            padding-right: 0;
            height: auto;
            margin-top: 0px !important;
        }

        @media (max-width: 800px) {

            .nav-dash h1,
            .slider h1 {
                font-size: 20px;
                margin-top: 30px;
                line-height: 35px
            }

            .nav-dash h2,
            .slider h2 {
                font-size: 3vw;
            }

            .nav-dash-tab {
                font-size: 3vw;
            }
        }

        @media screen only (min-width: 360px) {


            .nav-dash h2,
            .slider h2 {
                font-size: 2vw;
                letter-spacing: 0.2vw;
            }

            .nav-dash-tab {
                font-size: 1.2vw;
            }
        }

        .background {
            position: absolute;
            height: 100vh;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 0;
        }
    </style>

    <style>
        table.dataTable th {
            position: relative;
            text-align: center
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:after {
            position: absolute;
            bottom: 5px;
            right: 5px;
        }

        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding: 10px 20px;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            vertical-align: middle;
        }

        select.input-sm {
            height: 40px;
            line-height: 30px;
            text-align: center;
        }

        .box-header {
            background: #3c8dbc;
            border: 4px solid #000;
            border-radius: 10px 10px 0px 0px;
            padding: 25px 0px;
        }

        .box.box-solid.box-primary {
            border-top: none;
            border: 0px solid transparent
        }

        .box-title {
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
        }

        .box.box-info {
            border-top-color: transparent;
        }

        .content {
            padding: 0px
        }

        .date-range {
            background-color: #000;
            color: #fff;
            text-align: center;
            width: 100%;
            padding: 8px 16px;
            border-radius: 0px 0px 10px 10px;
            border: 2px solid #000;
            font-weight: 600
        }

        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }

        .b-style {
            font-family: cjFont;
            font-size: 14px;
            color: #0f172a;
            margin-bottom: 0px;
            background: transparent;
            padding: 0px;
            padding-top: 5px;
        }
        i.bx {
            font-size: 17px;
            display: inline-block;
            vertical-align: middle;
            margin-top: -3px;
            margin-right: 5px;
        }
    </style>
</head>
<?php 
    $role = ['KOORDINATOR', 'HEAD', 'MANAGER']
?>
<body class="body-auth">
    <?php $user = $this->session->userdata('user_dashboard')['user']; ?>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
    <div id="master">
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                <?php if (in_array($user['role'], $role)): ?>
            
                <?php else: ?>
                    <img id="sidebarOpen" onclick="sidebar_open()" class="img-fluid menu-style sidebar-toggle"
                        src="<?= asset('icon/menu-scale.png') ?>" style="margin-left: 0px" alt="">
                    <img id="sidebarClose" onclick="sidebar_close()" class="img-fluid menu-style sidebar-toggle"
                        src="<?= asset('icon/menu.png') ?>" style="margin-left: 0px" alt="">
                <?php endif ?>
                   
                    <a href="<?= base_url('dashboard') ?>">
                        <img class="img-fluid brand-style" src="<?= asset('img/cj-logo.png') ?>" alt="">
                    </a>
                    
                    <p class="breadcrumb b-style"><?= $title ?></p>
                </div>

                <div class="nav-right col pull-right right-menu p-0">
                    <div class="dropdown-profile">
                        <img onclick="ddProfile()" class="dd-profile img-fluid avatar-style"
                            src="<?= asset('icon/avatar.png') ?>" alt="" style="max-width: 40px;">
                        <div id="myddProfile" class="dropdown-content-profile">
                            <a href="<?= base_url('profile') ?>">
                                <i class='bx bx-user'></i> PROFILE
                            </a>
                            <button type="button">
                                <a href="<?= route('logout') ?>"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i> LOG OUT
                                </a>
                            </button>
                            <form id="logout-form" action="<?= route('logout') ?>" method="POST" class="d-none">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <main class="page-wrapper">
            <?= $sidebar_menu ?>
            <div id="main" class="main close-main">
            