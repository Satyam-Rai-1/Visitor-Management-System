<?php
session_start();
include('connectiondb.php');
include('includes/header.php');
include('includes/navbar.php')
?>

<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-lg"> New Request 
    </h6>
  </div>

  <?php
   
    
    
    ?>
    <div class="card-body">
            <form action="code.php" method="post" class="row g-3">
            
            <div class="form-group col-md-6">
                <label>Visitor Name </label>
                <input type="text" name="v_name" class="form-control" placeholder="Enter Visitorname">
            </div>
            <div class="form-group col-md-6">
                <label> Visitor Email</label>
                <input type="email" name="v_email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group col-md-6">
                <label>Visitor Mobile Number</label>
                <input type="text" name="v_phone" class="form-control"placeholder="Enter Phone Number">
            </div>
            <div class="form-group col-md-6">
                <label>Visitor Address</label>
                <input type="text" name="v_address" class="form-control"placeholder="Enter Address">
            </div>
            <div class="form-group col-md-6">
                <label>Department Name</label>
                <select name="v_depart"class="form-control" >
                <?php
                    $sql = "SELECT * FROM depart_tb  " ;
                    $result = $con->query($sql);
                    if($result->num_rows > 0)     
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                            echo ' <option value = "'.$row['d_id'];
                            echo'"> '.$row['d_name'] ;
                            echo ' </option>';          
                            
                        
                        }
                    }        
                    ?>       
                    <!-- <option value="Admin">Admin</option> -->
                    <!-- <option value=""></option>
                    <option value="5">It</option>
                    <option value="2">Management</option>
                    <option value="4">Business</option> -->
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Host Name </label>
                <select name="v_host"class="form-control" >

                <?php
                    $sql = "SELECT * FROM admin_tb WHERE a_usertype LIKE 'M'  " ;
                    $result = $con->query($sql);
                    if($result->num_rows > 0)     
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                            echo ' <option value = "'.$row['a_id'];
                            echo'"> '.$row['a_username'];
                            echo ' </option>';          
                        }
                    }        
                    ?>                     
                    <!-- <option value="Admin">Admin</option> -->
                    <!-- <option value=""></option>
                    <option value="2">demo1</option>
                    <option value="9">demo4</option> -->
                    
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Reson </label>
                <input type="text" name="v_reson" class="form-control" placeholder="Enter Reson For Meeting">
            </div>
            <div class="form-group col-md-6">
                
                <input type="hidden" name="v_r_id" class="form-control " value = "">
            </div>
            
            
            <div class="form-group col-md-6">
            <input type="hidden" name="v_status" class="form-control " value = "New Request">
            <input type="hidden" name="v_remark" class="form-control " value = "">
           
            </div>
           
            <div class="form-group col-md-6 my-4">
             <a href="index.php" class="btn bg-gradient-danger text-gray-100">Cancel</a>
            <button type="submit" name="submitbtn" class="btn bg-gradient-primary text-gray-100 mx-2">Submit</button> 
            </div>
            </form>
       
    </div>
</div>

</div>
  <!-- DataTables End -->
<div>
<?php
    include('includes/scripts.php');
    include('includes/footer.php');
    
?>