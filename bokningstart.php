﻿<!DOCTYPE html>
<html>
<head>
    <title>Den glada geten</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="bokning.css">

    <?php
        $arrDate = $_POST['arrDate'];
        $guests = $_POST['guests'];
    ?>

</head>
<body>
    <!-- Header -->
    <header class="container-fluid upperHeader">
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header navbar-header-small">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Den glada geten</a>
            </div>
            <div class="collapse navbar-collapse gladaGetenNavbar testpadding" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a id="hem" href="index.php">Hem</a></li>
                    <li><a id="bildgalleri" href="bildgalleri.php">Bildgalleri</a></li>
                    <li class="active2"><a id="bokning" href="bokningstart.php">Bokning</a></li>
                    <li><a id="om" href="aktiviteter.php">Aktiviteter</a></li>
                    <li><a id="info1" href="info.php">Info</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Bokning -->
    <row>
        <div class="col-sm-4 bookingMain">
            <form class="form-group" action="roomsearch.php" method="post">
                <fieldset class="bookingFieldset">
                    <h3>Boka rum hos oss!</h3>
                    <label for="datepicker">Incheckning</label><br>
                    <input type="text" id="datepicker" name="arrDate" readonly value="<?php echo $arrDate ?>" placeholder="ÅÅÅÅ-MM-DD" pattern="\d{4}-\d{1,2}-\d{1,2}" title="ÅÅÅÅ-MM-DD" required><br>
                    <label for="datepicker2">Utcheckning</label><br>
                    <input type="text" id="datepicker2" name="depDate" readonly placeholder="ÅÅÅÅ-MM-DD" pattern="\d{4}-\d{1,2}-\d{1,2}" title="ÅÅÅÅ-MM-DD" required><br>
                    <input class="submitButton marginMaster" type="submit" value="Sök lediga rum">
                </fieldset>
            </form>
        </div>
        <div class="col-sm-8 bookingSecondary">
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
            <div class="col-sm-3 hidden-xs"><div></div></div>
        </div>
    </row>

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

      <script src="bokning.js"></script>
    </body>
</html>
