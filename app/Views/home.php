<div class="row">
<?php foreach ($news as $article): ?>
    <div class="col">
        <div class="card text-center container container-fluid" id="card-judul">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="text-primary">
                <h5 class="card-title"><?= $article['title']?></h5>
                <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>
                </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
