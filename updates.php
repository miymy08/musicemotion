<?php
  include("dbcon.php");
  if(isset($_POST['submit'])){
    $m_code = $_POST['code'];
    $m_title = $_POST['title'];
    $m_duration = $_POST['duration'];
    $m_year = $_POST['year'];
    $m_lyric = $_POST['lyric'];
    $m_audiofile = $_POST['audiofile'];
    $g_id = $_POST['g_id'];
    $lfe_arousal = $_POST['arousal'];
    $lfe_valence = $_POST['valence'];
    $lfe_e = $_POST['lfe_e'];
    $afe_bpm = $_POST['bpm'];
    $afe_energy = $_POST['energy'];
    $afe_mode = $_POST['mode'];
    $afe_loudness = $_POST['loudness'];
    $afe_danceability = $_POST['danceability'];
    $afe_e = $_POST['afe_e'];
    $cfe_x_axis = $_POST['x_axis'];
    $cfe_y_axis = $_POST['y_axis'];
    $cfe_e = $_POST['cfe_e'];
    
    $music = mysqli_query($con,"UPDATE mp SET m_title='$m_title', m_duration='$m_duration', m_year='$m_year', m_lyric='$m_lyric', m_audiofile='$m_audiofile', g_id='$g_id' WHERE m_code='$m_code'");
    
    $lfe = mysqli_query($con,"UPDATE lfe SET lfe_arousal='$lfe_arousal', lfe_valence='$lfe_valence' WHERE m_code='$m_code'");
    $afe = mysqli_query($con,"UPDATE afe SET afe_bpm='$afe_bpm', afe_energy='$afe_energy', afe_mode='$afe_mode', afe_loudness='$afe_loudness',afe_danceability='$afe_danceability', afe_e='$afe_e' WHERE m_code='$m_code'");
    $cfe = mysqli_query($con,"UPDATE cfe SET cfe_x_axis='$cfe_x_axis', cfe_y_axis='$cfe_y_axis' WHERE m_code='$m_code'");
    if ($music ||  $lfe || $afe || $cfe){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Succesfully Update!!')
		window.location.href='viewsong.php'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>