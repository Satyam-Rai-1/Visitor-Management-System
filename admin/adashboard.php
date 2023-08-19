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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard <?php $a=$_SESSION['username'];?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Managers Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Managers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                
                                                    $sql = "SELECT * FROM admin_tb  WHERE a_usertype='M' order by a_id";
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
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Receptionist</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                
                                                $sql = "SELECT * FROM admin_tb  WHERE a_usertype='R' order by a_id";
                                                $result=mysqli_query($con,$sql);
                                                $row=mysqli_num_rows($result);
                                                echo '<h2>'.$row.'</h2>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                                                Total Department
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                
                                                $sql = "SELECT * FROM depart_tb ";
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

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">                 <?php
                                                //  $sql = "SELECT * FROM  admin_tb a JOIN visitor_tb v ON a.a_username = v.v_host WHERE a_email = '$a' And ( dt LIKE '%$date%' and  v_status LIKE '%$wating%'  ORDER BY v_id DESC ) ";
                                               

                                                    $d = date("d");
                                                    $m = date("m");
                                                    $Y = date("Y");
                                                    $date = $Y."-".$m."-".$d;
                                                    $wating = "Wating";
                                                    $sql = "SELECT * FROM  visitor_tb WHERE dt LIKE '%$date%' and  v_status LIKE '%$wating%' ";
                                                    $result=mysqli_query($con,$sql);
                                                        $row=mysqli_num_rows($result);
                                                        echo '<h2>'.$row.'</h2>';
                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
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

<!-- col Start -->
    <div class="col-lg">
           <!--Basic Card -->
           <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Table</h6>
                     <!-- For Date   -->
                     <form action="" method="POST" name="f1">
                        <div class="form-group">
                            <lable for = "date" class="label">Date :</lable>
                            <input type="date" id="date" name="date" value = "<?php if(isset($_REQUEST['date'])){echo $_REQUEST['date'];} ?>">
           
                            <input type = "submit" class = "btn btn-danger" id = "sub" name = "sub" value = "Filter"> 
                        </div>
                    </form>
                    <!-- For Date End  -->

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                    <?php
                    $d = date("d");
                    $m = date("m");
                    $Y = date("Y");
                    $date = $Y."-".$m."-".$d;
                        
                    $status ="Wating";
                    $accept ="Accept";
                    $reject = "Reject";
                    $new = "New Request";

                    if(isset($_REQUEST['sub']))
                    {
                        $date = $_REQUEST['date'];
                        $sql= "SELECT * FROM visitor_tb v Join admin_tb a ON v.v_h_id = a.a_id JOIN depart_tb ON v.v_d_id = d_id   WHERE a.a_d_id = v.v_d_id And dt LIKE '%$date%' AND (v_status LIKE '%$status%' OR v_status LIKE '%$accept%' OR v_status LIKE '%$reject%' OR v_status LIKE '%$new%')   ORDER BY v_id desc" ;    //Fetch data from table
                        $result = mysqli_query($con,$sql);
                    ?>
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class = "bg-secondary text-light">
                        <tr>
                            <th> ID </th>
                            <th> Visitor Name </th>
                            <th> Visitor Email </th>
                            <th>Department Name</th>
                            <th>Host Name</th>
                            <th>Reson</th>
                            <th>Status</th>
                            <th>View</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(mysqli_num_rows($result)>0)    //if result var is grater than 0 = true
                        {
                        while ($row = mysqli_fetch_assoc($result))  //fetch all data present in table
                        {
                            ?>

                        
                        <tr>
                            <td><?php  echo $row['v_id']; ?></td>
                            <td><?php  echo $row['v_name']; ?></td>
                            <td><?php  echo $row['v_email']; ?></td>
                            <td><?php  echo $row['d_name']; ?></td>
                            <td><?php  echo $row['a_username']; ?></td>
                            <td><?php  echo $row['v_reson']; ?></td>
                            <td><?php  echo $row['v_status']; ?></td>

                            <td>
                            <form action="detail_view.php" method="post">
                            <!-- choosing perticular id when edit or delete button is click  -->
                                    <input type="hidden" name="edit_id" value="<?php  echo $row['v_id']; ?>">   
                                    <button  type="submit" name="edit_btn" class="btn bg-gradient-success text-gray-100"> View</button>
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#visitorprofile">View</button> -->
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                        }
                        }

                        else if ($sql= "SELECT * FROM visitor_tb v Join admin_tb a ON v.v_h_id = a.a_id JOIN depart_tb ON v.v_d_id = d_id   WHERE a.a_d_id = v.v_d_id And dt LIKE '%$date%' AND (v_status LIKE '%$status%' OR v_status LIKE '%$accept%' OR v_status LIKE '%$reject%' OR v_status LIKE '%$new%')   ORDER BY v_id desc" )
                        {
                            $result = mysqli_query($con,$sql);
                            ?>
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class = "bg-secondary text-light">
                        <tr>
                            <th> ID </th>
                            <th> Visitor Name </th>
                            <th> Visitor Email </th>
                            <th>Reson</th>
                            <th>Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(mysqli_num_rows($result)>0)    //if result var is grater than 0 = true
                            {
                                while ($row = mysqli_fetch_assoc($result))  //fetch all data present in table
                                {
                                    ?>
                        <tr>
                            <td><?php  echo $row['v_id']; ?></td>
                            <td><?php  echo $row['v_name']; ?></td>
                            <!-- <td><?php  echo $row['v_email']; ?></td> -->
                            <td><?php  echo $row['v_reson']; ?></td>
                            <td><?php  echo $row['v_status']; ?></td>
                            <td>
                            <form action="detail_view.php" method="post">
                            <!-- choosing perticular id when edit or delete button is click  -->
                                    <input type="hidden" name="edit_id" value="<?php  echo $row['v_id']; ?>">   
                                    <button  type="submit" name="edit_btn" class="btn bg-gradient-success text-gray-100"> View</button>
                                   
                                </form>
                            </td>
                        </tr>
                            
                        <?php
                                }}
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                        ?>
                            
                        
                        </tbody>
                    </table>

                    </div>
                </div>

            </div>

    </div>
<!-- col End -->
</div>

<!-- Second Container-fluid End -->

    



    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    
    ?>
   

  
