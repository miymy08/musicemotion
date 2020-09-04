<?php 
  include "dbcon.php";
  error_reporting(0);
  session_start();
  if (empty($_SESSION[username]))
  {
    echo "<center>Login Required!<br>";
	echo "<a href=admin.php><b>LOGIN</b></a></center>";
  }
  else
  {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MusicEmotion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/me%20mini%20v1.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
      @font-face {
        font-family: FirstFont;
        src: url(font/Goodlight.otf);
      }
      body,h1,h5 {font-family: "Raleway", sans-serif}
      body, html {height: 100%}
      .bar, .footer {
        -webkit-box-shadow:0px 0px 19px 1px #000000 ;
        -moz-box-shadow:0px 0px 19px 1px #000000 ;
        box-shadow:0px 0px 19px 1px #000000 ;
      }
      .searchbar{
        height: 30px;
        margin-top: 10px;
      }
      .searchbutton{
        position: absolute;
        right: 60px;
        top: 13px;
        color: black;
      }
      .content{
        width: 80%;
        height: 500px;
        margin: auto;
        padding-top: 30px;
      }
      .footer_content{
        padding: 10px 40px;
      }
      .footer_content a:link{
        text-decoration-line: none;
      }
    </style>
  </head>
  <body>

    <div class="w3-bar w3-theme-d4 bar" style="padding: 0 50px">
      <a href="logout2.php" onclick="return confirm('It will log out and direct to main page. Are you sure?');" class="w3-bar-item"><img src="img/me%20wide%20v2.png" style="width:130px;"></a>
      <a href="adminmain.php" class="w3-bar-item w3-padding-16 w3-button">Admin Main Menu</a>
      <a href="addsong.php" class="w3-bar-item w3-padding-16 w3-button">Add Song</a>
      <a href="viewsong.php" class="w3-bar-item w3-padding-16 w3-button">Edit / Delete Song</a>
      <a href="logout.php" onclick="return confirm('Are you sure you want to log out?');" class="w3-bar-item w3-padding-16 w3-right w3-button">Log Out</a>
      <span class="w3-bar-item w3-padding-16 w3-right">Hi, Admin</span>
    </div>
    
    <div class="content">
      <div class="w3-row-padding" style="margin-top:200px;">
        <div class="w3-half">
          <a href="addsong.php" style="text-decoration:none;">
            <div>
              <center>
                <button class="w3-button w3-border w3-theme-d4">Add Song</button>
                <p style="width:50%;">Add a song and all it details like singer, genre, lyric and much more.</p>
              </center>
            </div>
          </a>
        </div>
        <div class="w3-half">
          <a href="viewsong.php" style="text-decoration:none;">
            <div>
              <center>
                <button class="w3-button w3-border w3-theme-d4">Edit / Delete Song</button>
                <p style="width:50%;">Edit song and all it details like singer, genre, lyric and much more or want to delete song that dont want.</p>
              </center>
            </div>
          </a>
        </div>
      </div>
    </div>
    
    <footer class="footer w3-theme-d4 w3-padding-16" style="margin-top:40px;">
      <div class="w3-row" style="overflow:auto;">
        <div class="w3-third footer_content">
          <h3>About MusicEmotion</h3>
          <center><img src="img/me%20v3.png" style="width:100px;">
          <p>MusicEmotion is a web-based system where it's functionality is to show the emotion of a particular song based on the different element that contained in the song. There are 3 aspects that decided the emotion of the song, which are lyrical, audio and combination of both lyrical and audio.</p></center>
        </div>
        <div class="w3-third footer_content">
          <h3>Site Links</h3>
          <ul class="w3-ul">
            <li class="w3-padding-8">
              <span><i class="fas fa-align-justify"></i> Description</span>
            </li>
            <li class="w3-padding-8">
              <span><i class="fas fa-phone"></i> Contact Us</span>
            </li>
            <li class="w3-padding-8">
              <span><i class="fas fa-address-card"></i> About Us</span>
            </li>
          </ul>
        </div>
        <div class="w3-third footer_content">
          <h3>Recent Song Added</h3>
          <ul class="w3-ul">
            <li class="w3-padding-16">
              <img src="img/albumcover/amalina.jpg" class="w3-left w3-margin-right" style="width:50px">
              <span class="w3-large">Amalina</span><br>
              <span>Santesh</span>
            </li>
            <li class="w3-padding-16">
              <img src="img/albumcover/antapermana.jpg" class="w3-left w3-margin-right" style="width:50px">
              <span class="w3-large">Anta Permana</span><br>
              <span>Datuk Siti Nurhaliza</span>
            </li> 
          </ul>
        </div>
      </div>
    </footer>
    <div class="w3-block w3-theme-dark w3-padding">
      <center>©MusicEmotion 2019</center>
    </div>
    
  </body>
</html>
<?php
  }
?>