<?php
include('security.php');
//include('connectiondb.php');
 

//when save[registerbtn] click
if(isset($_POST['registerbtn']))
{
    $dname = $_POST['d_name'];
    
   
        $query = "INSERT INTO depart_tb(d_name) VALUES('$dname')";
        $result = mysqli_query($con,$query);
        if($result==True)
        {
            $_SESSION['status'] ="Department Added";
            $_SESSION['status_code'] = "success";
            header('Location: depart.php');
        }
        else
        {
            $_SESSION['status'] ="Department Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: depart.php');
        }
    }


    
//update button click in depar_edit.php

if(isset($_POST['updatebtn']))
{
    $id =$_POST['edit_id'];
    $dname =$_POST['edit_departname'];
    $sql = "UPDATE depart_tb SET d_name = '$dname' WHERE d_id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: depart.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: depart.php');
    }
}

// delete button

if(isset($_POST['delete_id']))
{
    $id =$_POST['delete_id'];
    $sql = "DELETE FROM depart_tb WHERE d_id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: depart.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Deleted";
        $_SESSION['status_code'] = "error";
        header('Location: depart.php');
    }
}

