<?php
require_once("operation.php");
session_start();

if(!isset($_SESSION["name"])){
    header("Location: admin_login.php");
  }
if(isset($_FILES["fileToupload"]["name"]))
{
  if(isset($_POST['sem']))
  {

      if(uploadQpToDB())
      {
          $con = createdb();
          addQpToTable($con,$_POST['course'],$_POST['sem'],$_FILES["fileToupload"]["name"],$_POST['year']);
      }
      else {
        die("Sorry, there was an error uploading your file.");
      }
  }
  elseif(isset($_POST['year'])) {

    if(uploadNotesToDB())
    {
      $con = createdb();
      addNotesToTable($con,$_POST['course'],$_POST['year'],$_FILES["fileToupload"]["name"]) ;
    }
    else {
      die("Sorry, there was an error uploading your file.");
    }
  }
//header("Location: clear_post.php");
}
 ?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION["name"] ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
      background-image: url("resources/images/backgroundprofile.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    </style>
  </head>

  <body>
    <div class="wc-me">
      <h1>Welcome <?php echo $_SESSION['name'];?></h1>
    </div>

    <form action="profile.php" method="post" enctype="multipart/form-data">

    <div class="fm">
      <div class="rd-sl">
        <form>
          <input type="radio" name="option" id="option" value="qp" onchange="disp('qp')">Question papers
          <input type="radio" name="option" id="option" value="notes" onchange="disp('notes')">Notes
        </form>
      </div>

      <div id="s1">
        <label for="sem">Choose semester</label>
          <select id="sem" name="sem" >
            <option disabled selected value> -- select an option -- </option>
        <option value="1">1st sem</option>
        <option value="2">2nd sem</option>
        <option value="3">3rd sem</option>
        <option value="4">4th sem</option>
        <option value="5">5th sem</option>
        <option value="6">6th sem</option>
        <option value="7">7th sem</option>
        <option value="8">8th sem</option>
          </select required>
      </div>

      <div id="s2">
        <label for="year">Enter year:</label>
        <input type="number" name="year" id="year" min="2016" max="2019" required>
      </div>

      <div >
        <label for="course">Choose course:</label>
        <select name="course" id="course">
          <option disabled selected value>-- Select course --</option>
          <option value="Advance_processor">Advance processor</option>
          <option value="Analog_electronics">Analog Electronics</option>
          <option value="Control_system">Control System</option>
          <option value="Computer_organisation">Computer organisation and architecture</option>
          <option value="Digital_electronics">Digital electronics</option>
        </select required>
      </div>

      <!-- Input file here -->
      <label  for="fileToupload" style="padding-left:10em;">Select file to upload:</label>
      <input class="btn" type="file" name="fileToupload" id="fileToupload" required>
      <br>
      <input style="margin-top:10px;padding:10px 20px;" type="submit" value="upload" name="submit">
    </form>
    </div>

<p class="logout"><button><a style="text-size:15px;" href="logout.php">LOGOUT</button> </p>
  <script>
    document.getElementById('s1').style.display = 'none';
    document.getElementById('s2').style.display = 'none';
    function disp(value)
    {
      if(value == 'qp')
      {
          document.getElementById('s1').style.display = 'block';
          document.getElementById('s2').style.display = 'block';
      }
      else if (value == 'notes') {
        document.getElementById('s1').style.display = 'none';
        document.getElementById('s2').style.display = 'block';
      }

    }
  </script>
  </body>
</html>
