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
            header("Location: register.html?error=email-empty");
            die();
        } 

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: register.html?error=email-invalid");
            die();
        }

        elseif(isset($email)){
            $sql = "SELECT 1 FROM ccse_accounts.accounts WHERE email='$email';";
            $query = $conn->query($sql);
            if ($query->num_rows) {
                header("Location: register.html?error=email-taken");
                die();
            }
        }

        if (empty($password)) { 
            header("Location: register.html?error=pass-empty"); 
            die();
        }

        if ($password != $conf_password) {
            header("Location: register.html?error=pass-not-matched");
            die();
        }

        if ($password == $conf_password) {
            $sql = "INSERT INTO ccse_accounts.accounts (`first_name`, `last_name`, `email`, `pass`, `date_created`) 
            VALUES ('$firstname','$lastname','$email','$password',NOW());";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                $_SESSION['acc_id']=$rows['account_id'];
                $_SESSION['email']=$email;
                $_SESSION['firstname']=$firstname;
                header("Location: index.php");
                die();
            } else {
                header("Location: register.html?error=wrong-query");
                die();
            }
        }
        

    } else{
        header("Location: register.html");
        die();
    }

?>
