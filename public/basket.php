<?php
# two options, pay full or finance
# select full, redirect to checkout.php
# select finance, redirect to finance.php

include('nav-bar.php');

    session_start();

    if(isset($_POST['send']))
    {
        $_SESSION['cart']=1;
        if(isset($_SESSION['cart'])){        
            if($_SESSION['car_id']==$_POST['car-id']){
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cars.php"</script>';
            }else{
                $_SESSION['car_id'] = $_POST['car-id'];
                echo '<script>window.location="cars.php"</script>';   
            }
        }
        else  
        {  
            $_SESSION['car_id'] = $_POST['car-id'];
            echo '<script>window.location="cars.php"</script>';
        }  
    }

    if(isset($_SESSION['car_id'])){

        include('../include/db-connection.php');
        $sql='SELECT * FROM ccse_cars.cars WHERE id='.$_SESSION['car_id'];
        $query=$conn->query($sql);
        while($row=$query->fetch_assoc()){

            //<!--start car-->
            echo'        <div class="car-card">';
            echo'            <div class="img-container">';
            echo'                <img src="'.$row['image'].'" width="320" height="180" alt="'.$row['make'].'-'.$row['model'].'-'.$row['year'].'">';
            echo'            </div>';
            echo'            <div class="car-info">';
            echo'                <div class="car-label">';
            echo'                    <div class="car-name-label">';
            echo'                        <span class="car-name">'.$row['make'].' '.$row['model'].'</span>';
            echo'                        <span class="car-year">'.$row['year'].'</span>';
            echo'                    </div>';
            echo'                <div class="car-price-label">';
            echo'                    <span class="car-value">£'.$row['price'][0].','.substr($row['price'],1).'.00</span>';
            echo'                </div>';
            echo'            </div>';
            echo'            <div class="car-cart-button">';
            echo'                <form action="finance.php" method="POST">';      
            echo'                    <input type="hidden" name="car-id" value='.$row['id'].'>';
            echo'                    <button name="send" value="finance">Finance this car</button>';
            echo'                </form>';
            echo'                <form action="checkout.php" method="POST">';      
            echo'                    <input type="hidden" name="car-id" value='.$row['id'].'>';
            echo'                    <button name="send" value="full">Full payment</button>';
            echo'                </form>';
            echo'                <form action="remove-cart.php" method="POST">';      
            echo'                    <button name="send" value="full">Remove this car from your cart</button>';
            echo'                </form>';
            echo'            </div>';
            echo'        </div>';
            //<!--end car-->

        }
        
    } else {
        echo' <h1> Your basket is empty. See our <a href="cars.php">inventory</a></h1>';
    }




