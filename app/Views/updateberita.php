<div class="container">
    <h2>Update Berita</h2>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form action="<?= site_url('auth/update/' . $article['id']) ?>" method="post" enctype="multipart/form-data">
        <!-- Tambahkan atribut enctype="multipart/form-data" pada tag form -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $article['title']) ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea rows="4" class="form-control" id="content" name="content"><?= old('content', $article['content']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="1" <?= $article['category_id'] == 1 ? 'selected' : '' ?>>Technology</option>
                <option value="2" <?= $article['category_id'] == 2 ? 'selected' : '' ?>>Olahraga</option>
                <option value="3" <?= $article['category_id'] == 3 ? 'selected' : '' ?>>Otomotif</option>
                <option value="4" <?= $article['category_id'] == 4 ? 'selected' : '' ?>>Kesehatan</option>
                <option value="5" <?= $article['category_id'] == 5 ? 'selected' : '' ?>>Keuangan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Update Berita</button>
    </form>
</div>


