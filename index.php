
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</head>

<body>
<?php
 include_once __DIR__."/php/functions.php";
 get_flash();
?>


<a href="./add.php" class="btn btn-success">Add New</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
           
            $res=Query("SELECT * FROM users");
            if($res['status'])
            {

           
            while ($row = Fetch($res['result']))
             {
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['date_stamp'] ?></td>
                    <td>

                        <a href="php/users.php?delete_id=<?= $row['id']?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </a>
                       
                        <a href="edit.php?id=<?=$row['id']?>" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>


                    </td>
                </tr>

            <?php
            }

        }
        else
        {
           echo "
           <tr>
           <td colspan='4' class='text-center'>
                <h2>{$res['message']}</h2>
           </td>
           </tr>
           ";
        }
            ?>


        </tbody>
    </table>



</body>

</html>