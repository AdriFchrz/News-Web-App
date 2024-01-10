<div class="container mb-3">
    <?php if ($user = session('user_id') ? (new \App\Models\UserModel())->find(session('user_id')) : null): ?>
        <?php if ($user['role'] == 'author') : ?>
            <a href="<?= site_url('auth/create') ?>" type="button" class="btn btn-primary mb-3">Buat Berita</a>
        <?php endif; ?>
        <a href="<?= site_url('auth/logout') ?>" type="button" class="btn btn-danger mb-3">Keluar</a>
        <?php if ($user['username']) : ?>
            <h3>Selamat datang, <?= $user['username'] ?>!</h3>
        <?php endif; ?>
    <?php else : ?>
        <a href="<?= site_url('auth/login') ?>" type="button" class="btn btn-success mb-3">Masuk</a>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <!-- Card besar di sebelah kiri -->
            <div class="col-md-6 mt-3">
                <?php if (!empty($mainArticle)): ?>
                    <div class="card" id="card-judul">
                        <a href="<?= site_url('news/detail/' . $mainArticle['id']) ?>" class="text-primary text-decoration-none text-black">
                            <?php if (!empty($mainArticle['image'])): ?>
                                <img class="card-img-top" src="<?= base_url('assets/' . $mainArticle['image']) ?>" alt="Card image cap">
                            <?php else: ?>
                                <!-- Tambahkan placeholder gambar default jika tidak ada gambar -->
                                <img class="card-img-top" src="<?= base_url('assets/placeholder.jpg') ?>" alt="Card image cap">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $mainArticle['title'] ?></h5>
                                <p class="card-text" style><?= substr($mainArticle['content'], 0, 150) ?>...</p>
                                <?php if ($user && $user['role'] == 'admin') : ?>
                                    <form action="<?= site_url('auth/delete/' . $mainArticle['id']) ?>" method="post" class="mt-2">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php foreach ($otherArticles as $article): ?>
                <div class="col-md-3 mt-3">
                    <div class="card" id="card-judul">
                        <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="text-primary text-decoration-none text-black">
                            <?php if (!empty($article['image'])): ?>
                                <img class="card-img-top" src="<?= base_url('assets/' . $article['image']) ?>" alt="Card image cap">
                            <?php else: ?>
                                <!-- Tambahkan placeholder gambar default jika tidak ada gambar -->
                                <img class="card-img-top" src="<?= base_url('assets/placeholder.jpg') ?>" alt="Card image cap">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $article['title'] ?></h5>
                                <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                                <?php if ($user && $user['role'] == 'admin') : ?>
                                    <form action="<?= site_url('auth/delete/' . $article['id']) ?>" method="post" class="mt-2">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
