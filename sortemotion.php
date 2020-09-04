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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
      .songtable li{
        height:130px;
        position: relative;
      }
      .songtable .songtitle{
        font-family: FirstFont;
      }
      .songtable a:link{
        text-decoration-line: none;
      }
      .songtable a{
        text-decoration: none;
      }
      .songtable .video-btn:hover{
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
    
    <?php
    $id_emotion = $_GET['e_id'];
    $query = mysqli_query($con,"SELECT * FROM emotion WHERE e_id = '$id_emotion';");
    $e_row = mysqli_fetch_array($query);
    ?>
    
    <div class="content">
      <h3><?php echo $e_row['e_name'] ?> Songs</h3>
      <ul class="w3-ul w3-block songtable">
        <?php
        $q_afe = mysqli_query($con,"SELECT * FROM afe WHERE afe_e='$id_emotion'");
        while($row_afe = mysqli_fetch_array($q_afe)){
          $q_mp = mysqli_query($con,"SELECT * FROM mp WHERE m_code='$row_afe[m_code]'");
          $row_m = mysqli_fetch_array($q_mp);
          $q_singer = mysqli_query($con,"SELECT * FROM singer WHERE m_code = '$row_afe[m_code]'");
          $singer_array = array();
          while ($row_singer = mysqli_fetch_array($q_singer)){
            array_push($singer_array, $row_singer['s_name']);
          }
          $singer_string = implode(", ",$singer_array);
//        $q = "SELECT * FROM mp";
//        $result = mysqli_query($con,$q);
//        while($row_music = mysqli_fetch_array($result)){
//          $music_code = $row_music['m_code'];
//          $query = mysqli_query($con,"SELECT * FROM singer WHERE m_code = '$music_code'");
//          $singer_array = array();
//          while ($row_singer = mysqli_fetch_array($query)){
//            array_push($singer_array, $row_singer['s_name']);
//          }
//          $singer_string = implode(", ",$singer_array);
        ?>
        <li class="w3-padding-16">
          <a href="musicdetail.php?m_code=<?php echo $row_m['m_code'] ?>">
            <img src="img/albumcover/<?php echo $row_m['m_img']; ?>" class="w3-left w3-margin-right" style="width:100px">
            <span class="w3-xlarge songtitle"><?php echo $row_m['m_title']; ?></span><br>
            <span class="w3-large"><?php echo $singer_string; ?></span><br>
            <span><?php echo $row_m['m_year']; ?></span>
            <a class="video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/<?php echo $row_m['m_audiofile']; ?>" data-target="#myModal">
              <div class="w3-tooltip" style="position:absolute;right:0;top:0;width:130px;height:130px;background-color:red;border-bottom:1px solid white;overflow:hidden;display: flex;align-items: center;">
                <img src="img/ytlogowhite.png" style="width:90px;margin: auto;">
                <span style="position:absolute;bottom:0;width:100%;" class="w3-text w3-tag"><?php echo $row_m['m_title']; ?></span>
                <span style="position:absolute;top:0;width:100%;" class="w3-text w3-tag">Play the Music</span>
              </div>
            </a>
          </a>  
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>        
        <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
            </div>
          </div>
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

<script type="text/javascript">
$(document).ready(function() {
var $videoSrc;  
$('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);
$('#myModal').on('shown.bs.modal', function (e) {
$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
})
$('#myModal').on('hide.bs.modal', function (e) {
    $("#video").attr('src',$videoSrc); 
}) 
});
</script>