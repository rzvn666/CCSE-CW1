<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Global Finance - Admin</title>
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

    <?php 
    
        include('nav-bar.php'); 
        session_start();

        if($_SESSION['firstname']!='admin' AND $_SESSION['email']!='admin@admin.com' AND $_SESSION['admin']!=1){
            header('Location: error.php');
        }
    ?>

    <section class="signup-section" id="admin">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase text-white">Administration page</h1>
                </div>
            </div>
        </div>
    </section>

            <?php
            include('../include/db-connection.php');

            echo' <section class="projects-section bg-light" id="sold">';
            echo'   <div class="container px-4 px-lg-5">';
            echo'<h2 class="text-center py-4">Sold Inventory</h2>';

            $sql='SELECT * FROM ccse_cars.cars';
            $query=$conn->query($sql);
            while($row=$query->fetch_assoc()){
                if($row['sold']==1){
                            //<!--sold section begins-->


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


                          
                }
            }

            echo'    </div>';
            echo' </section>';
            //<!--sold section ends-->


            //<!--reserved section begins-->
            echo' <section class="projects-section bg-light" id="reserved">';
            echo'   <div class="container px-4 px-lg-5">';
            echo'<h2 class="text-center py-4">Reserved Inventory</h2>';

            $sql='SELECT * FROM ccse_cars.cars';
            $query=$conn->query($sql);
            while($row=$query->fetch_assoc()){
                if($row['reserved']==1){
           

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



                }
            }

            echo'    </div>';
            echo' </section>';
            //<!--reserved car section ends-->

            //<!-- Contact-->

            $sql_customer='SELECT account_id, email FROM ccse_accounts.accounts';
            $query_customer=$conn->query($sql_customer);

            echo'<section class="contact-section bg-white pb-5">';
            echo'    <h2 class="text-black mb-4 text-center">Applications</h2>';
            echo'    <div class="container px-4 px-lg-5">';
            echo'        <div class="row gx-4 gx-lg-5">';
    
            while($row_customer=$query_customer->fetch_assoc()){
    
                $sql_application="SELECT * FROM ccse_applications.applications WHERE acc_id={$row_customer['account_id']}";
                $query_application=$conn->query($sql_application);
    
                while($row_application=$query_application->fetch_assoc()){
                    $sql_cust_car="SELECT * FROM ccse_cars.cars WHERE id={$row_application['car_id']}";
                    $query_cust_car=$conn->query($sql_cust_car);
                    $row_cust_car=$query_cust_car->fetch_assoc();

                    $sql_financing="SELECT * FROM ccse_applications.finance_options WHERE foption_id={$row_application['fin_id']}";
                    $query_financing=$conn->query($sql_financing);
                    $row_financing=$query_financing->fetch_assoc();

                    echo' <div class="col-md-18 mb-3 mb-md-0">';
                    echo'    <div class="card py-4 h-100">';
                    echo'        <div class="card-body text-center">';
                    echo'            <i class="fa-regular fa-clipboard text-primary mb-2"></i>';
                    echo'            <h3>'.$row_cust_car['make'].' '.$row_cust_car['model'].'</h3>';
                    echo'            <h4>'.$row_cust_car['year'].'</h4>';
                    echo'            <hr class="my-4 mx-auto" />';

                    echo'            <div class="p-3">';
                    echo'               <i class="fas fa-envelope text-primary mb-2"></i>';
                    echo'               <h5>Customer Email</h3>';
                    echo'               <h6>'.$row_customer['email'].'</h4>';
                    echo'            </div>';

                    echo'            <div class="p-3">';
                    echo'               <i class="fas fa-file text-primary mb-2"></i>';
                    echo'               <h5>Uploaded File</h5>';
                    echo'               <h6><a href="'.$row_application['upload'].'">'.substr($row_application['upload'],25).'</a></h6>';     
                    echo'            </div>';


                    echo'            <div class="p-3">';
                    echo'               <i class="fas fa-calendar text-primary mb-2"></i>';
                    echo'               <h5>Application Date</h5>';
                    echo'               <h6>'.$row_application['date'].'</h6>';
                    echo'            </div>';

                    echo'            <div class="p-3">';
                    echo'               <i class="fas fa-dollar text-primary mb-2"></i>';
                    echo'               <h5>Financing Type</h5>';
                    echo'               <h6>'.$row_financing['months'].' months @ £'.$row_financing['price'].' per month. <br><strong>Total: £'.$row_financing['total'].'</strong></h6>';
                    echo'            </div>';

                    echo'            <div class="p-3">';
                    echo'               <i class="fas fa-clock text-primary mb-2"></i>';
                    echo'               <h5>Status</h5>';
                    echo'               <h6>'.$row_application['status'].'</h6>';
                    echo'            </div>';

                    if($row_application['status']=='PENDING'){
                        echo'<form action="process-application.php" method="POST">';
                        

                        echo'<div class="p-1 text-center">';                        
                        echo'<input type="hidden" name="car-id" value='.$row_cust_car['id'].'>';
                        echo'<button class="btn btn-primary" name="send" value="approve">Approve</button>';
                        echo' ';
                        echo'<input type="hidden" name="car-id" value='.$row_cust_car['id'].'>';
                        echo'<button class="btn btn-danger" name="send" value="deny">Deny</button>';
                        echo'</div>';

                        echo'</form>';
                    }       
                    echo'        </div>';
                    echo'    </div>';
                    echo'</div>';
                    
      
                }
            }
             
            echo'</div>';
            echo'</div>';
            echo'</section>';

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
