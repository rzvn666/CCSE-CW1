<?php
    # register must have 2fa
    # encrypt passwords
    # use html post
    
    include('../include/db-connection.php');

    session_start();

    if (isset($_POST['reg-button'])) {
        // receive all input values from the form
        // Escape special characters, if any
        $firstname = $conn -> real_escape_string($_POST['firstname']);
        $lastname = $conn -> real_escape_string($_POST['lastname']);
        $email = $conn -> real_escape_string($_POST['email']);
        $password = hash('sha256',$conn -> real_escape_string($_POST['psw']));
        $conf_password = hash('sha256',$conn -> real_escape_string($_POST['psw-repeat']));

        // form validation: ensure that the form is correctly filled ...        
        if (empty($email)) {
            header("Location: /register.php?error=email-empty");
            exit();
        } 

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /register.php?error=email-invalid");
            exit();
        }

        elseif(isset($email)){
            $sql = "SELECT 1 FROM ccse_accounts.accounts WHERE email='$email';";
            $query = $conn->query($sql);
            if ($query->num_rows) {
                header("Location: /register.php?error=email-taken");
                exit();
            }
        }

        if (empty($password)) { 
            header("Location: /register.php?error=pass-empty"); 
            exit();
        }

        if ($password != $conf_password) {
            header("Location: /register.php?error=pass-not-matched");
            exit();
        }

        if ($password == $conf_password) {
            $sql = "INSERT INTO ccse_accounts.accounts (`first_name`, `last_name`, `email`, `pass`, `date_created`) 
            VALUES ('$firstname','$lastname','$email','$password',NOW());";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['email']=$email;
                $_SESSION['firstname']=$firstname;


                $sql = "SELECT * FROM ccse_accounts.accounts WHERE email='$email' AND pass='$password'";
                $query=$conn->query($sql);
                $rows=$query->fetch_array();
                $_SESSION['acc_id']=$rows['account_id'];
                
                header("Location: /index.php");
                exit();
            } else {
                header("Location: /register.php?error=wrong-query");
                exit();
            }
        }
        

    }
?>
