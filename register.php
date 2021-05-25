<?php

// include autoload
include_once(__DIR__ . "/autoload.php");

// if the post is not empty do this:
if(!empty($_POST)){
    try {

        // create a new user object
        $user = new User();

        // use setters to fill in data for this user
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);

        // set variables names for post password
        $password = $_POST['password'];
        $conform_password = $_POST['conform_password'];

        // if the password matches the conform password, it executes the if
        if($password == $conform_password){
            // set de password
            $user->setPassword($_POST['conform_password']);

            // if the email and the conform password is not empty then it executes the following if
            if(!empty($_POST['email']) && !empty($_POST['conform_password'])){
                // register the user by executing a query in the database
                $user->register();
                // start a session and redirect the user to login.php
                header("Location: login.php");
            }else{
                $inputError = true;
            }
        }else{
            $error = true;
        }

    }
    catch(Throwable $error) {
        // if any errors are thrown in the class, they can be caught here
        $error = $error->getMessage();
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/register.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="rocket ship"/>
                <h3>Welcom to security system for servers</h3>
                <p>Log in now to view your security system</p>
                <a href="login.php"><input type="submit" name="login" value="Login"/></a><br/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as security system</h3>

                        <form class="row register-form" method="post" action="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="firstname" type="text" class="form-control" placeholder="First Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="lastname" type="text" class="form-control" placeholder="Last Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Your Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="conform_password" type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                                </div>
                                <!-- if the errors are set then give this message -->
                                <?php if(isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo "Sorry, must both have the same password"; ?></div>
                                <?php endif; ?>
                                <?php if(isset($inputError)): ?>
                                    <div class="alert alert-danger"><?php echo "Sorry, email and password must be entered"; ?></div>
                                <?php endif; ?>
                                <button type="submit" class="btnRegister"  value="Register">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>