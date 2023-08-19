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
    $adepart = $_POST['a_d_id'];
    
    if($password === $cpassword)
    {
        $query = "INSERT INTO admin_tb(a_username,a_email,a_password,a_usertype,a_d_id) VALUES('$username','$email','$password','$usertype','$adepart')";
        $result = mysqli_query($con,$query);
        if($result==True)
        {
            $_SESSION['status'] ="Admin Profile Added";
            $_SESSION['status_code'] = "success";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] ="Admin Profile Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] ="Password  doesn't match";
        $_SESSION['status_code'] = "warning";
        header('Location: register.php');
    }


    
}


//update button click

if(isset($_POST['updatebtn']))
{
    $id =$_POST['edit_id'];
    $username =$_POST['edit_username'];
    $email =$_POST['edit_email'];
    $password =$_POST['edit_password'];
    $usertype =$_POST['update_usertype'];
    $sql = "UPDATE admin_tb SET a_username = '$username', a_email='$email', a_password='$password',a_usertype='$usertype' WHERE a_id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}

// delete button

if(isset($_POST['delete_id']))
{
    $id =$_POST['delete_id'];
    $sql = "DELETE FROM admin_tb WHERE a_id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Deleted";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}




// //For login page

// if(isset($_POST['loginbtn']))
// {
//     $email_login=$_POST['email'];
//     $password_login=$_POST['password'];

//     $sql="SELECT * FROM admin_tb WHERE a_email = '$email_login' AND a_password = '$password_login'";
//     $result = mysqli_query($con,$sql);
//     $usertype=mysqli_fetch_array($result);
//     if($usertype['a_usertype'] == "Admin")
//     {
//         $_SESSION['username'] = $email_login;
//         header('Location: admin/index.php');
//     }
//     else if($usertype['a_usertype'] == "M")
//     {
//         $_SESSION['username'] = $email_login;
//         header('Location: manager/index.php');
//     }
//     else if($usertype['a_usertype'] == "R")
//     {
//         $_SESSION['username'] = $email_login;
//         header('Location: receptionist/index.php');
//     }
   
    
//     else 
//     {
//         $_SESSION['status'] = 'Email id or Password is Invalid ';
//         header('Location: login.php');
//     }
// }







?>


