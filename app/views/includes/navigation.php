<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/Contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="<?php echo URLROOT; ?>/projects">Projects</a>
            </li>
            <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
        </ul>
        </div>
    </div>
    </nav>
