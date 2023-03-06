<?php
# take customer details
# card details, etc

include('nav-bar.php');

if(isset($_POST['car-id'])){

    echo'<h1>Please make the full payment at your local dealership</h1>';

    echo'<style>';
    echo'#map {';
    echo'height: 400px;';
    echo'width: 45%; ';
    echo'}';
    echo'</style>';
    echo'<html>';
    echo'<head>';
    echo'    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>';
    echo'    <script type="module" src="/js/index.js"></script>';
    echo'</head>';
    echo'<body>';
    echo'    <div id="map"></div>';
    echo'    <script async';
    echo'        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBroPU84jDYqgJVS1SyNdKNaTVQqs1fuog&callback=initMap">';
    echo'    </script>';
    echo'</body>';
    echo'</html>';

} else{
    header('Location: basket.php');
}