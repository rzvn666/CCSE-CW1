<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Global Finance - Basket</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body id="page-top">

    <?php include('nav-bar.php'); ?>


    <section class="signup-section" id="title">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase text-white">Basket</h1>
                </div>
            </div>
        </div>
    </section>


    <!--car section begins-->
    <section class="projects-section bg-light" id="basket">
        <div class="container px-4 px-lg-5">

            <?php
                    session_start();

                    if(isset($_POST['send']))
                    {
                        $_SESSION['cart']=1;
                        if(isset($_SESSION['cart'])){        
                            if($_SESSION['car_id']==$_POST['car-id']){
                                echo '<script>alert("Item Already Added")</script>';  
                                echo '<script>window.location="cars.php"</script>';
                            }else{
                                $_SESSION['car_id'] = $_POST['car-id'];
                                echo '<script>window.location="basket.php"</script>';   
                            }
                        }
                        else  
                        {  
                            $_SESSION['car_id'] = $_POST['car-id'];
                            echo '<script>window.location="cars.php"</script>';
                        }  
                    }
                    if(isset($_SESSION['car_id'])){

                        include('../include/db-connection.php');
                        $sql='SELECT * FROM ccse_cars.cars WHERE id='.$_SESSION['car_id'];
                        $query=$conn->query($sql);

                        while($row=$query->fetch_assoc()){


                            //<!--start car-->
                            echo'       <div class="row gx-0 mb-4 mb-lg-5 align-items-center">';
                            echo'           <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="'.$row['image'].'" alt="'.$row['make'].'-'.$row['model'].'-'.$row['year'].'"/></div>';
                            echo'               <div class="col-xl-4 col-lg-5">';
                            echo'                    <div class="featured-text text-center text-lg-left">';
                            echo'                       <h4>'.$row['make'].' '.$row['model'].'</h4>';
                            echo'                       <h5>'.$row['year'].'</h5>';
                            echo'                       <h6 class="car-value">£'.$row['price'][0].','.substr($row['price'],1).'.00</h6>';
                            echo'                       <form class="p-2" action="finance.php" method="POST">';
                            echo'                           <input type="hidden" name="car-id" value='.$row['id'].'/>';
                            echo'                           <button class="btn btn-primary" name="send" value="finance">Finance this car</button>';
                            echo'                       </form>';
                            echo'                       <form class="p-2" action="checkout.php" method="POST">';
                            echo'                           <input type="hidden" name="car-id" value='.$row['id'].'/>';
                            echo'                           <button class="btn btn-primary" name="send" value="full">Full payment</button>';
                            echo'                       </form>';
                            echo'                       <form class="p-2" action="remove-cart.php" method="POST">';
                            echo'                           <input type="hidden" name="car-id" value='.$row['id'].'/>';
                            echo'                           <button class="btn btn-primary" name="send" value="full">Remove</button>';
                            echo'                       </form>';
                            echo'                   </div>';
                            echo'               </div>';
                            echo'        </div>';
                            //<!--end car-->

                        }
                        
                    } else {
                        echo' <h1 class="text-center"> Your basket is empty. <a href="cars.php">Click here</a> to see our inventory</h1>';
                    }
                ?>

        </div>
    </section>
    <!--car section ends-->

    <!-- Contact-->
    <section class="contact-section bg-black" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Global Finance Dealership, Spon End, Coventry CV1 3HF</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">contact@globalfinance.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">024 5468 7291</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Global Finance 2022-2023</div></footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>

