<?php $role = session('role'); ?>

<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container container-fluid">
        <a class="navbar-brand" id="font-navbar" href="/">News Media</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="kategoriDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/1') ?>">Teknologi</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/2') ?>">Olahraga</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/3') ?>">Otomotif</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/4') ?>">Kesehatan</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/5') ?>">Keuangan</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/6') ?>">Bisnis</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('news/by_category/7') ?>">Politik</a></li>
                    </ul>
                </li>
                <?php if ($role == 'author'): ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/auth/manajement">Manajemen Berita</a>
                    </li>
                <?php endif; ?>
                <?php if ($role == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/auth/users">Users</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" action="<?= site_url('search') ?>" method="post" role="search">
                <input class="form-control me-2" id="search" type="search" name="search" placeholder="Cari Berita" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">GO</button>
            </form>
        </div>
    </div>
</nav>
