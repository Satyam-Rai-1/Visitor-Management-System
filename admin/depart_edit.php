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

                $sql = "SELECT * FROM depart_tb WHERE d_id='$id' ";
                $result=mysqli_query($con,$sql);

                foreach($result as $row)
                {
                    ?>
            <form action="departcode.php" method="post">
            <input type="hidden" name="edit_id" class="form-control" value="<?php  echo $row['d_id']; ?>">
            <div class="form-group">
                <label> Department Name </label>
                <input type="text" name="edit_departname" class="form-control" value="<?php  echo $row['d_name']; ?>" placeholder="Enter Depart Name">
            </div>
          
            <a href="departcode.php" class="btn bg-gradient-danger text-gray-100">Cancel</a>
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