<?php
  session_start();
  session_destroy();
  echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Succesfully Logout!!')
		window.location.href='index.php'
		</SCRIPT>";
?>