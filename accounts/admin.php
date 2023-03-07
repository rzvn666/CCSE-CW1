<?php
# available only with admin accounts
# when an admin logs into the website, an admin button is on
# clicking it redirects you to this page
# admins can keep track of inventory, cars sold
# finance applications and customer documents

# page cannot be accessed by typing url
# only admins, no other accounts logged in

    session_start();

    if($_SESSION['firstname']!='admin' AND $_SESSION['email']!='admin@admin.com' AND $_SESSION['admin']!=1){
        header('Location: error.php');
    } else {
        include('../include/db-connection.php');
        echo('<h1> Welcome, admin</h1>');
        
        echo'<h1>SOLD INVENTORY</h1>';

        $sql='SELECT * FROM ccse_cars.cars';
        $query=$conn->query($sql);
        while($row=$query->fetch_assoc()){
            if($row['sold']==1){
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
                echo'        </div>';
                //<!--end car-->
            }
        }

        echo'<h1>RESERVED INVENTORY</h1>';

        $sql='SELECT * FROM ccse_cars.cars';
        $query=$conn->query($sql);
        while($row=$query->fetch_assoc()){
            if($row['reserved']==1){
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
                echo'        </div>';
                //<!--end car-->
            }
        }

        echo' <h1>CUSTOMER UPLOADS</h1>';
        $sql_customer='SELECT account_id, email, upload FROM ccse_accounts.accounts';
        $query_customer=$conn->query($sql_customer);

        while($row_customer=$query_customer->fetch_assoc()){
            if(isset($row_customer['upload'])){
                echo'<div id="customer-uploads" style="background-color:#b5b5b5; width:640;">';
                    echo'<label><strong>Customer</strong><br>'.$row_customer['email'].'</label><br></br>';
                    echo'<label><strong>Uploaded File</strong><br><a href="'.$row_customer['upload'].'">'.substr($row_customer['upload'],13).'</a></label><br><br>';            
                    
                    $sql_application="SELECT * FROM ccse_applications.applications WHERE acc_id={$row_customer['account_id']}";
                    $query_application=$conn->query($sql_application);
                    $row_application=$query_application->fetch_assoc();
                
                    $sql_cust_car="SELECT * FROM ccse_cars.cars WHERE id={$row_application['car_id']}";
                    $query_cust_car=$conn->query($sql_cust_car);
                    $row_cust_car=$query_cust_car->fetch_assoc();

                    $sql_financing="SELECT * FROM ccse_applications.finance_options WHERE foption_id={$row_application['fin_id']}";
                    $query_financing=$conn->query($sql_financing);
                    $row_financing=$query_financing->fetch_assoc();

                    echo'<label><strong>Car</strong><br>'.$row_cust_car['make'].' '.$row_cust_car['model'].' '.$row_cust_car['year'].'</label><br></br>';
                    echo'<label><strong>Financing type</strong><br>'.$row_financing['months'].' months @ £'.$row_financing['price'].' per month. <br><strong>Total: £'.$row_financing['total'].'</strong></label><br></br>';
                    echo'<label><strong>Status</strong><br>'.$row_application['status'].'</label><br></br>';

                    if($row_application['status']=='PENDING'){
                        echo'<form action="process-application.php" method="POST">';
                        echo'   <input type="hidden" name="car-id" value='.$row_cust_car['id'].'>';
                        echo'   <button name="send" value="approve">Approve</button>';
                        echo'   <input type="hidden" name="car-id" value='.$row_cust_car['id'].'>';
                        echo'   <button name="send" value="deny">Deny</button>';
                        echo'</form>';
                    }
                echo'</div><br>';
            }

        }
    }

?>