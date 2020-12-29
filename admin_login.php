<?php
  require_once("validate.php");
  if(isset($_POST["login"])  )
  {
    $tablename = "creds";
    $con = connectserver();
    validateUser($con,$tablename);
  }
  elseif ( isset($_POST["createAccount"])) {
    $tablename = "creds";
    $con = connectserver();
    createUserAccount($con,$tablename,$_POST["uname"],$_POST["password"],$_POST["email"],$_POST["mobile_num"]);
  }
 ?>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Login</title>
  <style>
    body{
      background-image: url("resources/images/loginbg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
</head>

<body>
<h1>Welcome admin</h1>
  <form class="login_cred" action="admin_login.php"  method="post" validate>
    <fieldset>
      <legend style="font-size: 2em;text-align: center;">Login</legend>

      <div class="email">
        <label for="email">Enter email id:</label>
        <input type="email" name="email" id="email" title="Enter E-mail" size="30em"required>
      </div>

      <div class="password">
        <label for="password">Enter password:</label>
        <input type="password" name="password" id="password" size="30em" title="Enter password" required>
      </div>

      <div class="submit_button">
        <input style="padding:2px 50px;" type="submit" name="login" value="Login">
      </div>
  </fieldset>
  </form>


  <form class="createAcc" action ="admin_login.php" method="post" validate>
    <fieldset>
      <legend style="font-size: 2em;text-align: center;">Create account here</legend>

        <div class="uname">
          <label for="uname">Enter full name:</label>
          <input type="text" name="uname" id="uname" title="Enter full name" size="30em" required>
        </div>

        <div class="email">
          <label for="email">Enter E-mail id:</label>
          <input type="email" name="email" id="email" title="Enter username" size="30em" required>
        </div>

        <div class="mobile_num">
          <label for="mobile_num">Enter mobile number:</label>
          <input type="number" name="mobile_num" id="mobile_num" title="Enter mobile num" size="30em" maxlength="10" required>
        </div>

        <div class="password">
          <label for="password">Enter password:</label>
          <input type="password" name="password" id="password" title="Enter password" size="30em" required>
        </div>

        <div class="submit_button">
          <input style="padding:2px 50px;" type="submit" name="createAccount" value="Create Account">
        </div>
    <fieldset>
  </form>

</body>
</html>
