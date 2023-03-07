<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <?php include('nav-bar.php'); ?>

    <div class="main-div">
        <div class="cars-div">

        <?php

        include('../include/db-connection.php');
        $sql='SELECT * FROM ccse_cars.cars';
        $query=$conn->query($sql);
        while($row=$query->fetch_assoc()){
            if($row['sold']==0 AND $row['reserved']==0){
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
                echo'                    <form action="basket.php" method="POST">';
                echo'                       <input type="hidden" name="car-id" value='.$row['id'].'>';
                echo'                        <button name="send" value="add">Add To Cart</button>';
                echo'                    </form>';
                echo'            </div>';
                echo'        </div>';
                //<!--end car-->
            } else {
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
                 echo'                    <span class="car-value">£'.$row['price'][0].','.substr($row['price'],1).'.00 ----- <strong>UNAVAILABLE</strong></span>';
                 echo'                </div>';
                 echo'            </div><br>';
                 //<!--end car-->
            }
        }
        ?>  
        </div>


    </div>

</body>
</html>
