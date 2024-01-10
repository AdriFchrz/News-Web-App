<div class="container">
    <div class="row">
        <?php foreach ($news as $article): ?>
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <a href="<?= site_url('news/detail/' . $article['id']) ?>">
                    <?php if (!empty($article['image'])): ?>
                        <img class="card-img-top" src="<?= base_url('assets/' . $article['image']) ?>" alt="Card image cap">
                    <?php else: ?>
                        <img class="card-img-top" src="<?= base_url('assets/placeholder.jpg') ?>" alt="Card image cap">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['title'] ?></h5>
                        <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                        <?php if (isset($user) && $user['role'] == 'admin'): ?>
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
