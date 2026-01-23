<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-brand { font-weight: bold; letter-spacing: 1px; }
        .card-menu:hover { transform: translateY(-5px); transition: 0.3s; cursor: pointer; }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
  <div class="container">
    
    <?php 
        $homeLink = BASEURL;
        if($_SESSION['user']['role'] == 'admin') $homeLink = BASEURL . '/admin';
        elseif($_SESSION['user']['role'] == 'dosen') $homeLink = BASEURL . '/portaldosen';
        elseif($_SESSION['user']['role'] == 'mahasiswa') $homeLink = BASEURL . '/portalmahasiswa';
    ?>

    <a class="navbar-brand" href="<?= $homeLink; ?>"><i class="fas fa-university me-2"></i>SION REMASTERED</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        
        <?php if($_SESSION['user']['role'] == 'admin') : ?>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="<?= BASEURL; ?>/dosen">Dosen</a></li>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a></li>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="<?= BASEURL; ?>/matkul">Matkul</a></li>
        <?php endif; ?>

        <?php if($_SESSION['user']['role'] == 'dosen') : ?>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="#">Jadwal Ajar</a></li>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="#">Perwalian</a></li>
        <?php endif; ?>

        <?php if($_SESSION['user']['role'] == 'mahasiswa') : ?>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="<?= BASEURL; ?>/krs">KRS</a></li>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="#">Jadwal</a></li>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="<?= BASEURL; ?>/portalmahasiswa/khs">Nilai (KHS)</a></li>
            <li class="nav-item mx-2"><a class="nav-link text-white-50" href="#">Keuangan</a></li>
        <?php endif; ?>

        <li class="nav-item ms-3">
            <span class="text-white small me-2">
                Halo, <strong><?= $_SESSION['user']['username']; ?></strong> 
                (<?= ucfirst($_SESSION['user']['role']); ?>)
            </span>
        </li>
        <li class="nav-item">
            <a class="btn btn-danger btn-sm rounded-pill px-3" href="<?= BASEURL; ?>/auth/logout">
                <i class="fas fa-sign-out-alt me-1"></i>
            </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="container" style="min-height: 80vh;">