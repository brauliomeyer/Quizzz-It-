<?php

    //Create connection credentials
    $db_host = 'localhost';
    $db_name = 'quizzer';
    $db_user = 'user';
    $db_pass = 'user';

    //Create mysqli object
    $mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

    //Error handlers
    if($mysqli->connection_error)
    {
        printf("Connect failed: %s\n",$mysqli->connect_error);
        exit();
    }  

?>