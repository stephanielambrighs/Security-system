<?php

    // Connect to database
    include_once(__DIR__ . "/classes/Db.php");

    // create connection
    $conn = Db::getConnection();

    // print the object as a string
    function __toString()
    {
        return __CLASS__;
    }
    // check if the tag is not empty
    if(!empty($_POST['tag'])){
        // the tag is posted
        $tag = $_POST['tag'];
        // set default a name
        $firstname = "Stephanie";
        $lastname = "Lambrighs";

        // insert into the db
        $statement = $conn->prepare("INSERT INTO logs (`tag`,`firstname`,`lastname`)
        VALUES (:tag, :firstname, :lastname)");

        // enter the query in the statement
        $statement->bindValue(':tag', $tag);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $result = $statement->execute();

        //  check if the motionsensor is not empty
    }else if(!empty($_POST['motionSensor'])){
        // the motionsensor is posted
        $sensor = $_POST['motionSensor'];

        // insert into the db
        $statement = $conn->prepare("INSERT INTO detection (`name`)
        VALUES (:sensor)");

        // enter the query in the statement
        $statement->bindValue(':sensor', $sensor);
        // var_dump($sensor);
        // var_dump($statement);
        $result = $statement->execute();

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Post</h1>
</body>
</html>