<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Global Finance - Account</title>
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

    <section class="signup-section" id="account">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase text-white">Account Details</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="contact-section bg-white">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">

            <?php
            # page cannot be accessed by typing url
            # must be logged in to access accounts

                include('../include/db-connection.php');

                session_start();
                if(isset($_SESSION['acc_id'])){
                    
                    $sql_customer="SELECT * FROM ccse_accounts.accounts WHERE account_id='{$_SESSION['acc_id']}'";                               
                    $query_customer=$conn->query($sql_customer);
                    $row_customer=$query_customer->fetch_assoc();


                    echo'<div class="col-md-20 mb-3 mb-md">';
                    echo'    <div class="card py-4">';
                    echo'        <div class="card-body text-center">';
                    echo'            <i class="fas fa-address-book text-primary mb-2"></i>';
                    echo'            <h4 class="text-uppercase m-0">Name</h4>';
                    echo'            <hr class="my-4 mx-auto" />';
                    echo'            <div class="text-black">'.$row_customer['first_name'].'  '.$row_customer['last_name'].'</div>';
                    echo'        </div>';
                    echo'    </div>';
                    echo'</div>';
                    echo'<div class="col-md-18 mb-3 mb-md">';
                    echo'    <div class="card py-4">';
                    echo'        <div class="card-body text-center">';
                    echo'            <i class="fas fa-envelope text-primary mb-2"></i>';
                    echo'            <h4 class="text-uppercase m-0">Email</h4>';
                    echo'            <hr class="my-4 mx-auto" />';
                    echo'            <div class="text-black">'.$row_customer['email'].'</div>';
                    echo'        </div>';
                    echo'    </div>';
                    echo'</div>';
                    echo'<div class="col-md-18 mb-3 mb-md">';
                    echo'    <div class="card py-4">';
                    echo'        <div class="card-body text-center">';
                    echo'            <i class="fas fa-mobile-alt text-primary mb-2"></i>';
                    echo'            <h4 class="text-uppercase m-0">Mobile phone</h4>';
                    echo'            <hr class="my-4 mx-auto" />';
                    echo'            <div class="text-black">'.$row_customer['mobile'].'</div>';
                    echo'        </div>';
                    echo'    </div>';
                    echo'</div>';
                    echo'<div class="col-md-18 mb-3 mb-md pb-5">';
                    echo'    <div class="card py-4">';
                    echo'        <div class="card-body text-center">';
                    echo'            <i class="fas fa-map-marked-alt text-primary mb-2"></i>';
                    echo'            <h4 class="text-uppercase m-0">Address</h4>';
                    echo'            <hr class="my-4 mx-auto" />';
                    echo'            <div class="text-black">'.$row_customer['address'].'</div>';
                    echo'        </div>';
                    echo'    </div>';
                    echo'</div>';

                    $sql="SELECT * FROM ccse_applications.applications WHERE acc_id='{$_SESSION['acc_id']}'";                               
                    $query=$conn->query($sql);
                    while($row=$query->fetch_assoc()){;

                        if(isset($row['app_id'])){
                            $sql_car="SELECT * FROM ccse_cars.cars WHERE id='{$row['car_id']}'";                               
                            $query_car=$conn->query($sql_car);
                            $row_car=$query_car->fetch_assoc();
                            echo'<div class="col-md-18 mb-3 mb-md mt-md-5">';
                            echo'    <div class="card py-4">';
                            echo'        <div class="card-body text-center">';
                            echo'            <i class="fas fa-clock text-primary mb-2"></i>';
                            echo'            <h4 class="text-uppercase m-0">Application Status</h4>';
                            echo'            <hr class="my-4 mx-auto" />';
                            echo'            <h4>'.$row_car['make'].' '.$row_car['model'].'</h4>';
                            echo'            <h5>'.$row_car['year'].'</h5>';
                            if($row['status']=="APPROVED"){
                                echo'            <h2 class="btn btn-primary">'.$row['status'].'</h2>';
                            }elseif($row['status']=="DENIED"){
                                echo'            <h2 class="btn btn-danger">'.$row['status'].'</h2>';
                            }else{
                                echo'            <h2 class="btn btn-light">'.$row['status'].'</h2>';
                            }
                            echo'        </div>';
                            echo'    </div>';
                            echo'</div>';
                            echo'<div class="col-md-18 mb-3 mb-md">';
                            echo'    <div class="card py-4">';
                            echo'        <div class="card-body text-center">';
                            echo'            <i class="fas fa-calendar-days text-primary mb-2"></i>';
                            echo'            <h4 class="text-uppercase m-0">Application Date</h4>';
                            echo'            <hr class="my-4 mx-auto" />';
                            echo'            <div class="text-black">'.$row['date'].'</div>';
                            echo'        </div>';
                            echo'    </div>';
                            echo'</div>';
                            echo'<div class="col-md-18 mb-3 mb-md pb-5">';
                            echo'    <div class="card py-4">';
                            echo'        <div class="card-body text-center">';
                            echo'            <i class="fas fa-file text-primary mb-2"></i>';
                            echo'            <h4 class="text-uppercase m-0">Uploaded File</h4>';
                            echo'            <hr class="my-4 mx-auto" />';
                            echo'            <div class="text-black"><a href="'.$row['upload'].'">'.substr($row['upload'],25).'</a></div>';
                            echo'        </div>';
                            echo'    </div>';
                            echo'</div>';

                        }
                    }
                    
                } else {
                    header('Location: login.php?error=must-be-logged-in');
            }

                
            ?>

            

            </div>
        </section>
        

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
