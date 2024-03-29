<?php
# login must have 2fa, sent to registered email address
# encrypt passwords
# use html post

session_start();

$errors = array();

include('../include/db-connection.php');

if (isset($_POST['login-button'])) {
    $email = $conn -> real_escape_string($_POST['email']);
    $password = hash('sha256',$conn -> real_escape_string($_POST['psw']));
  
    if (empty($email)) {
        array_push($errors, "Email is required");
        header("Location: /login.php?error=email-empty");
        exit();
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /login.php?error=email-invalid");
        exit();
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
        header("Location: /login.php?error=password-empty");
        exit();
    }
  
    if (count($errors) == 0) {

        $query = "SELECT * FROM ccse_accounts.accounts WHERE email='$email' AND pass='$password'";
        //echo($query);
        $results = $conn->query($query);
        $rows=$results->fetch_array();
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['acc_id']=$rows['account_id'];
            $_SESSION['email'] = $rows['email'];
            $_SESSION['firstname'] = $rows['first_name'];
            if($rows['admin']==1){
                $_SESSION['admin']=1;
            }
            header('location: /index.php?success=login');
            exit();
        }else {
            header("Location: /login.php?error=wrong-username-or-password");
            exit();
        }
    }
}
  

?>
