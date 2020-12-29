<?php
require_once("operation.php");
session_start();

$con = createdb();
if( (isset($_GET["year"]) || isset($_GET["sem"])) && isset($_GET["course"]) || isset($_GET["sem"]) ){
  $con = createdb();
  echo "entered into if";
}

 ?>
<html lang="en">

<head>
 <title>Welcome</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
 <style>
   body {
     background-image: url("resources/images/homepage_bg.jpg");
     background-repeat: no-repeat;
     background-size: cover;
     background-attachment: fixed;
   }
</style>
</head>

<body>
  <h1>Welcome to home page</h1>
  <div class="rd-sl">
    <form>
      <input type="radio" name="option" id="option" value="qp" onchange="disp('qp')">Question papers
      <input type="radio" name="option" id="option" value="notes" onchange="disp('notes')">Notes
    </form>
  </div>

  <div id="t01">
    <form action="index.php">
      <div id="s1">
        <label for="sem">Choose semester</label>
        <select id="sem" name="sem">
          <option disabled selected value> -- Select semester -- </option>
          	<option value="1">1st sem</option>
          	<option value="2">2nd sem</option>
          	<option value="3">3rd sem</option>
          	<option value="4">4th sem</option>
          	<option value="5">5th sem</option>
          	<option value="6">6th sem</option>
          	<option value="7">7th sem</option>
          	<option value="8">8th sem</option>
        </select>
      </div>

      <div id="s2">
        <label for="year">Choose year</label>
        <input type="number" id="year" name="year" min="2016" max="2019" title="select valid years only" onchange="document.getElementById('s2').style.border=5px solid green;">
      </div>
      <div id="s3">
        <label for="course">Choose course</label>
          <select id="course" name="course" >
            <option disabled selected value>-- Select course --</option>
            <option value="Advance_processor">Advance processor</option>
            <option value="Analog_electronics">Analog Electronics</option>
            <option value="Control_system">Control System</option>
            <option value="Computer_organisation">Computer organisation and architecture</option>
            <option value="Digital_electronics">Digital electronics</option>
          </select>
      </div>


        <div class="submit_button">
            <input style="border-radius:5px;padding:2px 20px;"  type="submit" name="submit" value="Submit">
        </div>

    </form>
    </div>

  <div class="admin_login">
    <p><a href="admin_login.php">Click here for login(for admins only)</a></p>
  </div>
  <!-- files must be displayed below -->
  <div>
    <table class="db-tb" >
      <thead class="tb-hd">
        <tr>
          <th style="width:5%;">Sl.No</th>
          <th style="width:35%;">Name</th>
          <th style="width:20%;">year</th>
          <th style="width:40%;">link</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if( (isset($_GET["year"]) || isset($_GET["sem"])) && isset($_GET["course"]) || isset($_GET["sem"])){

          if(isset($_GET["sem"])){
            $result = getQpData($GLOBALS["con"],$_GET["sem"]);
          }
          elseif(isset($_GET["year"])){
              $result = getNotesData($GLOBALS["con"],$_GET["year"],$_GET["course"]);
          }
          $slno = 0;
          if($result)
          {
            while ($row = mysqli_fetch_assoc($result)) {?>
              <tr>
                <?php $slno = $slno+1; ?>
                <td><?php echo $slno?></td>
                <td><?php echo "$row[name]"; ?></td>
                <td><?php echo "$row[year]"; ?></td>
                <td><a href=resources/<?php echo "$row[link]"; ?> download><?php echo "$row[link]"; ?></a></td>
              </tr>
              <?php
            }
          }
        }

        ?>
      </tbody>
    </table>
  </div>

  <script>
    document.getElementById('s1').style.display = 'none';
    document.getElementById('s2').style.display = 'none';
    document.getElementById('s3').style.display = 'none'
    function disp(value)
    {
      if(value == 'qp')
      {
          document.getElementById('s1').style.display = 'block';
          document.getElementById('s2').style.display = 'none';
          document.getElementById('s3').style.display = 'none'
      }
      else if (value == 'notes') {
        document.getElementById('s1').style.display = 'none';
        document.getElementById('s2').style.display = 'block';
        document.getElementById('s3').style.display = 'block';
      }

    }
  </script>

</body>
</html>
