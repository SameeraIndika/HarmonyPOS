<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-start">
            <h4 class="mb-0">Add Admin</h4>
            <a href="admins.php" class="btn btn-primary float-end">Back</a>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name *</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email *</label>
                        <input type="email" name="email" required class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Password *</label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phone number *</label>
                        <input type="number" name="phone" required class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Is Ban</label>
                        <input type="checkbox" name="is_ban">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" name="saveAdmin" class="btn btn-primary">Save Admin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>