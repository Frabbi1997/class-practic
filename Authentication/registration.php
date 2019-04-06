<?php

    $message = false;

   if(isset($_POST['register'])){
       $first_name = trim($_POST['first_name']);
       $last_name = trim($_POST['last_name']);
       $username = trim($_POST['username']);
       $email = strtolower(trim($_POST['email']));
       $password = trim($_POST['password']);
       $password = password_hash($password, PASSWORD_DEFAULT);
       $address = trim($_POST['address']);

       require_once 'Database/connection.php';

       $query = "INSERT INTO users_information (`first_name`, `last_name`, `username`,
                 `email`, `password`, `address`) VALUES (:first_name, :last_name, :username,
                  :email, :password, :address)";
       $stmt = $connect->prepare($query);
       $stmt->bindParam(':first_name',$first_name);
       $stmt->bindParam(':last_name',$last_name);
       $stmt->bindParam(':username',$username);
       $stmt->bindParam(':email',$email);
       $stmt->bindParam(':password',$password);
       $stmt->bindParam(':address',$address);
       $respone =  $stmt->execute();



       if($respone){
           $message = 'Registration Successful';
       }
       else{
           $message = 'Registration Unsuccessful';
       }

   }




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">

        <form class="form-signin" method="post">
            <?php if($message): ?>
                <div class="alert alert-success">
                    <?php echo $message;?>
                </div>
            <?php endif; ?>

            <h1 class="h3 mb-3 font-weight-normal">Users Register</h1>

            <label for="inputEmail" class="sr-only">first name</label>
            <input type="text" id="inputEmail" name="first_name" class="form-control"
                   placeholder="First name" required >


            <label for="inputEmail" class="sr-only">Last name</label>
            <input type="text" id="inputEmail" name="last_name" class="form-control"
                   placeholder="Last name" required >


            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" name="username" class="form-control"
                   placeholder="Username" required >


            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control"
                   placeholder="Email" required >


            <label for="inputEmail" class="sr-only"> Password</label>
            <input type="password" id="inputEmail" name="password" class="form-control"
                   placeholder="Password" required >


            <label for="inputPassword" class="sr-only">Address</label>
            <input type="text" id="inputPassword" name="address" class="form-control"
                   placeholder="Address" required>


            <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">
                Submit
            </button>

        </form>
</div>

</body>
</html>
