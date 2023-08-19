<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php')
?>
<!-- Modal -->
<div class="modal fade" id="visitorprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visitor Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" class  ="">

        <div class="modal-body row g-3">
          
        
            <div class="col-md-6">
                <label for="n_id"class="form-label">Visitor ID </label>
                <input type="text" name="v_id" class="form-control" placeholder="Visitor ID">
            </div>
            <!-- <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail4">
            </div> -->
            <div class="col-md-6">
                <label class="form-label">Visitor Name </label>
                <input type="text" name="v_name" class="form-control" placeholder="Visitor Name">
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Visitor Email">
            </div>
            <div class="col-md-6">
                <label class="form-label">Visitor Address</label>
                <input type="text" name="v_address" class="form-control" placeholder="Visitor Address">
            </div>
            <div class="col-md-6">
                <label class="form-label">Host Name</label>
                <input type="text" name="v_host" class="form-control" placeholder="Host Name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Reson</label>
                <input type="text" name="v_reson" class="form-control" placeholder="Reson">
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <input type="text" name="v_status" class="form-control" placeholder="Status">
            </div>
            <!-- <div class="form-group">
                <input type="hidden" name="usertype" class="form-control" value="Admin">
            </div> -->
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">New Requests</h6>
      <!-- For Date   -->
      <!-- <form action="" method="POST" name="f1">
        <div class="form-group">
          <lable for = "date" class="label">Date :</lable>
          <input type="date" id="date" name="date" value = "<?php if(isset($_REQUEST['date'])){echo $_REQUEST['date'];} ?>">
          <input type = "submit" class = "btn btn-danger" id = "sub" name = "sub" value = "Filter"> 
        </div>
      </form>
                 -->
                    
      <!-- For Date End  -->
    

  </div>

  <div class="card-body">
    <?php
    if(isset($_SESSION['success']) && $_SESSION['success']!='')
    {
      echo'<h2  class = "bg-primary text-white p-1">'.$_SESSION['success'].'</h2>';
      unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
      echo'<h2 class = "bg-danger text-white p-1">'.$_SESSION['status'].'</h2>';
      unset($_SESSION['status']);
    }
    
    ?>

    <div class="table-responsive">

    <?php
     $d = date("d");
     $m = date("m");
     $Y = date("Y");
     $date = $Y."-".$m."-".$d;
     $a=$_SESSION['username'];
          
      $status ="Wating";
      $accept ="Accept";
      $reject = "Reject";
      $sql= "SELECT * FROM visitor_tb v Join admin_tb a ON v.v_h_id = a.a_id JOIN depart_tb ON v.v_d_id = d_id   WHERE a_email = '$a' AND a.a_d_id = v.v_d_id And dt LIKE '%$date%' AND (v_status LIKE '%$status%' OR v_status LIKE '%$accept%' OR v_status LIKE '%$reject%')   ORDER BY v_id desc" ;    //Fetch data from table
      $result = mysqli_query($con,$sql);
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Visitor Name </th>
            <!-- <th> Visitor Email </th> -->
            <th>Host Name</th>
             <th>Reson</th>
            <th>Status</th>
            
            <th>View</th>
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
            <td><?php  echo $row['v_id']; ?></td>
            <td><?php  echo $row['v_name']; ?></td>
            <!-- <td><?php  echo $row['v_email']; ?></td> -->
            <td><?php  echo $row['a_username']; ?></td>
            <td><?php  echo $row['v_reson']; ?></td>
            <td><?php  echo $row['v_status']; ?></td>

            <td>
            <form action="request_view.php" method="post">
              <!-- choosing perticular id when edit or delete button is click  -->
                    <input type="hidden" name="edit_id" value="<?php  echo $row['v_id']; ?>">   
                    <button  type="submit" name="edit_btn" class="btn bg-gradient-success text-gray-100"> View</button>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#visitorprofile">View</button> -->
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php  echo $row['v_id']; ?>">
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
   