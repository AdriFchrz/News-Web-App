<!-- search_result.php -->

<!-- Sesuaikan dengan kebutuhan tata letak dan desain Anda -->

<div class="row">
    <?php foreach ($news as $article): ?>
        <div class="col mb-3">
            <div class="card container" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <a href="<?= site_url('news/detail/' . $article['id']) ?>">
                        <h5 class="card-title"><?= $article['title'] ?></h5>
                    </a>
                    <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                    <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="btn btn-primary">Baca</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
