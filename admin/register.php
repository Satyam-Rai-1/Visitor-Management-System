<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php')
?>
<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="hidden" name="usertype" class="form-control" value="Admin">
            </div>
            <div class="form-group">
            <label>Department Name</label>
            <select name="a_d_id"class="form-control" >
            <option>Choose From List </option>
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
                    </select> 
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php
      $sql= "SELECT * FROM admin_tb a JOIN depart_tb d ON a.a_d_id = d.d_id ORDER BY a_id" ;    //Fetch data from table
      $result = mysqli_query($con,$sql);
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>UserType</th>
            <th>Department Name</th>
            <th>EDIT </th>
            <th>DELETE </th>
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
            <td><?php  echo $row['a_id']; ?></td>
            <td><?php  echo $row['a_username']; ?></td>
            <td><?php  echo $row['a_email']; ?></td>
            <td><?php  echo $row['a_password']; ?></td>
            <td><?php  echo $row['a_usertype']; ?></td>
            <td><?php  echo $row['d_name']; ?></td>
            <td>
            <form action="register_edit.php" method="post">
              <!-- choosing perticular id when edit or delete button is click  -->
                    <input type="hidden" name="edit_id" value="<?php  echo $row['a_id']; ?>">   
                    <button  type="submit" name="edit_btn" class="btn bg-gradient-success text-gray-100"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php  echo $row['a_id']; ?>">
                  <button type="submit" name="delete_btn" class="btn bg-gradient-danger text-gray-100 "> DELETE</button>
                </form>    
            </td>
           
          </tr>
        <?php
          }
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
  <!-- DataTables End -->


</div>
<!-- Second Container-fluid End -->



<?php
    include('includes/scripts.php');
    include('includes/footer.php');
    
?>
   