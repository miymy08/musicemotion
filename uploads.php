<?php
  include("dbcon.php");
  if(isset($_POST['submit'])){
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
    $file = $_FILES['img']['name'];
    $file_loc = $_FILES['img']['tmp_name'];
    $folder="img/albumcover/";
    move_uploaded_file($file_loc,$folder.$file);
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $m_code = substr(str_shuffle($permitted_chars), 0, 10);
    
    $music = mysqli_query($con,"INSERT INTO mp (m_code, m_title,m_duration,m_year,m_lyric,m_audiofile,m_img,g_id) VALUES ('$m_code','$m_title','$m_duration','$m_year','$m_lyric','$m_audiofile','$file','$g_id')");
    
    for($i=0;$i<count($_POST['singer']);$i++){
      $s_singer = $_POST['singer'][$i];
      $singer = mysqli_query($con,"INSERT INTO singer (m_code, s_name) VALUES ('$m_code','$s_singer')");
    }
    
    $lfe = mysqli_query($con,"INSERT INTO lfe (lfe_arousal,lfe_valence,lfe_e,m_code) VALUES ('$lfe_arousal','$lfe_valence','$lfe_e','$m_code')");
    $afe = mysqli_query($con,"INSERT INTO afe (afe_bpm,afe_energy,afe_mode,afe_loudness,afe_danceability,afe_e,m_code) VALUES ('$afe_bpm','$afe_energy','$afe_mode','$afe_loudness','$afe_danceability','$afe_e','$m_code')");
    $cfe = mysqli_query($con,"INSERT INTO cfe (cfe_x_axis,cfe_y_axis,cfe_e,m_code) VALUES ('$cfe_x_axis','$cfe_y_axis','$cfe_e','$m_code')");
    if ($music || $singer || $lfe || $afe || $cfe){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Succesfully Added!!')
		window.location.href='viewsong.php'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>