<!-- views/create_news.php -->

<div class="container mt-3">
    <a href="/" class="btn btn-primary">Kembali</a>
    <h2>Create News</h2>

    <?php echo form_open('news/create'); ?>

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <!-- Populate this dropdown with categories from your database -->
            <!-- Example: -->
            <option value="1">Technology</option>
            <option value="2">Olahraga</option>
            <option value="3">Otomotif</option>
            <!-- ... -->
        </select>
    </div>

    <!-- You may want to set the author_id based on the logged-in user's ID -->

    <input type="hidden" id="author_id" name="author_id" value="1">

    <!-- Use CodeIgniter's default values for created_at and updated_at -->
    <input type="hidden" id="created_at" name="created_at" value="<?= date('Y-m-d') ?>">
    <input type="hidden" id="updated_at" name="updated_at" value="<?= date('Y-m-d') ?>">

    <button type="submit" class="btn btn-success">Create News</button>

    <?php echo form_close(); ?>
</div>
