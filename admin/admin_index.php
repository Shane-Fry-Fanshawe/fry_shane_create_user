<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  confirm_logged_in();

// Create new user in database
//Step one: do something when the sumbit button is clicked
//Step two: insert username into databse
//Step three: give the




  if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username !== "" && $password !== "") {  //&& and
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please fill in the required fields";
    }
  }



?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
 <link rel="stylesheet" type="text/css" href="../admin/css/main.css">
 <link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="top_section">
  <h1>Welcome Company Name to your admin page</h1>
  <?php echo "<h2>Hi {$_SESSION['user_name']} </h2>";

//  displayLogin();

  ?>
</div>

  <div id="welcome_message_div">
    <i id="x" class="fa fa-close" style="font-size:24px"></i>
    <p class="welcome_message"> </p>
  </div>


  <h1>Create New User:</h1>
  <form action="admin_index.php" method="post"> <!-- Have it set to the same page so once you enter it, it empties incase you need to add more and more -->
    <label>Username</label>
    <input type="text" name="username" value="">
    <br>
    <label>Password</label>
    <input type="text" name="password" value="">
    <br>
    <input type="submit" name="submit" value="Create">
  </form>


</body>
<script src="../admin/js/main.js"></script>
</html>
