<div class="container">
    <?php if ($user['role'] == 'author') : ?>
        <a href="<?= site_url('auth/create') ?>" type="button" class="btn btn-primary mb-3">Buat Berita</a>
    <?php endif; ?>

    <a href="<?= site_url('auth/logout') ?>" type="button" class="btn btn-danger mb-3">Keluar</a>
    <div class="row">
        <?php if (isset($user) && $user): ?>
            <?php
            $foundArticles = false;
            foreach ($news as $article):
                if (isset($article['author_id']) && $article['author_id'] == $user['id']):
                    $foundArticles = true;
                    ?>
                    <div class="col-md-3">
                        <div class="card" id="card-judul">
                            <?php if (!empty($article['image'])): ?>
                                <img class="card-img-top" src="<?= base_url('assets/' . $article['image']) ?>" alt="Card image cap">
                            <?php else: ?>
                                <!-- Tambahkan placeholder gambar default jika tidak ada gambar -->
                                <img class="card-img-top" src="<?= base_url('assets/placeholder.jpg') ?>" alt="Card image cap">
                            <?php endif; ?>
                            <div class="card-body">
                                <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="text-primary">
                                    <h5 class="card-title"><?= $article['title']?></h5>
                                    <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                                    <a href="<?= site_url('auth/update/' . $article['id']) ?>" class="btn btn-info mt-2">Update</a>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if (!$foundArticles): ?>
                <h1>Anda belum membuat berita.</h1>
            <?php endif; ?>

        <?php else: ?>
            <p>Ups! Terjadi kesalahan saat mengambil data pengguna.</p>
        <?php endif; ?>
    </div>
</div>