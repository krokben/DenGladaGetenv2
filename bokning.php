<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');

$arrDate = $_POST['arrDate'];
$depDate = $_POST['depDate'];
$room = $_POST['room'];
$guests = $_POST['guests'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];

$begin = new DateTime($arrDate);
$end = new DateTime($depDate);

$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

foreach($daterange as $date){
    $dateSpan = "AND" . " '" . $date->format("Y-m-d") . "' ";
    $querySpan .= $dateSpan;
}

$query = "
    SELECT * FROM bookings
    WHERE room = '$room'
    $querySpan BETWEEN arrDate AND depDate
";

$result = mysqli_query($db, $query);
$row_cnt = mysqli_num_rows($result);
$bookable = true;

switch ($room) {
    case 'Enkel':
        $typeID = "1";
        break;
    case 'Dubbel':
        $typeID = "3";
        break;
    case 'Familje':
        $typeID = "7";
        break;
    default:
        $typeID = "1";
}

while($row = mysqli_fetch_assoc($result)) {
    switch($row['room']) {
        case 'Enkel':
            if($row_cnt < 2) {
                if ($row['typeID'] === "1") {
                    $typeID = "2";
                } else if ($row['typeID'] === "2") {
                    $typeID = "1";
                }
            } else {
                $bookable = false;
            }
            break;

        case 'Dubbel':
            if($row_cnt < 4) {
                if ($row['typeID'] === "3") {
                    $typeID = "4";
                }
                else if ($row['typeID'] === "4") {
                    $typeID = "5";
                }
                else if ($row['typeID'] === "5") {
                    $typeID = "6";
                }
                else if ($row['typeID'] === "6") {
                    $typeID = "3";
                }
                else {
                    $typeID = "3";
                }

            } else {
                $bookable = false;
            }
            break;

        case 'Familje':
            if($row_cnt < 2) {
                if ($row['typeID'] === "7") {
                    $typeID = "8";
                } else if ($row['typeID'] === "8") {
                    $typeID = "7";
                }
                else {
                    $typeID = "7";
                }
            } else {
                $bookable = false;
            }
            break;
    }
}

if ($bookable) {
    $sql = "INSERT INTO bookings (arrDate, depDate, room, guests, firstname, lastname, address, typeID)
    VALUES ('$arrDate', '$depDate', '$room', '$guests', '$firstname', '$lastname', '$address', '$typeID')";

    if ($db->query($sql) === TRUE) {
        echo "<!DOCTYPE html>
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
            <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
            <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
            <link rel='stylesheet' href='header.css'>
            <link rel='stylesheet' href='main.css'>
            <link rel='stylesheet' href='menu.css'>
            <link rel='stylesheet' href='footer.css'>
            <link rel='stylesheet' href='bokning2.css'>
            </head>
            <body>
                <!-- Header -->
                <div class='container-fluid upperHeader'>
                </div>

                <!-- Navbar -->
                <nav class='navbar navbar-inverse'>
                    <div class='container-fluid testpadding'>
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
                            <li class='active2'><a id='bokning' href='bokning.html'>Bokning</a></li>
                            <li><a id='om' href='aktiviteter.html'>Aktiviteter</a></li>
                            <li><a id='info1' href='info.html'>Info</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <!-- Content -->
                <row>
                    <div class='col-sm-12 confirmationDiv'>
                        <h1>Tack så mycket för er bokning!</h1>
                        <h2>Ett mail har skickats till $address.</h2>
                    </div>
                </row>


                <!-- Footer -->
                <footer class='container-fluid text-center'>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Hem</a></li>
                        <li><a href='bildgalleri.php'>Bildgalleri</a></li>
                        <li><a href='bokning.html'>Bokning</a></li>
                        <li><a href='#'>Om</a></li>
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

                  <script src='bokning.js'></script>
                </body>
            </html>
        ";
    } else {
        echo "Tyvärr, där blev det något fel. Vänligen försök igen.";
        echo "Error: " . $sql . "<br>" . $db->error;
    }
} else {
    echo "<!DOCTYPE html>
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
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel='stylesheet' href='header.css'>
        <link rel='stylesheet' href='main.css'>
        <link rel='stylesheet' href='menu.css'>
        <link rel='stylesheet' href='footer.css'>
        <link rel='stylesheet' href='bokning2.css'>
        </head>
        <body>
            <!-- Header -->
            <div class='container-fluid upperHeader'>
            </div>

            <!-- Navbar -->
            <nav class='navbar navbar-inverse'>
                <div class='container-fluid testpadding'>
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
                            <li class='active2'><a id='bokning' href='bokning.html'>Bokning</a></li>
                            <li><a id='om' href='#'>Om oss</a></li>
                            <li><a id='info1' href='info.html'>Info</a></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- Content -->
            <row>
                <div class='col-sm-12 confirmationDiv'>
                    <h1>Tyvärr, där var det redan bokat.</h1>
                    <h2>Ett mail har inte skickats till $address.</h2>
                </div>
            </row>


            <!-- Footer -->
            <footer class='container-fluid text-center'>
                <ul class='nav navbar-nav'>
                    <li><a href='index.php'>Hem</a></li>
                    <li><a href='bildgalleri.php'>Bildgalleri</a></li>
                    <li><a href='bokning.html'>Bokning</a></li>
                    <li><a href='#'>Om</a></li>
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

              <script src='bokning.js'></script>
            </body>
        </html>
    ";
}


$db->close();
