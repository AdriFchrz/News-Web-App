<div class="container text-center">
    <p>Penulis: <?= $news['username']; ?></p>
    <p>Tanggal <?= $news['created_at']; ?></p>
    <h2><?= $news['title']; ?></h2>
    <p><?= $news['content']; ?></p>
    <p>Category: <a href=""><?= $news['name']; ?></a></p>
    <hr>
</div>

</body>
</html>