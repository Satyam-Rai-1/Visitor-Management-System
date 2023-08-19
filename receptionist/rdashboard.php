<?php
include('security.php');
//include('connectiondb.php');
include('includes/header.php');
include('includes/navbar.php')
?>

       


                <!-- Begin Page Content -->

                <!-- First Container-fluid Start -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="visitor.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate New Request</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $d = date("d");
                                                    $m = date("m");
                                                    $Y = date("Y");
                                                    $date = $Y."-".$m."-".$d;
                                                    $new = "New Request";
                                                    $sql = "SELECT * FROM  visitor_tb WHERE dt LIKE '%$date%' and  v_status LIKE '%$new%'  ORDER BY v_id DESC ";
                                                    $result=mysqli_query($con,$sql);
                                                        $row=mysqli_num_rows($result);
                                                        echo '<h2>'.$row.'</h2>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Managers Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Requestes  (<?php echo $date;?>) </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                
                                                $d = date("d");
                                                $m = date("m");
                                                $Y = date("Y");
                                                $date = $Y."-".$m."-".$d;
                                                $new = "New Request";
                                                $accept= "Accept";
                                                $reject = "Reject";
                                                $wating = "Wating";
                                                $sql = "SELECT * FROM  visitor_tb WHERE dt LIKE '%$date%' and  (v_status LIKE '%$new%' or v_status LIKE '%$wating%' OR v_status LIKE '%$accept%' OR v_status LIKE '%$reject%')  ORDER BY v_id DESC ";
                                                $result=mysqli_query($con,$sql);
                                                    $row=mysqli_num_rows($result);
                                                    echo '<h2>'.$row.'</h2>';
                                                ?>

                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Receptionist Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Rejected Request</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                
                                                $d = date("d");
                                                $m = date("m");
                                                $Y = date("Y");
                                                $date = $Y."-".$m."-".$d;
                                                $reject = "Reject";
                                                $sql = "SELECT * FROM  visitor_tb WHERE dt LIKE '%$date%' and  (v_status LIKE '%$reject%')  ORDER BY v_id DESC ";
                                                $result=mysqli_query($con,$sql);
                                                $row=mysqli_num_rows($result);
                                                echo '<h2>'.$row.'</h2>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Department Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Visitors
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                
                                                $sql = "SELECT * FROM visitor_tb  order by v_id";
                                                $result=mysqli_query($con,$sql);
                                                $row=mysqli_num_rows($result);
                                                echo '<h2>'.$row.'</h2>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- Content Row -->
                
                </div>
                <!-- /First container-fluid End -->

<!-- Second Container-fluid Start -->
<div class="container-fluid">

    <div class="row">
<!-- 1st col -->
        <div class="col-lg-6">
            <!--Basic Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 ">
                    <div class ="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">New Requestes</h6>

                    <!-- For Date   -->
                    <form action="" method="POST" name="f1">
                        <div class="form-group">
                            <lable for = "date" class="label">Date :</lable>
                            <input type="date" id="date" name="date" value = "<?php if(isset($_REQUEST['date'])){echo $_REQUEST['date'];} ?>">
           
                            <input type = "submit" class = "btn btn-danger" id = "sub" name = "sub" value = "Filter"> 
                        </div>
                </div>
                    
                    <!-- For Date End  -->

                </div>
                <?php
                   $d = date("d");
                   $m = date("m");
                   $Y = date("Y");
                   $date = $Y."-".$m."-".$d;
                   //echo $date;
                   if(isset($_REQUEST['sub']))
                    {
                        $date = $_REQUEST['date'];
                        $new = "New Request";
                        $sql = "SELECT * FROM  visitor_tb WHERE dt LIKE '%$date%' and  v_status LIKE '%$new%'  ORDER BY v_id DESC ";
                //$sql = "SELECT * FROM visitor_tb ORDER BY v_id DESC";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)    //if result var is grater than 0 = true
                {
                    while ($row = mysqli_fetch_assoc($result))  //fetch all data present in table
                    {
                ?>
                
                <div class="card-body bg-info">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4 ">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <div class= "d-flex justify-content-between">
                                        
                                    <h6 class="m-0 font-weight-bold text-dark">Visitor ID : <?php  echo $row['v_id']; ?></h6>
                                    Date : <?php  echo $row['dt']; ?>
                                    <h6 class="m-0 font-weight-bold text-dark">Request ID : <?php  echo $row['v_id']; ?></h6>
                                    </div>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <p class = "text-dark">Visitor Name : <?php  echo $row['v_name']; ?></p>
                                        <p class = "">Visitor Host : <?php  echo $row['v_h_id']; ?></p>
                                        <p class = "">Visitor Reson : <?php  echo $row['v_reson']; ?></p>
                                        <!-- <p class = "">Visitor Depart :<?php  echo $row['v_depart']; ?></p> -->
                                        <p class = "">Request Status :<?php  echo $row['v_status']; ?> <p>
                                        <p class = "">DateTime :<?php  echo $row['dt']; ?></p>
                                    </div>
                                    
                                    <div class="card-footer">
                                    <a href = request.php><button type="submit"  name="view"  class="btn btn-info ">View</button></a>
                                    </div>
                                </div>
                            </div>
                </div>
                <?php
                        }
                    }
                }

                // For Current Date
                else if($sql = "SELECT * FROM  visitor_tb WHERE dt LIKE '%$date%' and  v_status LIKE '%$new%'  ORDER BY v_id DESC ")
                $result = $con->query($sql);
                if($result->num_rows > 0 )     
                {
                    while($row = $result->fetch_assoc()  )  //Fetch Data from DB
                    {
                ?>
                <div class="card-body ">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4 ">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <div class= "d-flex justify-content-between">
                                        
                                    <h6 class="m-0 font-weight-bold text-dark">Visitor ID : <?php  echo $row['v_id']; ?></h6>
                                    Date : <?php  echo $row['dt']; ?>
                                    <h6 class="m-0 font-weight-bold text-dark">Request ID : <?php  echo $row['v_id']; ?></h6>
                                    </div>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <p class = "text-dark">Visitor Name : <?php  echo $row['v_name']; ?></p>
                                        <p class = "">Visitor Host : <?php  echo $row['v_h_id']; ?></p>
                                        <p class = "">Visitor Reson : <?php  echo $row['v_reson']; ?></p>
                                        <!-- <p class = "">Visitor Depart :<?php  echo $row['v_depart']; ?></p> -->
                                        <p class = "">Request Status :<?php  echo $row['v_status']; ?> <p>
                                        <p class = "">DateTime :<?php  echo $row['dt']; ?></p>
                                    </div>
                                    
                                    <div class="card-footer">
                                    <a href = request.php><button type="submit"  name="view"  class="btn btn-info ">View</button></a>
                                    </div>
                                </div>
                    </div>
                </div>
                

                <?php
                    }
                }
                else
                {
                    echo "No record found";
                }
                ?>
                
            </div>

        </div>

<!-- 2nd col -->
        <div class="col-lg-6">
               <!--Basic Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Action</h6>
                        
                        <form action="" method="POST">
                        <input type="search" id="search"    name="vid" placeholder = "Request ID"  value = >
                        <input type = "submit" class = "  btn btn-primary" name = "submit" value = "Search">
                        <input type = "reset" class = "btn btn-secondary " name = "reset" >
                        </form>  
                    </div>

                    <div class="card-body bg-info">
                        <?php
                        $d = date("d");
                        $m = date("m");
                        $Y = date("Y");
                        $date = $Y."-".$m."-".$d;
                         $accept ="Accept";
                         $reject = "Reject";
                         if(isset($_REQUEST['submit']))
                         {
                           $sql = "SELECT * FROM  visitor_tb WHERE  v_id = {$_REQUEST['vid']} AND  (v_status LIKE '%$accept%' OR v_status LIKE '%$reject%' ) ";
                           $result = mysqli_query($con,$sql);
                           if(mysqli_num_rows($result)>0)    //if result var is grater than 0 = true
                           {
                               while ($row = mysqli_fetch_assoc($result))  //fetch all data present in table
                               {
                           
                        ?>
                        <!-- Collapsable Card Example -->
                        <div class="card shadow mb-4 ">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <div class= "d-flex justify-content-between">
                                        
                                    <h6 class="m-0 font-weight-bold text-dark">Visitor ID : <?php  echo $row['v_id']; ?></h6>
                                    Date : <?php  echo $row['dt']; ?>
                                    <h6 class="m-0 font-weight-bold text-dark">Status : <?php  echo $row['v_status']; ?></h6>
                                    </div>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body ">
                                        <p class = "text-dark">Visitor Name : <?php  echo $row['v_name']; ?></p>
                                        <p class = "">Visitor Host : <?php  echo $row['v_h_id']; ?></p>
                                        <p class = "">Visitor Reson : <?php  echo $row['v_reson']; ?></p>
                                        <!-- <p class = "">Visitor Depart :<?php  echo $row['v_depart']; ?></p> -->
                                        <p class = "">Request Status :<?php  echo $row['v_status']; ?> <p>
                                        <p class = "">DateTime :<?php  echo $row['dt']; ?></p>
                                    </div>
                                    
                                    <div class="card-footer">
                                    <a href = request.php><button type="submit"  name="view"  class=" btn btn-danger  ">Generat Pass</button></a>
                                    </div>
                                </div>
                        </div>

                        <?php
                               }
                            }
                        }

                        else if( $sql = "SELECT * FROM  visitor_tb WHERE  dt LIKE '%$date%' AND  (v_status LIKE '%$accept%' OR v_status LIKE '%$reject%' ) ORDER BY v_id DESC ")
                        
                       
                           $result = mysqli_query($con,$sql);
                           if(mysqli_num_rows($result)>0)    //if result var is grater than 0 = true
                           {
                               while ($row = mysqli_fetch_assoc($result))  //fetch all data present in table
                               {
                           
                        ?>
                        <!-- Collapsable Card Example -->
                        <div class="card shadow mb-4 ">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <div class= "d-flex justify-content-between">
                                        
                                    <h6 class="m-0 font-weight-bold text-dark">Visitor ID : <?php  echo $row['v_id']; ?></h6>
                                    Date : <?php  echo $row['dt']; ?>
                                    <h6 class="m-0 font-weight-bold text-dark">Status : <?php  echo $row['v_status']; ?></h6>
                                    </div>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body ">
                                        <p class = "text-dark">Visitor Name : <?php  echo $row['v_name']; ?></p>
                                        <p class = "">Visitor Host : <?php  echo $row['v_h_id']; ?></p>
                                        <p class = "">Visitor Reson : <?php  echo $row['v_reson']; ?></p>
                                        <!-- <p class = "">Visitor Depart :<?php  echo $row['v_depart']; ?></p> -->
                                        <p class = "">Request Status :<?php  echo $row['v_status']; ?> <p>
                                        <p class = "">DateTime :<?php  echo $row['dt']; ?></p>
                                    </div>
                                    
                                    <div class="card-footer">
                                    <a href = pass.php><button type="submit"  name="pass"  class=" btn btn-danger  ">Generat Pass</button></a>
                                    </div>
                                </div>
                        </div>

                        <?php
                             }
                            }

                            else
                            {
                                echo "No Record Found";
                            }
                        ?>
                        
                    

                    
                    </div>
                </div>

        </div>

    </div>

</div>



<!-- Second Container-fluid Start -->

         

    



    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    
    ?>
   

  
    