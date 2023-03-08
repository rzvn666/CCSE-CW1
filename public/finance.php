<?php
# selects finance plan, 12 months, 24 months
# customer enters personal details
# customer uploads personal docs to the platform 
# in the account.php page

include('nav-bar.php');

    session_start();

if(isset($_SESSION['email'])){

    if(isset($_POST['car-id'])){

        if(isset($_SESSION['car_id'])){

            include('../include/db-connection.php');
            $sql='SELECT * FROM ccse_cars.cars WHERE id='.$_SESSION['car_id'];
            $query=$conn->query($sql);
            while($row=$query->fetch_assoc()){

                $car_price=$row['price'];

                $option1_months=12;
                $option1_total=$car_price*1.12**1;
                $option1_price=round($option1_total/12, 2, PHP_ROUND_HALF_UP);

                $option2_months=24;
                $option2_total=$car_price*1.12**2;
                $option2_price=round($option2_total/24,2,PHP_ROUND_HALF_UP);

                $option3_months=36;
                $option3_total=round($car_price*1.12**3,2,PHP_ROUND_HALF_UP);
                $option3_price=round($option3_total/36,2,PHP_ROUND_HALF_UP);

                $option4_months=48;
                $option4_total=round($car_price*1.12**4,2,PHP_ROUND_HALF_UP);
                $option4_price=round($option4_total/48,2,PHP_ROUND_HALF_UP);

                // echo $option1_months.'<br>';
                // echo $option2_months.'<br>';
                // echo $option3_months.'<br>';
                // echo $option4_months.'<br>';
                // echo $option1_price.'<br>';
                // echo $option2_price.'<br>';
                // echo $option3_price.'<br>';
                // echo $option4_price.'<br>';
                // echo $option1_total.'<br>';
                // echo $option2_total.'<br>';
                // echo $option3_total.'<br>';
                // echo $option4_total.'<br>';

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
                echo'            <div class="customer-info">';

                echo'            </div>';
                echo'        </div>';
                //<!--end car-->

                echo'
                    <div id="financing-div">
                        <form action="/finance-processing.php" enctype="multipart/form-data" method="POST">
                            <div id="financing-form">
                                <p>Please select your financing option (12% APR):</p>
                                <input type="radio" id="option1" name="option" value="1" required>
                                <label>'.$option1_months.' months @ £'.$option1_price.' for a total of £'.$option1_total.'.00</label><br>
                                <input type="radio" id="option2" name="option" value="2" required>
                                <label>'.$option2_months.' months @ £'.$option2_price.' for a total of £'.$option2_total.'</label><br>
                                <input type="radio" id="options" name="option" value="3" required>
                                <label>'.$option3_months.' months @ £'.$option3_price.' for a total of £'.$option3_total.'</label><br>
                                <input type="radio" id="options" name="option" value="4" required>
                                <label>'.$option4_months.' months @ £'.$option4_price.' for a total of £'.$option4_total.'</label><br><br>
                            </div>

                            <div id="customer-info-financing">';

                                $sql_customer='SELECT * FROM ccse_accounts.accounts WHERE email="'.$_SESSION['email'].'" AND first_name="'.$_SESSION['firstname'].'"';                                
                                $query_customer=$conn->query($sql_customer);
                                $row_customer=$query_customer->fetch_assoc();

                                    echo'<label><strong>Name</strong><br>'.$row_customer['first_name'].'  '.$row_customer['last_name'].'</label><br><br>';
                                    echo'<label><strong>Email</strong><br>'.$row_customer['email'].'</label><br></br>';
                            
                                if($row_customer['mobile']==NULL){ 
                                    echo' <label><strong>Mobile phone</strong></label><br>';
                                    echo' <input type="text" placeholder="Enter mobile number" name="mobile" id="mobile" required><br><br>';
                                } else{
                                    echo'<label><strong>Mobile</strong><br>'.$row_customer['mobile'].'</label><br></br>';
                                }

                                if($row_customer['address']==NULL){
                                    echo' <label><strong>Address</strong></label><br>';
                                    echo' <input type="text" placeholder="Enter address" name="address" id="address" required><br><br>';
                                } else{
                                    echo'<label><strong>Address</strong><br>'.$row_customer['address'].'</label><br><br>';
                                }

                                if($row_customer['upload']==NULL){
                                    echo' <label><strong>Upload documents</strong></label><br>';
                                    echo' <input type="hidden" id="hidden" name="isUploaded" value="1">';
                                    echo' <input type="file" id="upload-doc" name="fileToUpload" required>';
                                } else {
                                    1==1;
                                }

                echo'       </div>
                            <br>
                            <input type="submit" value="Submit" name="finance-submit">

                        </form>
                    </div>
                ';

            }
            
        } else {
            header('Location: basket.php');
        }

    } else{
        header('Location: basket.php');
    }

}else{
    header('Location: login.php');
}

?>