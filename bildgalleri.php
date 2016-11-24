<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Bildgalleri</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://www.w3schools.com/lib/w3data.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="bildgalleri.css">
        <link rel="stylesheet" href="menu.css">
    </head>
    <body>
    <!-- Header -->
    <div class="container-fluid upperHeader">
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid testpadding">
            <div class="navbar-header navbar-header-small">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Den glada geten</a>
            </div>
            <div class="collapse navbar-collapse gladaGetenNavbar testpadding" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a id="hem" href="index.html">Hem</a></li>
                    <li class="active2"><a id="bildgalleri" href="bildgalleri.php">Bildgalleri</a></li>
                    <li><a id="bokning" href="bokning.html">Bokning</a></li>
                    <li><a id="om" href="#">Om oss</a></li>
                    <li><a id="info1" href="info.html">Info</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bildgalleri -->
    <div id="gallery" class="container-fluid">
        <div class="big">

            <div class="img-container">
                <div class="button switchImg leftbtn" ><div class="content">☜</div></div>
                <img class="bigimg">
                <div class="button switchImg rightbtn"><div class="content">☞</div></div>
            </div>

        </div>
        <div class="container container-css" id="bf">
            <div class="row">
                <?php
                $query = "SELECT * FROM pics";

                $result = mysqli_query($db, $query);
                // $query2 = "DELETE $row['source'] FROM pics"

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='pic-container'>
                    <img class='pic' src='{$row['source']}'>
                   
                </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="container-fluid text-center">
        <ul class="nav navbar-nav">
            <li><a href="index.html">Hem</a></li>
            <li><a href="bildgalleri.html">Bildgalleri</a></li>
            <li><a href="bokning.html">Bokning</a></li>
            <li><a href="#">Om</a></li>
            <li class="active"><a href="info.html">Info</a></li>
            <li><a href="#">Kontakt</a></li>
            <li><a><span class="glyphicon glyphicon-home"></span> Bergmästaregatan 7, 981 33 Kiruna</a></li>
            <li><a><span class="glyphicon glyphicon-earphone"></span>
                    070 603 13 21</a></li>
            <li id="vector"><a href="http://www.freepik.com/free-photo/nature-design-with-bokeh-effect_879723.htm">Header image designed by Freepik</a>
            </li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script src="bildgalleri.js"></script>
    </body>
    </html>
<?php $db->close(); ?>