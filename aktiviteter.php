<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Den glada geten</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='icon' href='images/favicon.ico' type='image/png' sizes='16x16'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
  <script src='http://www.w3schools.com/lib/w3data.js'></script>
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <link rel='stylesheet' href='header.css'>
  <link rel='stylesheet' href='main.css'>
  <link rel='stylesheet' href='menu.css'>
  <link rel='stylesheet' href='footer.css'>
  <link rel='stylesheet' href='info.css'>
</head>
<body>
    <!-- Header -->
    <div class='container-fluid upperHeader'>
    </div>

    <!-- Navbar -->
    <nav class='navbar navbar-inverse'>
        <div class='container-fluid'>
            <div class='navbar-header navbar-header-small'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='index.php'>Den glada geten</a>
            </div>
            <div class='collapse navbar-collapse gladaGetenNavbar testpadding' id='myNavbar'>
                <ul class='nav navbar-nav'>
                    <li><a id='hem' href='index.php'>Hem</a></li>
                    <li><a id='bildgalleri' href='bildgalleri.php'>Bildgalleri</a></li>
                    <li><a id='bokning' href='bokning.html'>Bokning</a></li>
                    <li class='active2'><a id='om' href='aktiviteter.html'>Aktiviteter</a></li>
                    <li><a id='info1' href='info.html'>Info</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Här ligger aktiviteter-->
    <div class='row'>
        <div class='col-sm-4 text-center'>
            <br>
            <img src='images/get.png' class='img-circle' alt='Cinque Terre'>
            <?php
            $query = "
                SELECT * FROM texts
                WHERE id = 2;
            ";

            $result = mysqli_query($db, $query);

            while($row = mysqli_fetch_assoc($result)) {
                $heading = $row['rubrik'];
                $paragraph = $row['text'];
                echo "<h4 class='rubrik'>$heading</h4><p>$paragraph<br></p>";
                }
            ?>
        </div>
        <div class='col-sm-4 text-center'>
            <br>
            <img src='images/geten.png' class='img-circle' alt='Cinque Terre'>
            <h4 class='rubrik'>Getklappning</h4>
            <p style='text-align:center;'>
                <br>
    Gå in i hagen och klappa getterna! Personal från glada geten följer med och ser
    till att du kommer nära både Gösta och Selma, och vid rätt tid på året även
    lammen. Tidsåtgång: ca 30 min
    Pris: 50 kr per person.
            </p>
        </div>

        <div class='col-sm-4 text-center'>
            <br>
            <img src='images/natur.png' class='img-circle' alt='Cinque Terre'>
            <h4 class='rubrik'>Skogspromenad</h4>
            <p style='text-align:center;'>
                <br>
    Guidad vandring runt området för den som är nyfiken på lite mer lokalkännedom.
    Tidsåtgång: ca 2 timmar
    Pris: 250 kr per person.
    Finns även kartor för kostnadsfria vandringar utan guide.
            </p>
        </div>
        <div class='col-sm-4 text-center'>
            <br>
            <img src='images/spa.png' class='img-circle' alt='Cinque Terre'>
            <h4 class='rubrik'>SPA</h4>
            <p style='text-align:center;'>
                <br>
                Boka en spaupplevelse på den glada getens egna SPA!
            </p>
    <p>
    Vi erbjuder:
    Massage 50 min – 350 kr
    Kurbad 30 min – 250 kr
    Kroppsscrubb 50 min – 350 kr
    Badtunna – 300 kr per timme,
    uppvärmning sköts av den glada geten.</p>
        </div>
        <div class='col-sm-4 text-center'>
            <br>
            <img src='images/kalendarium.png' class='img-circle' alt='Cinque Terre'>
            <h4 class='rubrik'>Kalendarium</h4>
            <p style='text-align:center;'>
                <br>
    December, Julbord – festa loss på den glada getens julbord under hela december månad!
    Juni, Midsommarfirande.
            </p>
        </div>
        <div class='col-sm-4 text-center'>
            <br>
            <img src='images/skotersafari.png' class='img-circle' alt='Cinque Terre'>
            <h4 class='rubrik'>Skotersafari</h4>
            <p style='text-align:center;'>
    <br>
    Tidsåtgång 4 timmar
    pris 500 kr per person
    du tillsammans med en ledare kan känna att du kör tryggt och säkert på en lagom
    lång tur i den underbara naturen i tjärnholmens omnejd. Under turerna stannar vi
    för korvgrillning! Någon form av körkort krävs, svenskt eller utländskt.
            </p>
        </div>
    </div>



        <!-- Footer -->
        <footer class='container-fluid text-center'>
            <ul class='nav navbar-nav'>
                <li><a href='index.php'>Hem</a></li>
                <li><a href='bildgalleri.html'>Bildgalleri</a></li>
                <li><a href='bokning.html'>Bokning</a></li>
                <li><a href='aktiviteter.html'>Aktiviteter</a></li>
                <li class='active'><a href='info.html'>Info</a></li>
                <li><a href='#'>Kontakt</a></li>
                <li><a><span class='glyphicon glyphicon-home'></span> Bergmästaregatan 7, 981 33 Kiruna</a></li>
                <li><a><span class='glyphicon glyphicon-earphone'></span>
    070 603 13 21</a></li>
                <li id='vector'><a href='http://www.freepik.com/free-photo/nature-design-with-bokeh-effect_879723.htm'>Header image designed by Freepik</a>
                </li>
                <li><a href='login.html'>Login</a></li>
            </ul>
        </footer>

<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD_STAiy9Xykx7mor4RU2VQDmjf1jrmbXk&callback=initMap'></script>
<script src='info.js'></script>
</body>
</html>
