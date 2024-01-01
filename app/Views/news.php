<div class="container">
<a href="/" class="btn btn-primary mb-3">Kembali</a>
    <p>Penulis: <?= $news['username']; ?></p>
    <p>Tanggal <?= $news['created_at']; ?></p>
    <h2><?= $news['title']; ?></h2>
    <p><?= $news['content']; ?></p>
    <p>Category: <a href=""><?= $news['name']; ?></a></p>
    <hr>

    <?php if (session('role') === 'visitor'): ?>
        <form action="<?= site_url('comment/add/' . $news['id']) ?>" method="post">
            <textarea name="content" cols="150" rows="5" placeholder="Tambahkan komentar"></textarea>
            <br>
            <button type="submit" class="btn btn-success mt-2">Tambah Komentar</button>
        </form>
        <hr>
    <?php endif; ?>

    <?php if (!empty($comments)): ?>
        <h3>Komentar:</h3>
        <ul>
            <?php foreach ($comments as $comment): ?>
                <li>
                    <strong><?= $comment['username']; ?>:</strong> <?= $comment['content']; ?>
                    <?php if (session('role') === 'admin'): ?>
                        <a href="<?= site_url('comment/delete/' . $comment['comment_id']) ?>">delete</a>
                    <?php endif; ?>
                    <br>
                    <small><?= $comment['created_at']; ?></small>
                </li>
            <?php endforeach; ?>

        </ul>
    <?php else: ?>
        <p>Belum ada komentar.</p>
    <?php endif; ?>
</div>
</body>
</html>
