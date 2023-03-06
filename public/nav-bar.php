<html>
    <body>
        <ul>
            <li><a href="http://localhost">Home</a></li>
            <li><a href="cars.php">Cars</a></li>
            <?php 
                session_start();    
                echo '<li><a href="basket.php"> Basket ';
                    if(isset($_SESSION['cart'])){
                        echo '<span class="cart_count">1</span>';
                    }else{
                        echo '<span class="cart_count">0</span>';
                    }
                echo '</a></li>';              

                if(isset($_SESSION['email'])) {

                    if($_SESSION['admin']==1){
                        echo "<li><a href='admin.php'>Administration</a></li>";
                    }
                    echo "<a href='account.php'>Welcome, ".$_SESSION['firstname']."</a>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                } else {
                    echo '<li><a href="login.html">Login</a></li>';
                }
            ?>
        </ul>
    </body>
</html>