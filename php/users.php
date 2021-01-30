<?php

include "./functions.php";

if(isset($_POST['btnSubmit']))
{
    $name=$_POST['name'];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $enc_password=md5($password);
    $q="INSERT INTO users SET 
    name='$name',
    email='$email',
    password='$enc_password'
    ";
    $result=Query($q);
    if($result['status'])
    {
        flash("User has been created successfully");
    }
    else
    {
        flash($result['message'],"error");
    }

    header('location:../index.php');
}


if(isset($_GET['delete_id']))
{
    $id=$_GET['delete_id'];
    $q="DELETE FROM users WHERE id='$id'";
    $res=Query($q);
    if($res['status'])
    {
        flash("Record has been removed successfully","success");
    }
    else
    {
        flash($res['message'],'error');
    }
    header('location:../deleted.php');
}





if(isset($_POST['btnUpdate']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $enc_password=md5($password);
    $q="Update users SET 
    name='$name',
    email='$email',
    password='$enc_password'
    WHERE id='$id'
    ";
    $result=Query($q);
    if($result['status'])
    {
        flash("User has been updated successfully");
    }
    else
    {
        flash($result['message'],"error");
    }

    header('location:../index.php');
}


?>