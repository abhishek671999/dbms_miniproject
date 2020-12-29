<?php

function createdb(){
  $servername ="localhost";
  $username ="root";
  $pasword = "root";
  $dbname = "notestore";

  //Create connection
  $con = mysqli_connect($servername,$username,$pasword);
  // check connection
  if(!$con){
    die("connection failed:".mysqli_connect_error());
  }
  $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

  if(mysqli_query($con, $sql)){
    $con = mysqli_connect($servername,$username,$pasword,$dbname);
    $sql = "
      CREATE TABLE IF NOT EXISTS NOTES(
        NAME VARCHAR(30) NOT NULL,
        YEAR INT(4) NOT NULL,
        LINK VARCHAR(50) NOT NULL
      );
    ";
    if(mysqli_query($con, $sql)){
      return $con;
    }
    else {
      echo "Table note created".mysqli_error($con);
    }
  }
  else {
    echo "ERROR WHILE CREATING DATABASE".mysqli_error($con);
  }
}


?>
