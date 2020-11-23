<?php

function Createdb() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "habits";

    $con = mysqli_connect($servername, $username, $password);

    if (!$con) {
        die("Connection Failed : ".mysqli_connect_error());
    }

    //create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
            create table if not exists atomic_habits(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                habit_name VARCHAR(300) NOT NULL
            );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot create table";
        }
    }else{
        echo "Error while creating database ".mysqli_error($con);
    }

}