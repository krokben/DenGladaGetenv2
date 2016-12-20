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
  <meta name='description' content='Den glada geten - Information om oss'>
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
    <header class='container-fluid upperHeader'>
    </header>

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
                    <li><a id='bokning' href='bokningstart.php'>Bokning</a></li>
                    <li><a id='om' href='aktiviteter.php'>Aktiviteter</a></li>
                    <li class='active2'><a id='info1' href='info.php'>Info</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class='container'>
        <div class='findUs jumbotron'>Hitta hit</div>
        <!-- Karta -->
        <div id='map'></div>
        <h1 class='welcome padTop'>Bergmästaregatan 7<br>981 33 Kiruna</h1>
        <article class='row padArticle'>
            <section class='col-sm-6'>
                <?php
                $query = "
                    SELECT * FROM texts
                    WHERE id = 8;
                ";

                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $heading = $row['rubrik'];
                    $paragraph = $row['text'];
                    echo "<h4 class='rubrik'>$heading</h4><div class='act-paragraph'><p>$paragraph<br></p></div>";
                    }
                ?>
            </section>
            <section class='col-sm-6'>
                <?php
                $query = "
                    SELECT * FROM texts
                    WHERE id = 9;
                ";

                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $heading = $row['rubrik'];
                    $paragraph = $row['text'];
                    echo "<h4 class='rubrik'>$heading</h4><div class='act-paragraph'><p>$paragraph<br></p></div>";
                    }
                ?>
            </section>
        </article>
        <article class='row padArticle'>
            <section class='col-sm-6'>
                <?php
                $query = "
                    SELECT * FROM texts
                    WHERE id = 10;
                ";

                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $heading = $row['rubrik'];
                    $paragraph = $row['text'];
                    echo "<h4 class='rubrik'>$heading</h4><div class='act-paragraph'><p>$paragraph<br></p></div>";
                    }
                ?>
            </section>
            <section class='col-sm-6'>
                <?php
                $query = "
                    SELECT * FROM texts
                    WHERE id = 11;
                ";

                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $heading = $row['rubrik'];
                    $paragraph = $row['text'];
                    echo "<h4 class='rubrik'>$heading</h4><div class='act-paragraph'><p>$paragraph<br></p></div>";
                    }
                ?>
            </section>
        </article>
    </div>

        <!-- Footer -->
        <footer class='container-fluid text-center'>
            <ul class='nav navbar-nav'>
                <li><a href='index.php'>Hem</a></li>
                <li><a href='bildgalleri.php'>Bildgalleri</a></li>
                <li><a href='bokningstart.php'>Bokning</a></li>
                <li><a href='aktiviteter.php'>Aktiviteter</a></li>
                <li class='active'><a href='info.php'>Info</a></li>
                <li><a><span class='glyphicon glyphicon-home'></span> Tjärnholmen, 954 42 Norrbotten</a></li>
                <li><a><span class='glyphicon glyphicon-earphone'></span>
    070 603 13 21</a></li>
                <li><a href='mailto:glada.geten@kyh.se'><span class='glyphicon glyphicon-envelope'></span> Maila oss!</a></li>
                <li id='vector'><a href='http://www.freepik.com/free-photo/nature-design-with-bokeh-effect_879723.htm'>Header image designed by Freepik</a>
                </li>
                <li><a href='login.php'>Login</a></li>
            </ul>
        </footer>
    </div>

<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD_STAiy9Xykx7mor4RU2VQDmjf1jrmbXk&callback=initMap'></script>
<script src='info.js'></script>
</body>
</html>
