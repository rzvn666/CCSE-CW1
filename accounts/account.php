<?php
# page cannot be accessed by typing url
# must be logged in to access accounts

    session_start();
    if(isset($_SESSION['firstname']) AND isset($_SESSION['email'])){
        echo 'hello';
    } else {
        header('Location: login.html?error=must-be-logged-in');
    }

?>