<?php

require_once(__DIR__ . "/autoload.php");

session_start();

  // if the session is not set then a redirect
  if(!isset($_SESSION['email'])){
    header("Location: login.php");
  }else{

    // create an object from the class log
    $log = new Log();
    // get the id from log
    $logId = $log->getId();
    // set this logid in the function viewLogs
    $logs = $log->viewLogs($logId);

    //create an object from the class detection
    $detection = new Detection();
    //set the function viewDetection
    $result = $detection->viewDetection();

  }





?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/dashboard.css" rel="stylesheet" type="text/css"/>
    <title>Dashboard</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Security system</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="logout.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>

<!-- set the view detection in html -->
<div class="btn-detection">
  <button type="button" class="btn btn-danger"><?php echo "Danger someone is in the room at: " . $detection->viewDetection()['date'];?></button>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tag</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Time logged</th>
    </tr>
  </thead>
  <tbody>
  <!-- loop over the logs and view this -->
  <?php foreach($logs as $viewLog): ?>
    <tr>
      <th class="row" scope="row"><?php echo $viewLog['id']; ?></th>
      <td><?php echo $viewLog['tag']; ?></td>
      <td><?php echo $viewLog['firstname']; ?></td>
      <td><?php echo $viewLog['lastname']; ?></td>
      <td><?php echo $viewLog['time_logged']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>