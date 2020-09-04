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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
        position: relative;
        width: 80%;
        margin: auto;
        padding-top: 10px;
      }
      .songcover{
        position: relative;
        width:100%;
        height:380px;
        overflow:hidden;
      }
      .songcover .overlay{
        position: absolute;
        height: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background:linear-gradient(0deg, rgb(255, 255, 255) 0%, rgba(0, 0, 0, 0.6) 100%);
      }
      .content .songpic{
        position: absolute;
        height: 300px;
        top: 60px;
        left: 50px;
        right: 50px;
        overflow: hidden;
      }
      .content #ytplayer{
        width: 100%;
        height: auto;
      }
      .fheader, .fcontent{text-align: center;}
      .content .songdetail .fheader{
        background:-webkit-linear-gradient(90deg, rgb(3, 130, 255) 0%, rgb(0, 153, 255) 80%);
        background:-o-linear-gradient(90deg, rgb(3, 130, 255) 0%, rgb(0, 153, 255) 80%);
        background:-moz-linear-gradient(90deg, rgb(3, 130, 255) 0%, rgb(0, 153, 255) 80%);
        background:linear-gradient(90deg, rgb(3, 130, 255) 0%, rgb(0, 153, 255) 80%);
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
    <div class="w3-bar w3-theme-d4 bar" style="padding: 0 50px;margin-bottom:10px;">
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
    
    <?php
    if(isset($_GET['m_code'])){
      $music_code=$_GET['m_code'];
      $q_music = mysqli_query($con,"SELECT * FROM mp WHERE m_code = '$music_code'");
      $q_singer = mysqli_query($con,"SELECT * FROM singer WHERE m_code = '$music_code'");
      $q_afe = mysqli_query($con,"SELECT * FROM afe WHERE m_code = '$music_code'");
      $q_cfe = mysqli_query($con,"SELECT * FROM cfe WHERE m_code = '$music_code'");
      $q_lfe = mysqli_query($con,"SELECT * FROM lfe WHERE m_code = '$music_code'");
      $singer_array = array();
      while ($row_singer = mysqli_fetch_array($q_singer)){
        array_push($singer_array, $row_singer['s_name']);
      }
      $singer_string = implode(", ",$singer_array);
      $row_music = mysqli_fetch_array($q_music);
      $row_afe = mysqli_fetch_array($q_afe);
      $row_cfe = mysqli_fetch_array($q_cfe);
      $row_lfe = mysqli_fetch_array($q_lfe);
    ?>
    
    <div class="content">
      <div class="songcover">
        <div class="overlay"></div>
        <img src="img/albumcover/<?php echo $row_music['m_img']; ?>" style="width:100%;">
      </div>
      <div class="songpic w3-row">
        <img class="w3-card w3-quarter" src="img/albumcover/<?php echo $row_music['m_img']; ?>" style="height:auto;">
        <div class="w3-rest" style="padding:150px 0 0 40px;">
          <span class="w3-xxxlarge" style="font-family:FirstFont;"><?php echo $row_music['m_title']; ?></span><br>
          <span class="w3-xxlarge"><?php echo $singer_string; ?></span>
        </div>
      </div>
      <div class="w3-row-padding songdetail">
        <div class="w3-third">
          <div>
            <h2 style="font-family:FirstFont;">Play the Music</h2>
            <iframe id="ytplayer" class="w3-padding" type="text/html" width="640" height="360" src="https://www.youtube.com/embed/<?php echo $row_music['m_audiofile']; ?>?autoplay=1&origin=http://example.com" frameborder="0"></iframe>
          </div>
          <hr>
          <h2 style="font-family:FirstFont;">Lyric</h2>
          <div class="w3-padding">
            <?php 
              $lyric=$row_music['m_lyric'];
              $content = preg_replace("/\r\n|\r/", "<br />", $lyric);
              $content = trim($content);
              echo $content;
            ?>
          </div>
        </div>
        <div class="w3-rest">
          <div class="w3-container" style="margin-bottom:20px;">
            <h2 style="font-family:FirstFont;">Lyrical Features (LFE)</h2>
            <div class="w3-row-padding">
              <div class="w3-half">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Arousal
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      How much excitement an average listener would perceive from the lyrics (activated or deactivated)
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_lfe['lfe_arousal']; ?></span></div>
              </div>
              <div class="w3-half">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Valence
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      A subjective feeling of pleasantness or unpleasantness (used to denote positivity or negativity of emotions)
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_lfe['lfe_valence']; ?></span></div>
              </div>
            </div>
            <div class="w3-padding">
              <div class="w3-container w3-theme-d2 fheader w3-card"><h5>Emotion</h5></div>
              <div class="w3-container w3-theme-l4 fcontent w3-card">
                <span class="w3-xxxlarge">
                  <?php
                    $q=mysqli_query($con,"SELECT * FROM emotion WHERE e_id='$row_lfe[lfe_e]'");
                    $row_e=mysqli_fetch_array($q);
                    echo $row_e['e_name']; 
                  ?>
                </span>
              </div>
            </div>
          </div>
          <hr>
          <div class="w3-container" style="margin-bottom:20px;">
            <h2 style="font-family:FirstFont;">Audio Features (AFE)</h2>
            <div class="w3-row-padding">
              <div class="w3-col" style="width:20%">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    BPM
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      Beats per minute (or tempo) is the speed of a song.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_afe['afe_bpm']; ?></span></div>
              </div>
              <div class="w3-col" style="width:20%">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Energy
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      The best indicator of the intensity of emotion and supplements.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_afe['afe_energy']; ?></span></div>
              </div>
              <div class="w3-col" style="width:20%">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Mode
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      Note and scale selection that plays role in the overall positivity or negativity of a song.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_afe['afe_mode']; ?></span></div>
              </div>
              <div class="w3-col" style="width:20%">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Loudness
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      Reflect the types of instruments used.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_afe['afe_loudness']; ?></span></div>
              </div>
              <div class="w3-col" style="width:20%">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Danceability
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      Specifically measures how well a song fits into high energy.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_afe['afe_danceability']; ?></span></div>
              </div>
            </div>
            <div class="w3-padding">
              <div class="w3-container w3-theme-d2 fheader w3-card"><h5>Emotion</h5></div>
              <div class="w3-container w3-theme-l4 fcontent w3-card">
                <span class="w3-xxxlarge">
                  <?php
                    $q=mysqli_query($con,"SELECT * FROM emotion WHERE e_id='$row_lfe[lfe_e]'");
                    $row_e=mysqli_fetch_array($q);
                    echo $row_e['e_name']; 
                  ?>
                </span>
              </div>
            </div>
          </div>
          <hr>
          <div class="w3-container" style="margin-bottom:20px;">
            <h2 style="font-family:FirstFont;">Combination Features (CFE)</h2>
            <div class="w3-row-padding">
              <div class="w3-half">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    X-Axis
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      Valence, mode.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_cfe['cfe_x_axis']; ?></span></div>
              </div>
              <div class="w3-half">
                <div class="w3-container w3-theme-d2 fheader w3-card">
                  <h5 class="w3-tooltip">
                    Y-Axis
                    <span style="position:absolute;left:0;bottom:20px" class="w3-text w3-tag w3-round-large">
                      Arousal, BPM, loudness, energy, danceability.
                    </span>
                  </h5>
                </div>
                <div class="w3-container w3-theme-l4 fcontent w3-card"><span class="w3-xxxlarge"><?php echo $row_cfe['cfe_y_axis']; ?></span></div>
              </div>
            </div>
            <div class="w3-padding">
              <div class="w3-container w3-theme-d2 fheader w3-card"><h5>Emotion</h5></div>
              <div class="w3-container w3-theme-l4 fcontent w3-card">
                <span class="w3-xxxlarge">
                  <?php
                    $q=mysqli_query($con,"SELECT * FROM emotion WHERE e_id='$row_lfe[lfe_e]'");
                    $row_e=mysqli_fetch_array($q);
                    echo $row_e['e_name']; 
                  ?>
                </span>
              </div>
            </div>
          </div>
<!--          <canvas id="myChart" class="w3-container"></canvas>-->
        </div>
      </div>
    </div>
  
    <?php
    }
    ?>
    
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
              <div id="Demo1" class="w3-container w3-hide">
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
              <div id="Demo2" class="w3-container w3-hide">
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
  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>