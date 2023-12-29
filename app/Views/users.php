<div class="container text-center">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
                <td><a href="/delete/<?= $user['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>]