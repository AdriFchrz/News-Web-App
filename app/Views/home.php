<?php foreach ($news as $article): ?>
    <div class="card text-center container" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $article['title']?></h5>
            <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
            <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="btn btn-primary">Baca</a>
        </div>
    </div>
<?php endforeach; ?>
