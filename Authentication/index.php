<?php
 $title = 'User Login';
 $message = false;
 $type = 'success';

 session_start();


 if(isset($_POST['login'])){
   $email = strtolower(trim($_POST['email']));
   $password = trim($_POST['password']);

   require_once 'Database/connection.php';

   $query = 'SELECT id, email, password FROM users_information WHERE email=:email';
   $stmt = $connect->prepare($query);
   $stmt->bindParam(':email',$email);
   $stmt->execute();

   $value = $stmt->fetch();

     if($value){
         if(password_verify($password, $value['password']) ===true){
             $_SESSION['id'] = $value['id'];
             $_SESSION['email'] = $value['email'];
             $message = 'Login successful';

             header('Location:user_list.php');
         }
         else{
             $message = 'Invaild credantial';
             $type= 'danger';
         }
     }

     else{
         $message = 'User not found';
         $type= 'danger';
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
    <title><?php echo $title; ?></title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
   <div class="container">
       <?php if($message): ?>
       <div class="alert alert-<?php echo $type; ?>">
           <?php echo $message; ?>
       </div>
       <?php endif; ?>
       <div class="text-center">
           <h1>User Login:</h1>
       </div>

       <form action="" method="post">
            <label for="InputEmail" class="sr-only">email</label>
           <input type="email" name="email" class="form-control" placeholder="email address"
                 required>

           <label for="InputPassword" class="sr-only">email</label>
           <input type="password" name="password" class="form-control"
                  placeholder="password" required>

           <button type="submit" name="login" class="btn btn-primary btn-block">
               Submit
           </button>
       </form>
   </div>
</body>
</html>
