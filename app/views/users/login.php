<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>
    <div class="container">
        <div class="wrapper-login">
            <h2>Sign in</h2>

            <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
                <input type="text" placeholder="Username *" name="username">
                <span class="invalidFeedback">
                    <?php echo $data['usernameError']; ?>
                </span>

                <input type="password" placeholder="Password *" name="password">
                <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>

                <button id="submit" type="submit" value="submit">Submit</button>

                <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
            </form>
        </div>
    </div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>
