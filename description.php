<?php include "dbcon.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <title>MusicEmotion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/me%20mini%20v1.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        margin: auto;
      }
      .micbg{
        position: absolute;
        bottom: 0;
        z-index: -1;
      }
      .footer_content{
        padding: 10px 40px;
      }
      .footer_content a:link{
        text-decoration-line: none;
      }
    </style>
  </head>
  <body class="bgimg">

    <div class="w3-bar w3-theme-d4 bar" style="padding: 0 50px;margin-bottom:40px;">
      <a href="index.php" class="w3-bar-item"><img src="img/me%20wide%20v2.png" style="width:130px;"></a>
      <a href="main.php" class="w3-bar-item w3-button w3-padding-16">Music</a>
      <div class="w3-dropdown-hover">
        <button class="w3-button w3-padding-16">
          Emotion <i class="fa fa-caret-down"></i>
        </button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
          <?php
          $query = mysqli_query($con,"SELECT * FROM emotion");
          while ($emotion_row = mysqli_fetch_array($query)){
          ?>
          <a href="sortemotion.php?e_id=<?php echo $emotion_row['e_id'] ?>" class="w3-bar-item w3-button"><?php echo $emotion_row['e_name']?></a>
          <?php
          }
          ?>          
        </div>
      </div>
      <form action="searchresult.php" method="post">
        <input type="text" name="search_result" class="w3-bar-item w3-round-large w3-right searchbar" placeholder="Song title...">
        <a href="#" class="searchbutton"><i class="fa fa-search"></i></a>
      </form>
    </div>
    
    <div class="content">
      <h1 style="font-family:FirstFont;">How to determine the emotion of a song?</h1>
      <span>To determine it, there are 3 element that be take measure, lyric features, audio features and combination of audio and lyric features.</span>
      <hr>
      <div class="w3-row">
        <div class="w3-third">
          <h4 style="font-family:FirstFont;">Lyric Feature (LFE)</h4>
          <ul class="w3-ul w3-padding">
            <li class="padding-8" onclick="myFunction('arousal')">
              <h5>Arousal</h5>
              <div id="arousal" class="w3-container  ">
                <p>How much excitement an average listener would perceive from the lyrics (activated or deactivated)</p>
                <p><strong>Lowest Value:</strong> 0</p>
                <p><strong>Highest Value:</strong> 100</p>
              </div>
            </li>
            <li class="padding-8" onclick="myFunction('valence')">
              <h5>Valence</h5>
              <div id="valence" class="w3-container  ">
                <p>A subjective feeling of pleasantness or unpleasantness (used to denote positivity or negativity of emotions)</p>
                <p><strong>Lowest Value:</strong> 0</p>
                <p><strong>Highest Value:</strong> 100</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="w3-third">
          <h4 style="font-family:FirstFont;">Audio Feature (AFE)</h4>
          <ul class="w3-ul w3-padding">
            <li class="padding-8" onclick="myFunction('mode')">
              <h5>Mode</h5>
              <div id="mode" class="w3-container  ">
                <p>Note and scale selection that plays role in the overall positivity or negativity  of a song, perceived by listener as either happy or sad</p>
                <p><strong>Lowest Value:</strong> 12A</p>
                <p><strong>Highest Value:</strong> 12B</p>
              </div>
            </li>
            <li class="padding-8" onclick="myFunction('bpm')">
              <h5>Beat Per Minute</h5>
              <div id="bpm" class="w3-container  ">
                <p>Beats per minute (or tempo) is the speed of a song, which can be directly co-related with the energy felt by a listener</p>
                <p><strong>Lowest Value:</strong> 0</p>
                <p><strong>Highest Value:</strong> 150</p>
              </div>
            </li>
            <li class="padding-8" onclick="myFunction('loud')">
              <h5>Loudness</h5>
              <div id="loud" class="w3-container  ">
                <p>Reflect the types of instruments used. Heavy distorted guitars and aggressive drum beats tend to be associated with high energy tracks, while softer, acoustic guitars or keyboards tend to be comparatively mellow.</p>
                <p><strong>Lowest Value:</strong> -60</p>
                <p><strong>Highest Value:</strong> 0</p>
              </div>
            </li>
            <li class="padding-8" onclick="myFunction('dance')">
              <h5>Danceability</h5>
              <div id="dance" class="w3-container  ">
                <p>Specifically measures how well a song fits into the first quadrant, that is, positive songs with high energy.</p>
                <p><strong>Lowest Value:</strong> 0</p>
                <p><strong>Highest Value:</strong> 100</p>
              </div>
            </li>
            <li class="padding-8" onclick="myFunction('energy')">
              <h5>Energy</h5>
              <div id="energy" class="w3-container  ">
                <p>The best indicator of the intensity of emotion and supplements the Arousal value obtained from lyric analysis. </p>
                <p><strong>Lowest Value:</strong> 0</p>
                <p><strong>Highest Value:</strong> 100</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="w3-third">
          <h4 style="font-family:FirstFont;">Combination Feature (CFE)</h4>
          <ul class="w3-ul w3-padding">
            <li class="padding-8" onclick="myFunction('xaxis')">
              <h5>X-Axis</h5>
              <div id="xaxis" class="w3-container  ">
                <p>Valence, mode</p>
                <p><strong>Lowest Value:</strong> -V</p>
                <p><strong>Highest Value:</strong> +V</p>
              </div>
            </li>
            <li class="padding-8" onclick="myFunction('yaxis')">
              <h5>Y-Axis</h5>
              <div id="yaxis" class="w3-container  ">
                <p>Arousal, BPM, loudness, energy, danceability</p>
                <p><strong>Lowest Value:</strong> -A</p>
                <p><strong>Highest Value:</strong> +A</p>
              </div>
            </li>
          </ul>
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
              <a href="description.php"><span><i class="fas fa-align-justify"></i> Description</span></a>
            </li>
            <li class="w3-padding-8">
              <span onclick="myFunction('Demo1')"><i class="fas fa-phone"></i> Contact Us</span>
              <div id="Demo1" class="w3-container w3-hide ">
                <i class="fa fa-facebook-official w3-hover-opacity"></i>
                <i class="fa fa-instagram w3-hover-opacity"></i>
                <i class="fa fa-snapchat w3-hover-opacity"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                <i class="fa fa-twitter w3-hover-opacity"></i>
                <i class="fa fa-linkedin w3-hover-opacity"></i>
              </div>
            </li>
            <li class="w3-padding-8">
              <span onclick="myFunction('Demo2')"><i class="fas fa-address-card"></i> About Us</span>
              <div id="Demo2" class="w3-container w3-hide ">
                <p>Team Agile A</p>
              </div>
            </li>
            <li class="w3-padding-8">
              <a href="admin.php"><span><i class="fas fa-user-cog"></i> Admin Page</span></a>
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

<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>