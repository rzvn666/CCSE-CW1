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
        echo('hellow');

    }

?>