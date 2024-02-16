<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-start">
            <h4 class="mb-0">Admins/Staff</h4>
            <a href="admin-create.php" class="btn btn-primary float-end">Add Admin</a>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>
            <?php
            $admins = getAll('admins');
            if (!$admins) {
                echo '<h4>Something went wrong!</h4>';
                return false;
            }
            if (mysqli_num_rows($admins) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-boarderd">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $admins = getAll('admins');
                            if (mysqli_num_rows($admins) > 0) {
                            ?>
                                <?php foreach ($admins as $adminItem) : ?>
                                    <tr>
                                        <td><?= $adminItem['id'] ?></td>
                                        <td><?= $adminItem['name'] ?></td>
                                        <td><?= $adminItem['email'] ?></td>
                                        <td>
                                            <a href="admin-edit.php" class="btn btn-success btn-sm">Edit</a>
                                            <a href="admin-delete.php" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td colspan="4">No Record found!</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <tr>
                    <h4 class="mb-0">No Record found!</h4>
                </tr>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>