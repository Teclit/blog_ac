<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        <form action="<?php echo URLROOT; ?>/users/register" method ="POST">
                            <div class="form-floating mb-3">
                                <input type="username" class="form-control" name="username" id="username" placeholder="username">
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                                <label for="confirmPassword">Confirm Password</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-dark btn-login text-uppercase fw-bold" type="submit">Submit</button>
                            </div>
                            <hr class="my-4">
                            <p class="options">Aready registered? <a href="<?php echo URLROOT; ?>/users/login">Sign in</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        


<?php
    require APPROOT . '/views/includes/footer.php';
?>
