<?php
  $title = 'User List';

    session_start();

    if(!isset($_SESSION['id'])){
        var_dump($_SESSION);

        header('Location:index.php');
        exit();
    }

     require_once 'Database/connection.php';

     $query = 'SELECT id, email FROM users_information';
     $stmt = $connect->query($query);
     $stmt->execute();

     $users = $stmt->fetchAll();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
   <div class="container">
       <div class="text-center">
           <h1>User List:</h1>
       </div>
       <table class="table table-bordered table-hovered">
          <thead>
              <tr>
                  <td>Serial</td>
                  <td>User ID</td>
                  <td>Email</td>
              </tr>
          </thead>

           <thead>
             <?php $i=1; ?>
               <?php  foreach($users as $user): ?>
              <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $user['id']; ?></td>
                  <td><?php echo $user['email']; ?></td>
              </tr>
              <?php endforeach; ?>
           </thead>
       </table>

       <div class="row">
           <a href="logout.php" class="btn btn-danger">Logout</a>
       </div>

   </div>
</body>
</html>
