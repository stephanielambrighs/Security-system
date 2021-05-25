<?php

// include autoload
require_once(__DIR__ . "/autoload.php");

    // if email and password are not empty do this:
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        try {
          //create an object from the class User
          $user = new User();
          // set the email when you post the email
          $user->setEmail($_POST['email']);
          // set the password when you post the password
          $user->setPassword($_POST['password']);

          // if the user can login then do this:
          if($user->canLogin()){
            session_start();
            // create a session
            $_SESSION['email'] = $user;
            // redirect to dashboard.php
            header("Location: dashboard.php");
          }
          else{
            $error = true;
          }
        }
        catch(Exception $e){
          $error = $e->getMessage();
          $error = '<p>The password must be 5 characters long </p>';
        }

    }



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/login.css" rel="stylesheet" type="text/css"/>
    <title>Login</title>
</head>
<body>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login Form</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Login Form</h3>
                            <!-- set an error message  -->
                            <?php if(isset($error)): ?>
                                <div class="alert alert-danger"><?php echo "Sorry, we couldn't log you in."; ?></div>
                            <?php endif; ?>
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btnContactSubmit" value="Login" />
                                            <a href="register.php" class="btnForgetPwd" value="Login">Click here to sign up</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
</body>
</html>