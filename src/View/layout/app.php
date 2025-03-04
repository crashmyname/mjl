<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MJL - Admin System</title>

    <link rel="stylesheet" href="<?= asset('mazer/assets/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('mazer/assets/css/main/app-dark.css') ?>">

    <link rel="shortcut icon" href="<?= asset('mazer/assets/images/logo/favicon.svg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= asset('mazer/assets/images/logo/favicon.png') ?>" type="image/png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/3.0.0/css/select.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.bootstrap5.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <style>
        .sidebar-menu .submenu {
            display: none;
            /* Menyembunyikan submenu secara default */
        }

        .sidebar-menu .has-sub.active .submenu {
            display: block;
            /* Menampilkan submenu jika aktif */
        }
    </style>
</head>

<body>
    <div id="loading-bar"
        style="position: fixed; top: 0; left: 0; width: 0; height: 10px; background:rgb(0, 47, 100); z-index: 9999; transition: width 0.3s ease;">
    </div>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="<?= asset('mazer/assets/images/logo/logo.svg') ?>"
                                    alt="Logo" srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="<?= base_url() ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link" id="dropdown">
                                <i class="bi bi-stack"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="<?= base_url() ?>/users" class="sidebar-link">Users</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?= base_url() ?>/payment" class="sidebar-link">Payment</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?= base_url() ?>/transporters" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Transporters</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?= base_url() ?>/shippers" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Shippers</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?= base_url() ?>/orders" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Shipment</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?= base_url() ?>/invoices" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Invoices</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?= base_url() ?>/reports" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class=''>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-header">
                                            <h6>Notifications</h6>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-primary">
                                                    <i class="bi bi-cart-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Successfully check out</p>
                                                    <p class="notification-subtitle font-thin text-sm">Order ID #256
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-success">
                                                    <i class="bi bi-file-earmark-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math
                                                        homework</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <p class="text-center py-2 mb-0"><a href="#">See all
                                                    notification</a></p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?= asset('mazer/assets/images/faces/1.jpg') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <?= $content ?>
            </div>
        </div>
    </div>
    <script src="<?= asset('mazer/assets/js/bootstrap.js') ?>"></script>
    <script src="<?= asset('mazer/assets/js/app.js') ?>"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/select/3.0.0/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/3.0.0/js/select.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.colVis.min.js"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            function showLoading() {
                $('#loading-bar').css('width', '0').show().animate({
                    width: '100%'
                }, 800);
            }

            function hideLoading() {
                $('#loading-bar').stop().css('width', '100%').fadeOut(300);
            }

            function setActiveMenu() {
                let currentPath = window.location.pathname;
                $('.sidebar-menu li').removeClass('active has-sub');
                $('.sidebar-menu .sidebar-link').each(function() {
                    if ($(this).attr('href') === currentPath) {
                        $(this).closest('li').addClass('active');
                        if ($(this).closest('.has-sub').length) {
                            $(this).closest('.has-sub').addClass('active');
                            $(this).closest('.submenu').slideDown();
                        }
                    }
                });
            }

            setActiveMenu();

            function bindClickEvent() {
                $('.sidebar-menu .sidebar-link').off('click').on('click', function(e) {
                    e.preventDefault();
                    let url = $(this).attr('href');
                    if (url === '#' || !url) return;

                    $('.sidebar-menu li').removeClass('active has-sub');
                    $(this).closest('li').addClass('active');

                    if ($(this).closest('.has-sub').length) {
                        $(this).closest('.has-sub').addClass('active');
                        $(this).closest('.submenu').slideDown();
                    }

                    history.pushState({
                        path: url
                    }, '', url);
                    showLoading();

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            let content = $(response).find('#main-content').html();
                            $('#main-content').html(content);
                            bindClickEvent();
                            if (typeof initDataTable === 'function') {
                                initDataTable();
                            }
                        },
                        error: function(xhr) {
                            if(xhr.status === 401){
                            window.location.href = '<?=base_url()?>/sign-in';
                            } else {
                                // Tampilkan pesan error jika bukan 401
                                $('#main-content').html('<br><br><h2>Coming soon</h2>');
                            }
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                });
            }

            bindClickEvent();

            window.onpopstate = function(event) {
                if (event.state && event.state.path) {
                    showLoading();
                    $.ajax({
                        url: event.state.path,
                        method: 'GET',
                        success: function(response) {
                            let content = $(response).find('#main-content').html();
                            $('#main-content').html(content);
                            setActiveMenu();
                            bindClickEvent();
                            if (typeof initDataTable === 'function') {
                                initDataTable();
                            }
                        },
                        error: function() {
                            $('#main-content').html('<p>Error loading content</p>');
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                }
            };
        });

        document.getElementById('logout').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Logout!',
                icon: 'warning',
                text: 'Apakah yakin ingin Logout?',
                showCancelButton: true,
                confirmButtonText: 'Ya Logout!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formlogout').submit();
                }
            })
        })
    </script>
</body>

</html>
