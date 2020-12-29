<?php
require_once("db.php");

function getNotesData($con,$year,$course){
  $sql = "select name,year,link from notes where lower(name)=lower('$course') and year='$year' and sem is NULL";
  if($result = mysqli_query($con, $sql)){
      return $result;
    }
  else {
    echo "error".mysqli_error($con);
  }
}

function getQpData($con, $sem)
{
  $sql = "select name,year,link from notes where sem='$sem'";
  if($result = mysqli_query($con, $sql)){
      return $result;
    }
  else {
    echo "error".mysqli_error($con);
  }
}

function addNotesToTable($con, $course, $year, $link)
{
  $sql = "INSERT INTO NOTES (NAME,YEAR,LINK) VALUES ('$course','$year','$link');";
  if(mysqli_query($con, $sql)){
    echo "<script language='javascript'>";
    echo "alert('Sucessfully uploaded')";
    echo "</script>";

  }
  else {
    die("error".mysqli_error($con));
  }
}

function addQpToTable($con, $course, $sem, $link,$year)
{
  $sql = "INSERT INTO NOTES (NAME,SEM,LINK,YEAR) VALUES ('$course','$sem','$link','$year');";
  if(mysqli_query($con, $sql)){
    echo "<script language='javascript'>";
    echo "alert('Sucessfully uploaded')";
    echo "</script>";
  }
  else {
    die("error".mysqli_error($con));
  }
}

function uploadNotesToDB(){
  $target_dir = "resources/";
  $target_file = $target_dir.basename($_FILES["fileToupload"]["name"]);

    if (move_uploaded_file($_FILES["fileToupload"]["tmp_name"], $target_file)) {
      return 1;
    }
     else {
      return 0;
    }
}
function uploadQpToDB(){
  $target_dir = "resources/";
  $target_file = $target_dir.basename($_FILES["fileToupload"]["name"]);

    if (move_uploaded_file($_FILES["fileToupload"]["tmp_name"], $target_file)) {
        return 1;
      }
     else {
      return 0;
    }
}

 ?>
