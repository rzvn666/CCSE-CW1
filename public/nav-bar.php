<html>
    <body>
        <ul>
            <li><a href="http://localhost">Home</a></li>
            <li><a href="cars.html">Cars</a></li>
            <li><a href="basket.php">Basket</a></li>
            <?php 
                session_start();
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