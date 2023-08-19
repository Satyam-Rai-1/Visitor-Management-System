<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php')
?>

<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-lg">Edit Admin Profile 
    </h6>
  </div>

    <div class="card-body">
        <?php
                    // For edit and delete 

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                //echo $id;

                $sql = "SELECT * FROM admin_tb WHERE a_id='$id' ";
                $result=mysqli_query($con,$sql);

                foreach($result as $row)
                {
                    ?>
            <form action="code.php" method="post">
            <input type="hidden" name="edit_id" class="form-control" value="<?php  echo $row['a_id']; ?>">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" class="form-control" value="<?php  echo $row['a_username']; ?>" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" class="form-control"value="<?php  echo $row['a_email']; ?>" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" class="form-control" value="<?php  echo $row['a_password']; ?>"placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>UserType</label>
                <select name="update_usertype"class="form-control" >
                    <!-- <option value="Admin">Admin</option> -->
                    <option value="M">Manager</option>
                    <option value="R">Receptionist</option>
                </select>
            </div>
            <a href="register.php" class="btn bg-gradient-danger text-gray-100">Cancel</a>
            <button type="submit" name="updatebtn" class="btn bg-gradient-primary text-gray-100">Update</button>
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