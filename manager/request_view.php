<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php')
?>

<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-lg">Visitor Detail
    </h6>
  </div>

    <div class="card-body">
        <?php
                    // For edit and delete 

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                //echo $id;
                $sql = "SELECT * FROM  visitor_tb v Join admin_tb a ON v.v_h_id = a.a_id JOIN depart_tb ON v.v_d_id = d_id   WHERE v_id='$id'";
                // $sql = "SELECT * FROM visitor_tb WHERE v_id='$id' ";
                $result=mysqli_query($con,$sql);

                foreach($result as $row)
                {
                    ?>
            <form action="code.php" method="post" class="row g-3">
            <input type="hidden" name="edit_id" class="form-control" value="<?php  echo $row['v_id']; ?>">
            <div class="form-group col-md-6">
                <label>Visitor Name </label>
                <input type="text" name="edit_v_name" class="form-control" value="<?php  echo $row['v_name']; ?>" placeholder="Enter Username">
            </div>
            <div class="form-group col-md-6">
                <label> Visitor Email</label>
                <input type="email" name="edit_v_email" class="form-control"value="<?php  echo $row['v_email']; ?>" placeholder="Enter Email">
            </div>
            <div class="form-group col-md-6">
                <label>Visitor Mobile Number</label>
                <input type="text" name="edit_v_phone" class="form-control" value="<?php  echo $row['v_phone']; ?>"placeholder="Enter Password">
            </div>
            <div class="form-group col-md-6">
                <label>Visitor Address</label>
                <input type="text" name="edit_v_address" class="form-control" value="<?php  echo $row['v_address']; ?>"placeholder="Enter Password">
            </div>
            <div class="form-group col-md-6">
                <label>Host Name</label>
                <input type="text" name="edit_v_host" class="form-control" value="<?php  echo $row['a_username']; ?>"placeholder="Enter Password">
            </div>
            <div class="form-group col-md-6">
                <label>Status</label>
                <select name="update_status"class="form-control" >
                    <!-- <option value="Admin">Admin</option> -->
                    <option value=""><?php  echo $row['v_status']; ?></option>
                    <option value="Accept">Accept</option>
                    <option value="Reject">Reject</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Remark</label>
                <input type="text" name="edit_v_remark" class="form-control" placeholder="Enter Remark">
            </div>
            <div class="form-group col-md-6">
                <label>Remark</label>
                <input type="text" name="edit" class="form-control" placeholder="Enter Password">
            </div>
            <a href="request.php" class="btn bg-gradient-danger text-gray-100">Cancel</a>
            <button type="submit" name="updatebtn" class="btn bg-gradient-primary text-gray-100 mx-2">Update</button>
            </form>
            <?php
                }
            }



        ?>
    </div>
</div>

</div>
  <!-- DataTables End -->
<div>
<?php
    include('includes/scripts.php');
    include('includes/footer.php');
    
?>