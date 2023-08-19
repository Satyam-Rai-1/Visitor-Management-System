<?php
include('security.php');
//include('connectiondb.php');
 

//when registerbtn click
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
    
    if($password === $cpassword)
    {
        $query = "INSERT INTO admin_tb(a_username,a_email,a_password,a_usertype) VALUES('$username','$email','$password','$usertype')";
        $result = mysqli_query($con,$query);
        if($result==True)
        {
            $_SESSION['success'] ="Admin Profile Added";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] ="Admin Profile Not Added";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] ="Password And Cpassword doesn't match";
        header('Location: register.php');
    }


    
}


//update button click

if(isset($_POST['updatebtn']))
{
    $id =$_POST['edit_id'];
    $remark =$_POST['edit_v_remark'];
    $status =$_POST['update_status'];
    $sql = "UPDATE visitor_tb SET v_remark = '$remark',v_status='$status' WHERE v_id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: request.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('Location: request.php');
    }
}

// delete button

if(isset($_POST['delete_id']))
{
    $id =$_POST['delete_id'];
    $sql = "DELETE FROM visitor_tb WHERE v_id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: request.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Deleted";
        header('Location: request.php');
    }
}











?>


