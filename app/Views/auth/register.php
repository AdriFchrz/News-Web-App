<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header">
            <h5 class="card-title">Register</h5>
        </div>
        <div class="card-body">
            <?php
            // Tampilkan pesan kesalahan jika ada
            $errors = session()->getFlashdata('errors');
            if ($errors) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo $error.'<br>';
                }
                echo '</div>';
            }
            ?>
            <form action="<?= base_url('auth/register') ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="author">Author</option>
                        <option value="visitor">Visitor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <a href="login">Sudah punya akun?</a>
        </div>
    </div>
</div>
</body>
</html>
