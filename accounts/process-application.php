<?php 

session_start();

if($_SESSION['admin']==1){
    if(isset($_POST['send'])){
        include('../include/db-connection.php');
        if($_POST['send']=='approve'){
            $sql_car="UPDATE ccse_cars.cars SET sold=1, reserved=0 WHERE id={$_POST['car-id']}";
            $query_car=$conn->query($sql_car);

            $sql_app="UPDATE ccse_applications.applications SET status='APPROVED' WHERE car_id={$_POST['car-id']}";
            $query_app=$conn->query($sql_app);

            header('location: admin.php');


        } elseif($_POST['send']=='deny'){
            $sql_car="UPDATE ccse_cars.cars SET reserved=0 WHERE id={$_POST['car-id']}";
            $query_car=$conn->query($sql_car);

            $sql_app="UPDATE ccse_applications.applications SET status='DENIED' WHERE car_id={$_POST['car-id']}";
            $query_app=$conn->query($sql_app);
            header('location: admin.php');

        }

    }else{
        header('location: admin.php');
    }
} else{
 header('location: error.php');
}


?>