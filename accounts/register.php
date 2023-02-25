<?php
    # register must have 2fa
    # encrypt passwords
    # use html post
    
    include('../include/db-connection.php');

    if (isset($_POST['reg-button'])) {
        // receive all input values from the form
        // Escape special characters, if any
        $firstname = $conn -> real_escape_string($_POST['firstname']);
        $lastname = $conn -> real_escape_string($_POST['lastname']);
        $email = $conn -> real_escape_string($_POST['email']);
        $password = hash('sha256',$conn -> real_escape_string($_POST['psw']));
        $conf_password = hash('sha256',$conn -> real_escape_string($_POST['psw-repeat']));

        echo($password);
        echo($conf_password);

        // form validation: ensure that the form is correctly filled ...        
        if (empty($email)) {
            header("Location: ../register.html?error=email-empty");
        } 

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register.html?error=email-invalid");
        }

        elseif(isset($email)){
            $sql = "SELECT 1 FROM ccse_accounts.accounts WHERE email='$email';";
            if ($conn->query($sql) === 1) {
                header("Location: ../register.html?error=email-taken");
            }
        }

        if (empty($password)) { 
            header("Location: ../register.html?error=pass-empty"); 
        }

        if ($password != $conf_password) {
            header("Location: ../register.html?error=pass-not-matched");
        }

        if ($password == $conf_password) {
            $sql = "INSERT INTO ccse_accounts.accounts (`first_name`, `last_name`, `email`, `pass`, `date_created`) 
            VALUES ('$firstname','$lastname','$email','$password',NOW());";
            if ($conn->query($sql) === TRUE) {
                header("Location: http://localhost");
            } else {
                echo "Error inserting: " . $conn->error;
            }
        }
        

    } else{
        header("Location: ../register.html");
    }



    $conn->close();


    //header("Location: https://localhost");
    //die();
?>
