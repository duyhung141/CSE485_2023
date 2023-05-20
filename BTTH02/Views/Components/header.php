<header class="bg-dark d-flex justify-content-center py-3 mb-3">
    <ul class="nav nav-pills gap-5">
        <li class="nav-item "><a href="index.php" class="btn text-light fw-bold" aria-current="page">Home</a></li>
        <li class="nav-item "><a href="dashboard.php" class="btn text-light fw-bold" aria-current="page">Dashboard</a></li>
        <?php
            if(!isset($_SESSION['user_id'])){
        ?>
        <li class="nav-item ">
            <a href="login.php" type="submit" class="btn text-light fw-bold">Login</a>
        <?php }
            else{
                unset($_SESSION['user_id']);
                unset($_SESSION['user_email']);
                session_destroy();
                ?>
                <a href="" type="submit" class="btn text-light fw-bold" onclick="return confirm('Do you want to sign out?')">Logout</a>
            <?php }?>

    </ul>
</header>
<!--<div >-->
<!--    <nav class="navbar navbar-expand-lg bg-body-tertiary">-->
<!--        <div class="container-fluid">-->
<!--            <a class="navbar-brand" href="#">VietCodeDi</a>-->
<!--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->
<!--            <div class="collapse navbar-collapse" style="color:black" id="navbarNav">-->
<!--                <ul class="navbar-nav" >-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link"   href="#">Home</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link"   href="#">Dashboard</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link"   href="#">Các khóa học của tôi</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                    <span class="navbar-toggler-icon"></span>-->
<!--                </button>-->
<!--                <div class="collapse navbar-collapse" id="navbarNav">-->
<!--                    <ul class="navbar-nav ml-auto">-->
<!--                        <li class="nav-item dropdown">-->
<!--                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                <img src="/BTTH02/Resource//img/avatar.jpg" class="avatar">-->
<!--                            </a>-->
<!--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
<!--                                <a class="dropdown-item" href="#">Accessibility</a>-->
<!--                                <div class="dropdown-divider"></div>-->
<!--                                <a class="dropdown-item" href="#">Profile</a>-->
<!--                                <a class="dropdown-item" href="#">Grades</a>-->
<!--                                <a class="dropdown-item" href="#">Calendar</a>-->
<!--                                <a class="dropdown-item" href="#">Private files</a>-->
<!--                                <a class="dropdown-item" href="#">Reports</a>-->
<!--                                <div class="dropdown-divider"></div>-->
<!--                                <a class="dropdown-item" href="#">Preferences</a>-->
<!--                                <div class="dropdown-divider"></div>-->
<!--                                <a class="dropdown-item" href="#">Logout</a>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </nav>-->
<!--        </div>-->
<!--    </nav>-->
<!--</div>-->