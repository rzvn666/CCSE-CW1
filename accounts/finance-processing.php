
<?php

if(isset($_POST['finance-submit'])){
    session_start();
    include('../include/db-connection.php');

    echo $_POST['address'];

    echo '    '.$_SESSION['acc_id'];
  
    if(isset($_POST['address'])){
        $sql="UPDATE ccse_accounts.accounts SET address='{$_POST['address']}' WHERE account_id={$_SESSION['acc_id']}";
        $query=$conn->query($sql);
    } 
    echo $_POST['address'];

    if (isset($_POST['mobile'])){
        $sql="UPDATE ccse_accounts.accounts SET mobile='{$_POST['mobile']}' WHERE account_id={$_SESSION['acc_id']}";
        $query=$conn->query($sql);
    }

    if(isset($_POST['option'])){
        $sql="INSERT INTO ccse_applications.applications(acc_id, car_id, fin_id, date, status) 
        VALUES ({$_SESSION['acc_id']},{$_SESSION['car_id']},{$_POST['option']},NOW(),'PENDING')";
        $query=$conn->query($sql);
    }

    $sql="SELECT app_id FROM ccse_applications.applications WHERE acc_id={$_SESSION['acc_id']} AND car_id={$_SESSION['car_id']} AND fin_id={$_POST['option']}";
    $query=$conn->query($sql);
    $row=$query->fetch_assoc();

    if (!file_exists('../uploads/application-'.$row['app_id'].'/')) {
        mkdir('../uploads/application-'.$row['app_id'].'/', 0777, true);
    }

    $target_dir = "../uploads/application-".$row['app_id']."/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if ($uploadOk==1){
        $sql="UPDATE ccse_applications.applications SET upload='{$target_file}' WHERE app_id={$row['app_id']}";
        $query=$conn->query($sql);
    }

    $sql="UPDATE ccse_cars.cars SET reserved=1 WHERE id={$_SESSION['car_id']}";
    $query=$conn->query($sql);
    unset($_SESSION['car_id']);
    unset($_SESSION['cart']);   

    header('Location: thankyou.php');


} else {
    header('Location: error.php');
}

?>
