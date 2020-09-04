<?php
  include "dbcon.php";
  $code_music = $_GET['m_code'];
  $q_mp = mysqli_query($con,"DELETE FROM mp WHERE m_code = '$code_music';");
  $q_s = mysqli_query($con,"DELETE FROM singer WHERE m_code = '$code_music';");
  $q_afe = mysqli_query($con,"DELETE FROM afe WHERE m_code = '$code_music';");
  $q_cfe = mysqli_query($con,"DELETE FROM cfe WHERE m_code = '$code_music';");
  $q_lfe = mysqli_query($con,"DELETE FROM lfe WHERE m_code = '$code_music';");
  if($q_mp && $q_s && $q_afe && $q_cfe && $q_lfe){
    echo "<SCRIPT LANGUAGE='Javascript'>
		confirm('Succesfully Delete')
		window.location.href='viewsong.php'
		</SCRIPT>";
  }
  else{
    echo "Failed to Delete";
  }
?>