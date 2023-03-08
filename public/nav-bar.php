<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Global Finance</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="cars.php#cars">Cars</a></li>
                <?php 
                    session_start();    
                    echo '<li class="nav-item"><a class="nav-link" href="basket.php#basket"> Basket ';
                        if(isset($_SESSION['cart'])){
                            echo '<span class="cart_count">1</span>';
                        }else{
                            echo '<span class="cart_count">0</span>';
                        }
                    echo '</a></li>';              

                    if(isset($_SESSION['email'])) {

                        if($_SESSION['admin']==1){
                            echo '<li class="nav-item"><a class="nav-link" href="admin.php">Administration</a></li>';
                        }
                        echo '<li class="nav-item"><a class="nav-link" href="account.php">Welcome, '.$_SESSION['firstname'].'</a>';
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>



