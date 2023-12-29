<div class="container">
    <?php
    // Ambil informasi sesi
    $session = session();
    $user_id = $session->get('user_id');

    if ($user_id) {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($user_id);

        // Periksa apakah peran pengguna adalah "author"
        if ($user['role'] == 'author') {
            // Jika pengguna adalah "author", tampilkan tombol "Buat Berita"
            echo '<a href="auth/create" type="button" class="btn btn-primary mb-3">Buat Berita</a>';
        }

        // Tampilkan tombol keluar dan pesan selamat datang
        echo '<a href="auth/logout" type="button" class="btn btn-danger mb-3">Keluar</a>';
        echo "<h3>Selamat datang, {$user['username']}!</h3>";
    } else {
        // Jika pengguna tidak masuk, tampilkan tombol masuk
        echo '<a href="auth/login" type="button" class="btn btn-success mb-3">Masuk</a>';
    }
    ?>

    <div class="row">
        <?php foreach ($news as $article): ?>
            <div class="col-md-3">
                <div class="card text-center container container-fluid" id="card-judul">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <a href="<?= site_url('news/detail/' . $article['id']) ?>" class="text-primary">
                            <h5 class="card-title"><?= $article['title']?></h5>
                            <p class="card-text"><?= substr($article['content'], 0, 150) ?>...</p>

                            <?php
                            // Tampilkan tombol "Hapus" hanya jika peran adalah "admin"
                            if ($user['role'] == 'admin') {
                                echo '<form action="'. site_url('auth/delete/' . $article['id']) .'" method="post" class="mt-2">';
                                echo '<button type="submit" class="btn btn-danger">Hapus</button>';
                                echo '</form>';
                            }

                            // Tampilkan tombol "Update" hanya jika peran adalah "author"
                            if ($user['role'] == 'author') {
                                echo '<a href="'. site_url('auth/update/' . $article['id']) .'" class="btn btn-info mt-2">Update</a>';
                            }
                            ?>

                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
