        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
            <div class="container d-flex justify-content-center p-0 ">
                <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse py-3" id="navbarSupportedContent">
                    <ul class="mx-auto navbar-nav  text-center ">
                        <li class="nav-item me-2"><a class="nav-link active" href="<?php echo URLROOT; ?>/index">ኣዳራሽ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/blogs">ዓንቅጻት</a></li>

                    <?php if(isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/dashboard">ሰሌዳ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/artlicles">ዓምድታት</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/category">ዛዕባ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/admins">ኣዳላዊ ዓምዲ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/comments">ርእይቶታት</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/">ቀጥታዊ ዓንቀጽ</a></li>
                    <?php endif; ?>
                        
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/about">ብዛዕባና</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/contact">ኽትረክቡና</a></li>
                    </ul>
                    <ul class="navbar-nav bg-dark text-center">
                        <li class="nav-item">
                            <?php if(isset($_SESSION['user_id'])) : ?>
                                <a class="nav-link text-light" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                            <?php else : ?>
                                <a class="nav-link text-light" href="<?php echo URLROOT; ?>/users/login">ተመዝገዝቡ</a>
                            <?php endif; ?>
                        </li>
                        
                        <li class="nav-item"><a class="nav-link text-light" href="#">ሰዓቡና</a></li>
                    </ul>
                </div>
                <hr>
            </div>
        </nav>
        