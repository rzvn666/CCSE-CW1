<?php
# page cannot be accessed by typing url
# must be logged in to access accounts

    include('../include/db-connection.php');

    session_start();
    if(isset($_SESSION['acc_id'])){
        
        $sql_customer="SELECT * FROM ccse_accounts.accounts WHERE account_id='{$_SESSION['acc_id']}'";                               
        $query_customer=$conn->query($sql_customer);
        $row_customer=$query_customer->fetch_assoc();
    
        echo'<label><strong>Name</strong><br>'.$row_customer['first_name'].'  '.$row_customer['last_name'].'</label><br><br>';
        echo'<label><strong>Email</strong><br>'.$row_customer['email'].'</label><br></br>';
        echo'<label><strong>Mobile</strong><br>'.$row_customer['mobile'].'</label><br></br>';
        echo'<label><strong>Address</strong><br>'.$row_customer['address'].'</label><br><br>';
        echo'<label><strong>Uploaded File</strong><br>'.substr($row_customer['upload'],13).'</label><br><br>';
        
    } else {
        header('Location: login.html?error=must-be-logged-in');
}

    
?>