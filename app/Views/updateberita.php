<!-- views/news/update.php -->

<div class="container">
    <h2>Update Berita</h2>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= site_url('auth/update/' . $article['id']) ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $article['title']) ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content"><?= old('content', $article['content']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Berita</button>
    </form>
</div>
