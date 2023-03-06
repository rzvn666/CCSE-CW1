<?php 

include('nav-bar.php');

session_start();

unset($_SESSION['car_id']);
unset($_SESSION['cart']);
header('Location: index.php'); 


?>