<?php
include_once __DIR__.'/php/functions.php';
$id=$_GET['id'];
$data=[];
$data['name']="";
$data['email']="";
$data['id']="";
$query="SELECT * FROM users WHERE id='$id' ";
$qResult=Query($query);

if($qResult['status'])
{
    $row=Fetch($qResult['result']);
    $data=$row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

</head>

<body>

 <div class="container-fluid">
 <div class="row">
        <div class="col-md-4 mt-2">
        <h2>Edit User</h2>
            <form method="post" action="./php/users.php">
            <input type="hidden" name="id" value="<?=$data['id']?>">
            <div class="form-group">
                  <label for="name">Name</label>
                <input type="text" name="name" id="name" required class="form-control"  value="<?=$data['name']?>">
            </div>

            <div class="form-group">
                  <label for="email">Email</label>
                <input type="email" name="email" id="email" required class="form-control"  value="<?=$data['email']?>">
            </div>


            <div class="form-group">
                  <label for="password">Password</label>
                <input type="password" name="password" id="password" required class="form-control">
            </div>

            <button name="btnUpdate" type="submit" class="btn btn-primary btn-block">Submit</button>

            </form>
        </div>
    </div>

 </div>



</body>

</html>