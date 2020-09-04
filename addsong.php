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

<html>
  <head>
    <title>MusicEmotion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/me%20mini%20v1.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        padding-top: 30px;
      }
      .button{
        position: relative;
      }
      .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        border-radius: 5px;   
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
      }

      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%; 
        background: blue;
        cursor: pointer;
      }

      .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: blue;
        cursor: pointer;
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
      <center><h1 class="w3-large" style="font-family:FirstFont;">Add Song</h1></center>
      <form name ="songInfo" onsubmit="return confirm('Do you really want to upload this song?');" method="post" enctype="multipart/form-data" action="uploads.php">
        <div class="w3-row">
          <div class="w3-half">
            <div class="w3-padding">
              <h3 style="margin:0;">*Music Title:</h3>
              <input class="w3-input w3-border" name="title" type="text" style="margin:0;" required><br>
              <h3 style="margin:0;">*Singer:</h3>
              <div class="container1">
                <input class="w3-input w3-border" type="text" name="singer[]" required list="existencesinger">
                <datalist id="existencesinger">
                  <?php
                    $query = mysqli_query($con,"SELECT * FROM singer");
                    while ($singer_row = mysqli_fetch_array($query)){
                  ?>
                  <option value="<?php echo $singer_row['s_name'] ?>">
                  <?php
                    }
                  ?>
                </datalist>
                <button class="add_form_field">+</button>
              </div><br>
              <h3 style="margin:0;">*Duration:</h3>
              <input class="w3-input w3-border" name="duration" type="text" style="margin:0;" required><br>
              <h3 style="margin:0;">*Year:</h3>
              <input class="w3-input w3-border" name="year" type="text" style="margin:0;" required><br>
              <h3 style="margin:0;">*Youtube Link:</h3>
              <input class="w3-input w3-border" name="audiofile" type="text" style="margin:0;" required><br>
              <h3 style="margin:0;">*Genre:</h3>
              <input class="w3-input w3-border" name="g_id" type="text" style="margin:0;" required><br>
              <h3 style="margin:0;">Album Picture:</h3>
              <input class="w3-input w3-border" name="img" type="file" style="margin:0;"><br>
            </div>
          </div>
          <div class="w3-half">
            <h3 style="">Lyric:</h3>
            <div class="w3-padding">
              <textarea name="lyric" style="width:90%;height:80%;"></textarea>
            </div>
          </div>
        </div>

        <div class="w3-row">
          <div class="w3-third">
            <h1>Lyric Features(LFE)</h1>
            <div class="w3-padding">
              <h3 style="margin:0;">Arousal:</h3>
<!--              <input class="w3-input w3-border" name="arousal" type="text" style="margin:0;" required><br>-->
              <input type="range" name="arousal" min="0" max="100" value="0" class="slider" id="r_arousal" style="width:100%;">
              <p>Value: <span id="d_arousal"></span></p><br>
              <h3 style="margin:0;">Valence:</h3>
<!--              <input class="w3-input w3-border" name="valence" type="text" style="margin:0;" required><br>-->
              <input type="range" name="valence" min="0" max="100" value="0" class="slider" id="r_valence" style="width:100%;">
              <p>Value: <span id="d_valence"></span></p><br>
              <h3 style="margin:0;">Emotion:</h3>
              <select class="w3-select w3-border" name="lfe_e">
                <option value="" disabled selected>Choose the emotion</option>
                <?php
                  $query = mysqli_query($con,"SELECT * FROM emotion");
                  while ($emotion_row = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $emotion_row['e_id'] ?>"><?php echo $emotion_row['e_name'] ?></option>
                <?php
                  }
                ?>
              </select><br>
            </div>
          </div>
          <div class="w3-third">
            <h1>Audio Features(AFE)</h1>
            <div class="w3-padding">
              <h3 style="margin:0;">Beat Per Minute(BPM):</h3>
<!--              <input class="w3-input w3-border" name="bpm" type="text" style="margin:0;" required><br>-->
              <input type="range" name="bpm" min="0" max="150" value="0" class="slider" id="r_bpm" style="width:100%;">
              <p>Value: <span id="d_bpm"></span></p><br>
              <h3 style="margin:0;">Energy:</h3>
<!--              <input class="w3-input w3-border" name="energy" type="text" style="margin:0;" required><br>-->
              <input type="range" name="energy" min="0" max="100" value="0" class="slider" id="r_energy" style="width:100%;">
              <p>Value: <span id="d_energy"></span></p><br>
              <h3 style="margin:0;">Mode:</h3>
<!--              <input class="w3-input w3-border" name="mode" type="text" style="margin:0;" required><br>-->
              <select class="w3-select w3-border" name="mode">
                <option value="" disabled selected>Choose the mode</option>
                <option value="1A">1A A-Flat Minor</option>
                <option value="2A">2A E-Flat Minor</option>
                <option value="3A">3A B-Flat Minor</option>
                <option value="4A">4A F Minor</option>
                <option value="5A">5A C Minor</option>
                <option value="6A">6A G Minor</option>
                <option value="7A">7A D Minor</option>
                <option value="8A">8A A Minor</option>
                <option value="9A">9A E Minor</option>
                <option value="10A">10A B Minor</option>
                <option value="11A">11A F-Sharp Minor</option>
                <option value="12A">12A D-Flat Minor</option>
                <option value="1B">1B B Major</option>
                <option value="2B">2B F-Sharp Major</option>
                <option value="3B">3B D-Flat Major</option>
                <option value="4B">4B A-Flat Major</option>
                <option value="5B">5B E-Flat Major</option>
                <option value="6B">6B B-Flat Major</option>
                <option value="7B">7B F Major</option>
                <option value="8B">8B C Major</option>
                <option value="9B">9B G Major</option>
                <option value="10B">10B D Major</option>
                <option value="11B">11B A Major</option>
                <option value="12B">12B E Major</option>
              </select><br><br>
              <h3 style="margin:0;">Loudness:</h3>
<!--              <input class="w3-input w3-border" name="loudness" type="text" style="margin:0;" required><br>-->
              <input type="range" name="loudness" min="-60" max="0" value="0" class="slider" id="r_loudness" style="width:100%;">
              <p>Value: <span id="d_loudness"></span></p><br>
              <h3 style="margin:0;">Danceability:</h3>
<!--              <input class="w3-input w3-border" name="danceability" type="text" style="margin:0;" required><br>-->
              <input type="range" name="danceability" min="0" max="100" value="0" class="slider" id="r_danceability" style="width:100%;">
              <p>Value: <span id="d_danceability"></span></p><br>
              <h3 style="margin:0;">*Emotion:</h3>
              <select class="w3-select w3-border" name="afe_e" required>
                <option value="" disabled selected>Choose the emotion</option>
                <?php
                  $query = mysqli_query($con,"SELECT * FROM emotion");
                  while ($emotion_row = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $emotion_row['e_id'] ?>"><?php echo $emotion_row['e_name'] ?></option>
                <?php
                  }
                ?>
              </select><br>
            </div>
          </div>
          <div class="w3-third">
            <h1>Comb. Features(CFE)</h1>
            <div class="w3-padding">
              <h3 style="margin:0;">X-axis:</h3>
              <input class="w3-input w3-border" name="x_axis" type="text" style="margin:0;"><br>
              <h3 style="margin:0;">Y-axis:</h3>
              <input class="w3-input w3-border" name="y_axis" type="text" style="margin:0;"><br>
              <h3 style="margin:0;">Emotion:</h3>
              <select class="w3-select w3-border" name="cfe_e" required>
                <option value="" disabled selected>Choose the emotion</option>
                <?php
                  $query = mysqli_query($con,"SELECT * FROM emotion");
                  while ($emotion_row = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $emotion_row['e_id'] ?>"><?php echo $emotion_row['e_name'] ?></option>
                <?php
                  }
                ?>
              </select><br>
            </div>
          </div>
        </div>
        <h2>* Required</h2>
        <input type="submit" name="submit" value="Add" class="w3-button w3-theme-dark w3-round-large">
      </form>
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

<!--add singer-->
<script>
  $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><input class="w3-input w3-border" type="text" name="singer[]"/><button class="delete">-</button></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

<!--arousal slider-->
<script>
document.getElementById("d_arousal").innerHTML = document.getElementById("r_arousal").value;
document.getElementById("r_arousal").oninput = function() {
  document.getElementById("d_arousal").innerHTML = this.value;
}
</script>

<!--valence slider-->
<script>
document.getElementById("d_valence").innerHTML = document.getElementById("r_valence").value;
document.getElementById("r_valence").oninput = function() {
  document.getElementById("d_valence").innerHTML = this.value;
}
</script>

<!--bpm slider-->
<script>
document.getElementById("d_bpm").innerHTML = document.getElementById("r_bpm").value;
document.getElementById("r_bpm").oninput = function() {
  document.getElementById("d_bpm").innerHTML = this.value;
}
</script>

<!--energy slider-->
<script>
document.getElementById("d_energy").innerHTML = document.getElementById("r_energy").value;
document.getElementById("r_energy").oninput = function() {
  document.getElementById("d_energy").innerHTML = this.value;
}
</script>

<!--loudness slider-->
<script>
document.getElementById("d_loudness").innerHTML = document.getElementById("r_loudness").value;
document.getElementById("r_loudness").oninput = function() {
  document.getElementById("d_loudness").innerHTML = this.value;
}
</script>

<!--danceability slider-->
<script>
document.getElementById("d_danceability").innerHTML = document.getElementById("r_danceability").value;
document.getElementById("r_danceability").oninput = function() {
  document.getElementById("d_danceability").innerHTML = this.value;
}
</script>