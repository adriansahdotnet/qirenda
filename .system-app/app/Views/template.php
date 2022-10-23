<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= $web['description']; ?>">
        <meta name="keywords" content="<?= $web['keywords']; ?>">
        <meta name="author" content="<?= $web['author']; ?>">

        <!-- Title -->
        <title><?= $title; ?> - <?= $web['title']; ?></title>

        <link rel="shortcut icon" href="<?= $web['icon']; ?>">

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&amp;display=swap" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets/plugins/DataTables/datatables.min.css" rel="stylesheet">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        
        <!-- Theme Styles -->
        <link href="<?= base_url(); ?>/assets/css/main.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets/css/custom.css" rel="stylesheet">

        <style>
            #toolbarContainer {
                display: none;
            }
            .of-game {
                width: 23%;
                display: inline-block;
                padding: 10px;
                vertical-align: top;
                margin: 7px;
            }
            .of-game img {
                border-radius: 18px;
            }
            .of-game p {
                line-height: 18px;
                font-size: 13px;
                color: #333;
            }
            .cursor-pointer {
                cursor: pointer;
            }
            .card-number {
                position: absolute;
                width: 45px;
                height: 45px;
                text-align: center;
                line-height: 38px;
                border-radius: 50%;
                font-size: 18px;
                font-weight: bold;
                border: 5px solid #fff;
                margin-top: -50px;
                margin-left: -5px;"
            }
            .card-name {
                margin-top: -20px;
                margin-left: 45px;
                margin-bottom: 15px;
            }
            .produk-list {
                height: auto;
                padding: 10px;
                border-radius: 6px !important;
            }
            .metode-list {
                border-radius: 6px !important;
            }
            .hide {
                display: none;
            }
            .metode-list {
                overflow: hidden !important;
            }
            #method-select {
                display: inline-block;
                width: 60px;
                height: 80px;
                position: relative;
                float: right;
                margin-top: -64px;
                transform: rotate(45deg);
                margin-right: -60px;
            }
            .carousel-control-next, .carousel-control-prev {
                border: none;
                background: transparent;
            }
            .nav-item .nav-link {
                background: transparent;
            }
            .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
                border-bottom: 1px solid #dee2e6 !important;
            }
            button {
                outline: none !important;
            }

            @media only screen and (max-width: 768px) {
                #rincian-game {
                    display: none;
                }
                .margin-none-m:nth-child(odd) {
                    padding-right: 7px;
                }
                .margin-none-m:nth-child(even) {
                    padding-left: 7px;
                }
                .produk-list {
                    padding: 12px;
                }
                #btn-cek {
                    margin-top: 15px;
                }
            }
            @media only screen and (max-width: 425px) {
                .of-game {
                    width: 32%;
                    margin: 0;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand-sm d-flex justify-content-between">
                    <div class="" id="navbarNav">
                        <ul class="navbar-nav" id="leftNav">
                            <li class="nav-item cursor-pointer">
                                <span class="nav-link" id="sidebar-toggle">
                                    <i data-feather="menu"></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="logo">
                        <a class="navbar-brand" href="<?= base_url(); ?>" style="margin-top: -15px;">
                            <img src="<?= $web['logo']; ?>" alt="" height="48">
                        </a>
                    </div>
                    <div class="" id="headerNav">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link search-dropdown" href="#" id="searchDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu" aria-labelledby="searchDropDown">
                                    <form action="<?= base_url(); ?>/search" method="get">
                                        <input class="form-control" type="text" placeholder="Pencarian Game atau Voucher" aria-label="Search" name="s" autocomplete="off">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="page-sidebar">
                <div class="p-4">
                    <div id="box-home">
                        <div class="mb-3 text-center">
                            <img src="<?= base_url(); ?>/assets/images/avatar.png" alt="" width="80">
                        </div>
                        <?php if ($users == false): ?>
                        <p class="mt-4">Silahkan login / regitrasi untuk mendapat fitur terlengkap</p>

                        <?php if (session('auth_error')): ?>
                        <div class="alert alert-danger">
                            <?= session('auth_error'); ?>
                        </div>
                        <?php endif ?>

                        <?php if (session('auth_success')): ?>
                        <div class="alert alert-success">
                            <?= session('auth_success'); ?>
                        </div>
                        <?php endif ?>
                        <div class="text-center">
                            <button type="button" onclick="sidebar_nav('masuk');" class="btn btn-primary">Masuk</button>
                            <button type="button" onclick="sidebar_nav('daftar');" class="btn btn-primary">Daftar</button>
                        </div>
                        <?php else : ?>
                        <div class="text-center">
                            <p><?= $users['email']; ?></p>
                        </div>
                        <a href="<?= base_url(); ?>/profile" class="btn btn-primary w-100">Profile</a>
                        <?php endif ?>
                    </div>

                    <?php if ($users == false): ?>
                    <div id="box-masuk" class="d-none">
                        <div class="float-start me-3">
                            <button onclick="sidebar_nav('home');" class="btn btn-primary">
                                <i data-feather="arrow-left"></i>
                            </button>
                        </div>
                        <h4 class="text-primary mt-2 float-start">Masuk</h4>
                        <div class="mb-4 clearfix"></div>
                        <form action="<?= base_url(); ?>/" method="POST">
                            <div class="mb-3">
                                <label class="mb-1">Alamat Email</label>
                                <input type="email" class="form-control" autocomplete="off" required="required" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="mb-1">Kata Sandi</label>
                                <input type="password" class="form-control" autocomplete="off" required="required" name="password">
                            </div>
                            <button type="submit" name="tombol" value="masuk" class="btn btn-primary w-100">Masuk</button>
                        </form>
                    </div>

                    <div id="box-daftar" class="d-none">
                        <div class="float-start me-3">
                            <button onclick="sidebar_nav('home');" class="btn btn-primary">
                                <i data-feather="arrow-left"></i>
                            </button>
                        </div>
                        <h4 class="text-primary mt-2 float-start">Daftar</h4>
                        <div class="mb-4 clearfix"></div>
                        <form action="<?= base_url(); ?>/" method="POST">
                            <div class="mb-3">
                                <label class="mb-1">Nama Lengkap</label>
                                <input type="text" class="form-control" autocomplete="off" required="required" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">Alamat Email</label>
                                <input type="email" class="form-control" autocomplete="off" required="required" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="mb-1">Kata Sandi</label>
                                <input type="password" class="form-control" autocomplete="off" required="required" name="password">
                            </div>
                            <button type="submit" name="tombol" value="daftar" class="btn btn-primary w-100">Daftar</button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>

                <ul class="list-unstyled accordion-menu pt-0">
                    <?php if ($users !== false): ?>

                        <?php if ($users['level'] === 'Admin'): ?>
                        <li class="sidebar-title">Administrator</li>
                        <li>
                            <a href="<?= base_url(); ?>/admin"><i data-feather="home"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/config"><i data-feather="settings"></i>Konfigurasi</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/page"><i data-feather="layout"></i>Halaman</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/games"><i data-feather="pocket"></i>Kelola Games</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/product"><i data-feather="archive"></i>Kelola Produk</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/topup"><i data-feather="dollar-sign"></i>Kelola Topup</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/payment"><i data-feather="server"></i>Kelola Pembayaran</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/users"><i data-feather="users"></i>Kelola Pengguna</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/admin/orders"><i data-feather="shopping-bag"></i>Kelola Pembelian</a>
                        </li>
                        <?php else: ?>
                        <li class="sidebar-title">Menu</li>
                        <li>
                            <a href="<?= base_url(); ?>"><i data-feather="gift"></i>Top Up</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/how-to-buy"><i data-feather="bookmark"></i>Cara Membeli</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/status"><i data-feather="search"></i>Status Pembelian</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/terms"><i data-feather="tag"></i>Syarat & Ketentuan</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/faq"><i data-feather="info"></i>Pertanyaan Umum</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/help"><i data-feather="phone"></i>Bantuan</a>
                        </li>
                        <?php endif ?>
                    
                    <?php else: ?>
                    <li class="sidebar-title">Menu</li>
                    <li>
                        <a href="<?= base_url(); ?>"><i data-feather="gift"></i>Top Up</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/how-to-buy"><i data-feather="bookmark"></i>Cara Membeli</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/status"><i data-feather="search"></i>Status Pembelian</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/terms"><i data-feather="tag"></i>Syarat & Ketentuan</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/faq"><i data-feather="info"></i>Pertanyaan Umum</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>/help"><i data-feather="phone"></i>Bantuan</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
            <div class="page-content">
                <div class="main-wrapper">

                    <?php $this->renderSection('konten'); ?>

                </div>
            </div>
        </div>
        <!-- Javascripts -->
        <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="<?= base_url(); ?>/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/main.min.js"></script>
        <script src="<?= base_url(); ?>/assets/plugins/DataTables/datatables.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/pages/datatables.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php if ($users !== false): ?>
        <?php if ($users['level'] === 'Admin'): ?>
        <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body pt-5">
                        <div class="float-start me-4">
                            <img src="<?= base_url(); ?>/assets/images/alert.png" alt="" width="60">
                        </div>
                        <div>
                            <h5>Anda yakin?</h5>
                            <p>Data akan dihapus permanen</p>
                        </div>
                    </div>
                    <div class="modal-footer mt-0 pt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a id="btn-delete" class="btn btn-primary">Tetap Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <?php $this->renderSection('js'); ?>

        <script>
            
            <?php if ($users !== false): ?>
            <?php if ($users['level'] === 'Admin'): ?>
            function hapus(link) {
                $("#btn-delete").attr('href', link);
                var myModal = new bootstrap.Modal(document.getElementById('modal-delete'));
                myModal.show();
            }
            <?php endif; ?>
            <?php endif; ?>

            function sidebar_nav(nav_action) {
                if (nav_action == 'home') {
                    $("#box-home").removeClass('d-none');
                    $("#box-daftar").addClass('d-none');
                    $("#box-masuk").addClass('d-none');
                } else if (nav_action == 'masuk') {
                    $("#box-home").addClass('d-none');
                    $("#box-daftar").addClass('d-none');
                    $("#box-masuk").removeClass('d-none');
                } else {
                    $("#box-home").addClass('d-none');
                    $("#box-daftar").removeClass('d-none');
                    $("#box-masuk").addClass('d-none');
                }
            }
        </script>
    </body>
</html>