<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
            <h1><i class="fas fa-cog" style="color:#27aae1;"></i> Dashboard</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="AddNewPost.php" class="btn btn-primary btn-block">
                <i class="fas fa-edit"></i> Add New Post
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Categories.php" class="btn btn-info btn-block">
                <i class="fas fa-folder-plus"></i> Add New Category
                </a>
            </div>
            <div class="col-lg-3 mb-2 ">
                <a href="Admins.php" class="btn btn-warning btn-block">
                <i class="fas fa-user-plus"></i> Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Comments.php" class="btn btn-success btn-block">
                <i class="fas fa-check"></i> Approve Comments
                </a>
            </div>

            </div>
        </div>
    </header>
    <!-- HEADER END -->

<?php
    require APPROOT . '/views/includes/footer.php';
?>
