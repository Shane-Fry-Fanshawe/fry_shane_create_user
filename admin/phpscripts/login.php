<?php

  function logIn($username, $password, $ip){
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";















    //So the read file can update for these tables and columns
    //was working in admin_index showing the correct SQL info, trying here to see if it runs when you log in (my be my  problem)





    //Current Time for last Login
    //date_default_timezone_set("America/New_York");
    //$current_time = date("Y-m-d h:i:sa");


      //echo $loginstring;

      $user_set = mysqli_query($link, $loginstring);

      if(mysqli_num_rows($user_set)){
        $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
        $id = $found_user['user_id'];
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $found_user['user_fname'];


        if(mysqli_query($link, $loginstring)) {
          $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id = {$ip}";
        $updatequery = mysqli_query($link, $updatestring);

        $tbl = "tbl_user";
        $col = "user_last_login";
        date_default_timezone_set("America/New_York");
        $current_timestamp = date("Y-m-d h:i:sa");

      updateTable($tbl, $col, $current_timestamp);


        }
        //On my PCs local host it would just return ::1 and not update the IP not sure why
        //  echo $ip;
        redirect_to("admin_index.php");


      }
      else{
        $message = "Username and or password incorrect. <br>Please make sure your cap lock key is turned off.";
      }


    mysqli_close($link);
  }


 ?>
