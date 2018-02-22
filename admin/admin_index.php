<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
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
	<h1>Welcome Company Name to Your Admin Page</h1> <!--added week 5-->
	<?php echo "<h2>Hi-{$_SESSION['user_name']}</h2>";  ?> <!--added week 5-->
	<a href="admin_createuser.php">Create User</a> <!--added week 5-->
		<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a> <!--added week 5-->


	</div>

	  <div id="welcome_message_div">
	    <i id="x" class="fa fa-close" style="font-size:24px"></i>
	    <p class="welcome_message"> </p>
	  </div>



	</body>
	<script src="../admin/js/main.js"></script>
	</html>
