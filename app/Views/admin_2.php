<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Link Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- LINK CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Menambahkan link ke CSS FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="img/LogoNew.png">

    <title>Gramm | Admin</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="/dashboard">
                <!-- <span style="font-family: 'Inter'; font-weight: bold; color: red;">Gra</span><span
                    style="font-family: 'Inter'; font-weight: bold; color: white;">mm
                    <span style="font-family: 'Inter'; font-weight: bold; color: white;">- Admin</span>
                </span> -->
                <img src="/Img/LogoNew.png" alt="Gramm Logo" width="40px">
            
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto nav">
                    <!-- <li class="nav-item mx-lg-3">
                        <a class="nav-link <?= ($current_page === 'dashboard') ? 'active' : '' ?>"
                            href="/dashboard"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li> -->
                </ul>
                <?php if (session()->get('logged_in')): ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                            <?= session()->get('nama_admin') ?> <!-- Menampilkan nama pengguna di sini -->
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <!-- Tambahkan atribut data-bs-toggle dan data-bs-target untuk membuka modal -->
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#profileModal">Profil</a>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Tambahkan tautan login di sini jika diperlukan -->
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Bagian tampilan pesan selamat datang -->
    <?php if (session()->has('pesan_selamat_datang')): ?>
        <div class="alert alert-success text-center">
            <?= session('pesan_selamat_datang') ?>
        </div>
    <?php endif; ?>

    <div class="contain container">
        <div>
            <?php
            if ($page) {
                echo view($page);
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="container-fluid  mt-5" style="background-color: #EEEDED;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="text-center m-3">© Copyright 2023</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- LINK JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
        </script>

<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profil Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> <?= session()->get('nama_admin') ?></p>
                <p><strong>Username:</strong> <?= session()->get('uname_admin') ?></p>
                <p><strong>Email:</strong> <?= session()->get('email_admin') ?></p>
                <p><strong>Tipe:</strong> <?= session()->get('tipe') ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>