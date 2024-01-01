<div class="container">
    <div class="row">
        <?php foreach ($news as $article): ?>
            <div class="col-md-3 mb-3">
                <div class="card container" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <a href="<?= site_url('news/detail/' . $article['id']) ?>">
                            <h5 class="card-title"><?= $article['title'] ?></h5>
                        </a>
                        <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                        <?php if (isset($user) && $user['role'] == 'admin'): ?>
                            <form action="<?= site_url('auth/delete/' . $article['id']) ?>" method="post" class="mt-2">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
