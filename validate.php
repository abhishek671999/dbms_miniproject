<?php
session_start();


function connectserver()
{
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "notestore";
  $con = mysqli_connect($servername,$username,$password);

  if(!$con){
    die("connection failed:".mysqli_connect_error());
  }
  else {
    return $con;
  }
}

function validateUser($con,$tablename)
{
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "notestore";

    $sql = "CREATE DATABASE IF NOT EXISTS $database";
     $emailid = $_POST['email'];
     $pwd = $_POST['password'];
    if(mysqli_query($con, $sql))
    {
      echo "Database created";
      $con = mysqli_connect($servername, $username, $password, $database);
        $sql = "SELECT * FROM $tablename where EMAIL='$emailid' and password='$pwd'";
        if($result = mysqli_query($con,$sql))
        {

          if(($output = mysqli_fetch_array($result, MYSQLI_ASSOC)) > 0)
          {
            $_SESSION["login"] = true;
            $_SESSION["name"] = $output["name"];
            header('Location: profile.php');
            echo "login success ful";
          }
          else {
            echo "<script language='javascript'>";
            echo "window.alert('login failed')";
            echo "</script>";
          }
        }
        else {
          echo "Error".mysqli_error($con);
        }
      }
}
function createUserAccount($con, $tablename, $userid, $pwd, $emailid,$mobile_num)
{
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "notestore";

  $sql = "CREATE DATABASE IF NOT EXISTS $database";
  if(mysqli_query($con, $sql))
  {
    $con = mysqli_connect($servername, $username, $password, $database);
     $sql = "INSERT INTO $tablename VALUES ('$userid','$pwd','$emailid','$mobile_num')";
    if(mysqli_query($con,$sql))
    {
      echo "<script language='javascript'>";
      echo "alert('Account Sucessfully created')";
      echo "</script>";
    }
    else {
      echo "Error:".mysqli_error($con);
    }
  }
}

 ?>
