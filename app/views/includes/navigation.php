        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="mx-auto navbar-nav   ">
                        <li class="nav-item me-2"><a class="nav-link active" href="<?php echo URLROOT; ?>/index">ኣዳራሽ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/blog">ዓናቅጽ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="#">ርእሰ ዓንቀጽ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="#">ዓምድታት</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="#">ዛዕባ</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/about">ብዛዕባና</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="#!">ኽትረክቡና</a></li>
                    </ul>
                    <ul class="me-5 navbar-nav bg-light  border border-light px-3">
                        <li class="nav-item me-2">
                            <?php if(isset($_SESSION['user_id'])) : ?>
                                <a class="nav-link text-dark" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                            <?php else : ?>
                                <a class="nav-link text-dark" href="<?php echo URLROOT; ?>/users/login">ተመዝገዝቡ</a>
                            <?php endif; ?>
                            </li>
                        
                        <li class="nav-item me-2"><a class="nav-link text-dark" href="#">ሰዓቡና</a></li>
                    </ul>
                </div>
                <hr>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">እንቓዕ ብደሓን መጻኩም !!!</h1>
                    <p class="lead mb-0">ንኽዳሎ ኸኣ ጸዓት የድልይኹን’ምበር፡ ቀረብ ጸዓት ኣብዚ
                                ሕጂ እዋን ብደረጃ ዓለም ምስጠለብን ቀረብን ክነጻጸር እንከሎ
                                ፍጹም ዝመጣጠን ኣይኰነን።</p>
                </div>
            </div>
        </header>