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
    <a class="navbar-brand" href="<?= BASEURL; ?>/admin"><i class="fas fa-university me-2"></i>SION REMASTERED</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3">
            <span class="text-white small">Halo, <strong><?= $_SESSION['user']['username']; ?></strong> (Admin)</span>
        </li>
        <li class="nav-item">
            <a class="btn btn-danger btn-sm rounded-pill px-3" href="<?= BASEURL; ?>/auth/logout">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="min-height: 80vh;">