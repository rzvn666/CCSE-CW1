<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Global Finance - Cars</title>
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

    <section class="signup-section" id="financing">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase text-white">Financing</h1>
                </div>
            </div>
        </div>
    </section>

        <?php
            # selects finance plan, 12 months, 24 months
            # customer enters personal details
            # customer uploads personal docs to the platform 
            # in the account.php page

            session_start();

            if(isset($_SESSION['email'])){

                if(isset($_POST['car-id'])){

                    if(isset($_SESSION['car_id'])){

                        include('../include/db-connection.php');
                        $sql='SELECT * FROM ccse_cars.cars WHERE id='.$_SESSION['car_id'];
                        $query=$conn->query($sql);
                        while($row=$query->fetch_assoc()){

                            $car_price=$row['price'];

                            $option1_months=12;
                            $option1_total=$car_price*1.12**1;
                            $option1_price=round($option1_total/12, 2, PHP_ROUND_HALF_UP);

                            $option2_months=24;
                            $option2_total=$car_price*1.12**2;
                            $option2_price=round($option2_total/24,2,PHP_ROUND_HALF_UP);

                            $option3_months=36;
                            $option3_total=round($car_price*1.12**3,2,PHP_ROUND_HALF_UP);
                            $option3_price=round($option3_total/36,2,PHP_ROUND_HALF_UP);

                            $option4_months=48;
                            $option4_total=round($car_price*1.12**4,2,PHP_ROUND_HALF_UP);
                            $option4_price=round($option4_total/48,2,PHP_ROUND_HALF_UP);


                            //<!--car section begins-->
                            echo' <section class="projects-section bg-light" id="cars">';
                            echo'   <div class="container px-4 px-lg-5">';

                            //<!--start car-->
                            echo'       <div class="row gx-0 mb-4 mb-lg-5 align-items-center">';
                            echo'           <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="'.$row['image'].'" alt="'.$row['make'].'-'.$row['model'].'-'.$row['year'].'"/></div>';
                            echo'               <div class="col-xl-4 col-lg-5">';
                            echo'                    <div class="featured-text text-center text-lg-left">';
                            echo'                       <h4>'.$row['make'].' '.$row['model'].'</h4>';
                            echo'                       <h5>'.$row['year'].'</h5>';
                            echo'                       <h6 class="car-value">£'.$row['price'][0].','.substr($row['price'],1).'.00</h6>';
                            echo'                   </div>';
                            echo'               </div>';
                            echo'        </div>';
                            //<!--end car-->


                            echo'    </div>';
                            echo' </section>';
                            //<!--car section ends-->

                            echo'<form action="/finance-processing.php" enctype="multipart/form-data" method="POST">';
                            //<!-- financing options-->
                            echo'<section class="about-section text-center" id="finance-options">';
                            echo'    <div class="container px-4 px-lg-5">';
                            echo'       <div class="row gx-4 gx-lg-5 justify-content-center">';
                            echo'           <div class="col-lg-8">';
                            echo'               <h2 class="text-white mb-4">Financing options</h2>';
                            echo'                <p class="text-white-50">';
                            echo'                   <input class="form-check-input" type="radio" id="option1" name="option" value="1" required>';
                            echo'                   <label class="form-check-label text-white">'.$option1_months.' months @ £'.$option1_price.' for a total of £'.$option1_total.'.00</label><br>';
                            echo'                   <input class="form-check-input" type="radio" id="option2" name="option" value="2" required>';
                            echo'                   <label class="form-check-label text-white">'.$option2_months.' months @ £'.$option2_price.' for a total of £'.$option2_total.'</label><br>';
                            echo'                   <input class="form-check-input" type="radio" id="options" name="option" value="3" required>';
                            echo'                   <label class="form-check-label text-white">'.$option3_months.' months @ £'.$option3_price.' for a total of £'.$option3_total.'</label><br>';
                            echo'                   <input class="form-check-input" type="radio" id="options" name="option" value="4" required>';
                            echo'                   <label class="form-check-label text-white">'.$option4_months.' months @ £'.$option4_price.' for a total of £'.$option4_total.'</label><br><br>';
                            echo'                </p>';
                            echo'            </div>';
                            echo'        </div>';
                            echo'   </div>';
                            echo'</section>';

                            $sql_customer='SELECT * FROM ccse_accounts.accounts WHERE email="'.$_SESSION['email'].'" AND first_name="'.$_SESSION['firstname'].'"';                                
                            $query_customer=$conn->query($sql_customer);
                            $row_customer=$query_customer->fetch_assoc();

                            //<!-- Contact-->
                            echo'<section class="contact-section bg-white">';
                            echo'    <h2 class="text-black mb-4 text-center">Customer Details</h2>';
                            echo'    <div class="container px-4 px-lg-5">';
                            echo'        <div class="row gx-4 gx-lg-5">';
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
                            if($row_customer['mobile']==NULL){ 
                                echo' <div class="col p-3"><input class="form-control" type="text" placeholder="Enter Mobile Number" name="mobile" id="mobile" required/></div>';
                            } else{
                                echo'            <div class="text-black">'.$row_customer['mobile'].'</div>';
                            }
                            echo'        </div>';
                            echo'    </div>';
                            echo'</div>';
                            echo'<div class="col-md-18 mb-3 mb-md">';
                            echo'    <div class="card py-4">';
                            echo'        <div class="card-body text-center">';
                            echo'            <i class="fas fa-map-marked-alt text-primary mb-2"></i>';
                            echo'            <h4 class="text-uppercase m-0">Address</h4>';
                            echo'            <hr class="my-4 mx-auto" />';
                            if($row_customer['mobile']==NULL){ 
                                echo' <div class="col p-3"><input class="form-control" type="text" placeholder="Enter Address" name="address" id="address" required/></div>';
                            } else{
                                echo'            <div class="text-black">'.$row_customer['address'].'</div>';
                            }
                            echo'        </div>';
                            echo'    </div>';
                            echo'</div>';
                            echo'<div class="col-md-18 mb-3 mb-md">';
                            echo'    <div class="card py-4">';
                            echo'        <div class="card-body text-center">';
                            echo'            <i class="fas fa-file text-primary mb-2"></i>';
                            echo'            <h4 class="text-uppercase m-0">Upload Document</h4>';
                            echo'            <hr class="my-4 mx-auto" />';
                            echo'            <input type="hidden" id="hidden" name="isUploaded" value="1">';
                            echo'            <div class="col p-3"><input class="form-control" type="file" id="upload-doc" name="fileToUpload" required/></div>';
                            echo'        </div>';
                            echo'    </div>';
                            echo'</div>';

                            echo'<div class="p-4 text-center">';
                            echo'<input class="btn btn-primary" type="submit" value="Submit" name="finance-submit">';
                            echo'</div>';

                            echo'</div>';
                            echo'</div>';
                            echo'</section>';
                            
                            


                            echo'</form>';

                        }
                        
                    } else {
                        header('Location: basket.php');
                    }

                } else{
                    header('Location: basket.php');
                }

            }else{
                header('Location: login.php');
            }

            ?>


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
