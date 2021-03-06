<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Bildgalleri</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Den glada geten - Bildgalleri">
        <link rel="icon" href="images/favicon.ico" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://www.w3schools.com/lib/w3data.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway|Raleway:700|Pinyon+Script' rel='stylesheet'>
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="bildgalleri.css">
        <link rel="stylesheet" href="menu.css">
    </head>
    <body>
    <!-- Header -->
    <header class="container-fluid upperHeader">
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
                    <li class='active2'><a id='bildgalleri' href='bildgalleri.php'>Bildgalleri</a></li>
                    <li><a id='bokning' href='bokningstart.php'>Bokning</a></li>
                    <li><a id='om' href='aktiviteter.php'>Aktiviteter</a></li>
                    <li><a id='info1' href='info.php'>Info</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bildgalleri -->
    <div id="gallery" class="container-fluid">
        <div class="big">

            <div class="button switchImg leftbtn" ><div class="content">☜</div></div>
            <div class="img-container">
                <img class="bigimg">
            </div>
            <div class="button switchImg rightbtn"><div class="content">☞</div></div>

        </div>
        <div class="container container-css" id="bf">
            <div class="row">
                <?php
                $query = "SELECT * FROM pics";

                $result = mysqli_query($db, $query);
                // $query2 = "DELETE $row['source'] FROM pics"

                while($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb'>
                            <img class='mini img-responsive' src='{$row['source']}'>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="container-fluid text-center">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Hem</a></li>
            <li><a href="bildgalleri.php">Bildgalleri</a></li>
            <li><a href="bokningstart.php">Bokning</a></li>
            <li><a href="aktiviteter.php">Aktiviteter</a></li>
            <li class="active"><a href="info.php">Info</a></li>
            <li><a><span class="glyphicon glyphicon-home"></span> Tjärnholmen, 954 42 Norrbotten</a></li>
            <li><a><span class="glyphicon glyphicon-earphone"></span>
                    070 603 13 21</a></li>
            <li><a href='mailto:glada.geten@kyh.se'><span class='glyphicon glyphicon-envelope'></span> Maila oss!</a></li>
            <li id="vector"><a href="http://www.freepik.com/free-photo/nature-design-with-bokeh-effect_879723.htm">Header image designed by Freepik</a>
            </li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script src="bildgalleri.js"></script>
    </body>
    </html>
<?php $db->close(); ?>
