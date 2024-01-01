<div class="container">
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

    <div class="row">
        <?php foreach ($news as $article): ?>
            <div class="col-md-3 mt-3">
                <div class="card text-center container container-fluid" id="card-judul">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="text-primary">
                            <h5 class="card-title"><?= $article['title']?></h5>
                            <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                            <?php if ($user && $user['role'] == 'admin') : ?>
                                <form action="<?= site_url('auth/delete/' . $article['id']) ?>" method="post" class="mt-2">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
