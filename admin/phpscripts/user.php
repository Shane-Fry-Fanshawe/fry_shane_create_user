<?php
function createUser($fname, $username, $email, $userlvl){
  include('connect.php'); //the second NULL is for time, the third NULL is for ip address



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


  //Generate password, and set it to the random one we made
  $password = generateUserTempPassword();

  //Than encrypt password through php
  //http://php.net/manual/en/function.md5.php
  $password = md5($password);






  // This query inserts a new user in the database
  //Some changes were adding the (`user_fname` etc so it could work saving to the data base no data since it gives a current timestamp)
  $userString = "INSERT INTO tbl_user(`user_fname`,`user_name`, `user_pass`,`user_email`, `user_ip`, `user_status`) VALUES('{$fname}', '{$username}', '{$password}', '{$email}', '{$userlvl}', 'no')"; //Removed Date since currentstamp



  $userQuery = mysqli_query($link, $userString);


  if($userQuery){ //if userQuery was successful and above


//Email Function

    $message = "Welcome {$username} \r\n This is your password : {$password}\r\n You can login in http://domain.com/admin/admin_login.php";

    // In case any of our lines are larger than 70 characters, we should use wordwrap()
    //I think this is class work since I was sick and got this from Lexi
    $message = wordwrap($message, 70, "\r\n"); // rn = line break

    // Send email
    mail($email, 'Welcome user', $message);

      //I set it to create user instead of the login page, since an admin wouldnt want to be redirected to test it.
       redirect_to("admin_createuser.php");

  }else{ //if fails
    $message = "There was a problem creating this user";
    return $message;
  }

  mysqli_close($link);
}




?>
