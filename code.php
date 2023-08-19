<?php
include('security.php');
//include('connectiondb.php');
 

// //when registerbtn click
// if(isset($_POST['registerbtn']))
// {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $cpassword = $_POST['confirmpassword'];
//     $usertype = $_POST['usertype'];
    
//     if($password === $cpassword)
//     {
//         $query = "INSERT INTO admin_tb(a_username,a_email,a_password,a_usertype) VALUES('$username','$email','$password','$usertype')";
//         $result = mysqli_query($con,$query);
//         if($result==True)
//         {
//             $_SESSION['success'] ="Admin Profile Added";
//             header('Location: register.php');
//         }
//         else
//         {
//             $_SESSION['status'] ="Admin Profile Not Added";
//             header('Location: register.php');
//         }
//     }
//     else
//     {
//         $_SESSION['status'] ="Password And Cpassword doesn't match";
//         header('Location: register.php');
//     }


    
// }


//update button click

if(isset($_POST['submitbtn']))
{
    $vname =$_POST['v_name'];
    $vemail =$_POST['v_email'];
    $vphone =$_POST['v_phone'];
    $vaddress =$_POST['v_address'];
    $vdepart =$_POST['v_depart'];
    $vhost =$_POST['v_host'];
    $vreson =$_POST['v_reson'];
    $vr =$_POST['v_r_id'];
    $vstatus =$_POST['v_status'];
    $vremark =$_POST['v_remark'];
    $sql = "INSERT INTO visitor_tb(v_name,v_email,v_phone,v_address,v_d_id,v_h_id ,v_reson,v_status,v_r_id,v_remark) VALUES('$vname','$vemail','$vphone','$vaddress','$vdepart','$vhost','$vreson','$vstatus','$vr','$remark')";
    $result = mysqli_query($con,$sql);
    if($result==True)
    {
        $_SESSION['status'] = "Your Request is Successfully Send";
        $_SESSION['status_code'] = "success";
        header('Location: visitor.php');
    }
    else
    {
        $_SESSION['status'] = "Your Request is Not Send";
        $_SESSION['status_code'] = "error";
        header('Location: visitor.php');
    }
}

// // delete button

// if(isset($_POST['delete_id']))
// {
//     $id =$_POST['delete_id'];
//     $sql = "DELETE FROM admin_tb WHERE a_id='$id'";
//     $result=mysqli_query($con,$sql);
//     if($result)
//     {
//         $_SESSION['success'] = "Your Data is Deleted";
//         header('Location: register.php');
//     }
//     else
//     {
//         $_SESSION['status'] = "Your Data is Not Deleted";
//         header('Location: register.php');
//     }
// }




//For login page

if(isset($_POST['loginbtn']))
{
    $email_login=$_POST['email'];
    $password_login=$_POST['password'];

    $sql="SELECT * FROM admin_tb WHERE a_email = '$email_login' AND a_password = '$password_login'";
    $result = mysqli_query($con,$sql);
    $usertype=mysqli_fetch_array($result);
    // $useremail=mysqli_fetch_array($result);
    if($usertype['a_usertype'] == "Admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location: admin/adashboard.php');
    }
    else if($usertype['a_usertype'] == "M")
    {
        $_SESSION['username'] = $email_login;
        header('Location: manager/mdashboard.php');
    }
    else if($usertype['a_usertype'] == "R")
    {
        $_SESSION['username'] = $email_login;
        header('Location: receptionist/rdashboard.php');
    }
   
    
    else 
    {
        $_SESSION['status'] = 'Email id or Password is Invalid ';
        header('Location: login.php');
    }
}

?>


