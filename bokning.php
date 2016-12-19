<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');

$arrDate = $_POST['arrDate'];
$depDate = $_POST['depDate'];
$typeID = $_POST['typeID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];

// Check what kind of room

switch ($typeID) {
    case '1':
    case '2':
        $room = 'Enkel';
        break;
    case '3':
    case '4':
    case '5':
    case '6':
        $room = 'Dubbel';
        break;
    case '7':
    case '8':
        $room = 'Familje';
        break;
    default:
        break;
}


    echo $sql = "INSERT INTO bookings (arrDate, depDate, room, firstname, lastname, address, typeID)
    VALUES ('$arrDate', '$depDate', '$room', '$firstname', '$lastname', '$address', '$typeID')";

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
                <header class='container-fluid upperHeader'>
                </header>

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
                            <li class='active2'><a id='bokning' href='bokningstart.php'>Bokning</a></li>
                            <li><a id='om' href='aktiviteter.php'>Aktiviteter</a></li>
                            <li><a id='info1' href='info.php'>Info</a></li>
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
                        <li><a href='bokningstart.php'>Bokning</a></li>
                        <li><a href='#'>Om</a></li>
                        <li class='active'><a href='info.php'>Info</a></li>
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






$db->close();
