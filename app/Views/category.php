<div class="container">
    <?php if ($user = session('user_id') ? (new \App\Models\UserModel())->find(session('user_id')) : null): ?>

        <?php if ($user['role'] == 'author') : ?>
            <a href="<?= site_url('auth/create') ?>" type="button" class="btn btn-primary mb-3">Buat Berita</a>
        <?php endif; ?>

        <a href="<?= site_url('auth/logout') ?>" type="button" class="btn btn-danger mb-3">Keluar</a>

    <?php else : ?>
        <a href="<?= site_url('auth/login') ?>" type="button" class="btn btn-success mb-3">Masuk</a>
    <?php endif; ?>
    <div class="row">
        <?php foreach ($news as $article): ?>
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <a href="<?= site_url('news/detail/' . $article['id']) ?>">
                    <?php if (!empty($article['image'])): ?>
                        <img class="card-img-top" src="<?= base_url('assets/' . $article['image']) ?>" alt="Card image cap">
                    <?php else: ?>
                        <!-- Tambahkan placeholder gambar default jika tidak ada gambar -->
                        <img class="card-img-top" src="<?= base_url('assets/placeholder.jpg') ?>" alt="Card image cap">
                    <?php endif; ?>
                    <div class="card-body">

                            <h5 class="card-title"><?= $article['title'] ?></h5>

                        <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>

                        <?php if ($user && $user['role'] == 'admin'): ?>
                            <form action="<?= site_url('auth/delete/' . $article['id']) ?>" method="post" class="mt-2">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
