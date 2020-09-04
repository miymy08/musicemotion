<?php
  ob_start();
  session_start();
  if(isset($_POST['submit'])){ 
    include("dbcon.php");
    if(!empty($_POST['username'])){ 
      $query = mysqli_query($con,"SELECT * FROM admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error($con)); 
      $row = mysqli_fetch_array($query);
      if($row){ 
        $_SESSION['username'] =  $row['username'];
?>

<script>
  alert('Successfully login');
  window.location.href='adminmain.php';
</script>

<?php		
	}else { 
?>

<script>
  alert('Wrong Username or Password had been entered!');
  window.location.href='admin.php';
</script>

<?php
	} 
  }
  echo "error" ;
} 
?>