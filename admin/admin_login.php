<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once('phpscripts/config.php');

  $ip = $_SERVER['REMOTE_ADDR'];


  //echo $ip;
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




// This is the users generated password
//Tutorial https://stackoverflow.com/questions/4356289/php-random-string-generator it was pretty straight forward and not much to change, so I explained every part showing I understand not copy and pasting
  function generateUserTempPassword($length = 20) {

    //Variables
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // All Possible Characters to be generated for temp/emailed password
      $charactersLength = strlen($characters);  // strlen — Get string length
      $randomPassword = '';

      //Basic For statement (p for password, could change later if its to easy for a hacker to find and somehow tamper with password etc)
      for ($p = 0; $p < $length; $p++) { //P has to be smaller than Length in my case 20, to make sure it runs properly
          $randomPassword .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomPassword;

      //echo generateUserTempPassword();
  }


  //When I was researching I saw that the above was not as secure as this:
  //Only difference was it doesnt display 2 characters in the same string but wouldnt that make it easier to determine? To me I think have more possible combinations ( such as 2 of the same letters) would make it harder to guess
  //vs something that you know cant have the same character (process of elimintation) & theres less combinations so i wasnt sure just leaving it, Im curious to see what you think is better

/*  function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
} */







 ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
</head>
<body>
  <h1>Welcome Company Name</h1>
  <?php if(!empty($message)){echo $message;}

    ?>
  <form action="admin_login.php" method="post">
    <label>Username</label>
    <input type="text" name="username" value="">
    <br>
    <label>Password</label>
    <input type="text" name="password" value="">
    <br>
    <input type="submit" name="submit" value="Show me the money">
  </form>
</body>
</html>
