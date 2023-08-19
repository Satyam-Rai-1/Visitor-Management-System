<?php
include('includes/header.php');
include('includes/navbar.php')
?>

       


<!-- Begin Page Content -->

<!-- First Container-fluid Start -->
                
<div class = "container-fluid">
    <!-- carosol Start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block " width = "100%" height= "400px" src="img/img1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block " width = "100%" height= "400px" src=" img/img8.jpg "  alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block " width = "100%" height= "400px" src="img/img4.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- carosol Start -->

</div>
<!-- /First container-fluid End -->




<!-- Second Contaoner-Fluid Start -->

<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Portals</h1>
                        <a href="visitor.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add Visitors</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Managers Card Example -->
                       
                        <div class="col-xl-4 col-md-6 mb-4">
                        <a href = "login.php" class = "text-decoration-none">
                            <div class="card border-left-primary shadow h-100 py-4">
                                
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg  font-weight-bold text-primary text-uppercase mb-1">
                                                Admin</div>
                                            <div class="h5 text-xs mb-0 font-weight-bold text-gray-800">
                                                Click Here !  Login
                                        </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        

                        <!-- Total Receptionist Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                        <a href = "login.php" class = "text-decoration-none">
                            <div class="card border-left-success shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                                Manager</div>
                                            <div class="h5 text-xs mb-0 font-weight-bold text-gray-800">
                                            Click Here !  Login
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Total Department Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                        <a href = "login.php" class = "text-decoration-none">
                            <div class="card border-left-info shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                                                Receptionist
                                            </div>
                                            <div class="h5 text-xs mb-0 font-weight-bold text-gray-800">
                                            Click Here !  Login
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                       

                    <!-- Content Row -->
       
                </div>
<!-- Second Contaoner-Fluid Start -->
    

         

    



    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    
    ?>
   

  
