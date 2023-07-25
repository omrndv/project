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

    <title>Gramm</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <span class="text-danger">Gra</span>mm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === 'home') ? 'active' : '' ?>"
                            href="/User/home">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown">
                            <ul class="dropdown-menu">
                                <?php
                                $host = 'localhost';
                                $user = 'root';
                                $password = '';
                                $database = 'artikel';

                                $conn = mysqli_connect($host, $user, $password, $database);
                                if (!$conn) {
                                    die('Koneksi ke database gagal: ' . mysqli_connect_error());
                                }

                                // Query untuk mendapatkan data kategori
                                $query = "SELECT * FROM tb_kategori";
                                $result = mysqli_query($conn, $query);

                                if (!$result) {
                                    die('Query tidak berhasil: ' . mysqli_error($conn));
                                }

                                // Looping untuk menampilkan opsi-opsi kategori dalam dropdown menu
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $title = $row['nama_kategori'];
                                    echo '<li><a class="dropdown-item" href="#" data-value="' . $title . '">' . $title . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Filter
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li>
                                <a class="dropdown-item text-danger fw-semibold"
                                    href="<?php echo base_url('user/home?category=terbaru'); ?>">Terbaru</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger fw-semibold"
                                    href="<?php echo base_url('user/home?category=terlama'); ?>">Terlama</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <div class="contain">
        <div>
            <?php
            if ($page) {
                echo view($page);
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="container-fluid mt-4 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 py-5 col-lg-4 col-md-5 col-sm-6">
                        <a href="https://instagram.com/o_mrrndv" style="text-decoration:none">
                            <i class="fa-brands fa-instagram px-4 fa-2x" style="color: #ffffff;"></i>
                        </a>
                        <a href="https://facebook.com" style="text-decoration:none">
                            <i class="fa-brands fa-facebook px-4 fa-2x" style="color: #ffffff;"></i>
                        </a>
                        <a href="https://twitter.com/elonmusk" style="text-decoration:none">
                            <i class="fa-brands fa-twitter px-4 fa-2x" style="color: #ffffff;"></i>
                        </a>
                    </div>
                    <div class="col-xl-2 offset-xl-2 py-5 col-lg-2 offset-lg-1 col-md-2 col-sm-3">
                        <h1 class="fw-bolder" style="color: #fff;">Gra<span style="color: #F91111;">mm</span></h1>
                    </div>
                    <div
                        class="col-xl-2 offset-xl-3 py-5 col-lg-2 offset-lg-3 col-md-3 offset-md-1 col-sm-12 d-sm-none d-md-block d-lg-block">
                        <p class="fw-bolder" style="color: white;">© 2023 Gramm</p>
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
</body>

</html>