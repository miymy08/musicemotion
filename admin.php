<!DOCTYPE html>
<html>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  <style>
    input, button:focus{outline: 0;}
    .bar, .footer {
        -webkit-box-shadow:0px 0px 19px 1px #000000 ;
        -moz-box-shadow:0px 0px 19px 1px #000000 ;
        box-shadow:0px 0px 19px 1px #000000 ;
      }
  </style>
  <body>
    
    <div class="w3-bar w3-theme-dark bar" style="padding: 0 50px;margin-bottom:40px;">
      <a href="index.php" class="w3-bar-item"><img src="img/me%20wide%20v2.png" style="width:130px;"></a>
    </div>
    
    <div style="height:600px;">
      <form class="w3-card-4 w3-light-grey w3-display-middle w3-round-xxlarge" style="width: 30%;" action="signinadmin.php" method="post" enctype="multipart/form-data">
        <div style="width: 100%;padding: 10px 30px;">
          <center><h2>Admin Login</h2></center>
          <p>
            <input class="w3-input w3-border w3-round-xxlarge" type="text" placeholder="Username" id="username" name="username">
          </p>
          <p>
            <input class="w3-input w3-border w3-round-xxlarge" type="password" placeholder="Password" id="password" name="password">
          </p>
        </div>
        <a href=""><p class="w3-btn w3-block w3-theme-dark w3-right" style="border-bottom-right-radius: 32px;width: 50%;margin: 0;">Cancel</p></a>
        <button class="w3-btn w3-block w3-theme-l1 w3-right" style="border-bottom-left-radius: 32px;width: 50%;" type="submit" name="submit" value="Sign-In">Submit</button>
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

<script>
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
  }

  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
  }
</script>