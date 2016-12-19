<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');

$arrDate = $_POST['arrDate'];
$depDate = $_POST['depDate'];

$begin = new DateTime($arrDate);
$end = new DateTime($depDate);

$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

foreach($daterange as $date){
    $dateSpan = "AND" . " '" . $date->format("Y-m-d") . "' ";
    $querySpan .= $dateSpan;
}

$query = "
        SELECT id, type FROM rooms AS r
        WHERE r.id NOT IN (
            SELECT typeID FROM bookings AS b
            WHERE
            (arrDate BETWEEN '$arrDate' AND '$depDate')
            OR (depDate BETWEEN '$arrDate' AND '$depDate')
            OR (arrDate = '$arrDate')
            OR (depDate = '$depDate')
            OR ('$arrDate' >= arrDate AND '$depDate' <= depDate)
        )
        GROUP BY type
        ORDER BY id
";

$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
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

    <!-- Change date format in Datepicker -->
    <script>
        $(function(){
            $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd', minDate: new Date()});
            $("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd', minDate: new Date() }).bind("change",function(){
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate()+1);
                $("#datepicker2").datepicker( "option", "minDate", minValue );
            })
        });
    </script>
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
            <form class="form-group" action="bokning.php" method="post">
                <fieldset class="bookingFieldset">
                    <h3>Var vänlig fyll i resten av uppgifterna</h3>
                    <label>Incheckning</label><br>
                    <input type="text" value="<?php echo $arrDate ?>" disabled>
                    <input type="text" class="displayNone" id="datepicker" name="arrDate" value="<?php echo $arrDate ?>" required><br>
                    <label>Utcheckning</label><br>
                    <input type="text" value="<?php echo $depDate ?>" disabled>
                    <input type="text" class="displayNone" id="datepicker2" name="depDate" value="<?php echo $depDate ?>" required><br>
                    <input id="roomType" class="displayNone" type="text" name="room" value="" required><br>
                    <label id="firstNameLabel">Förnamn</label><br>
                    <input type="text" id="firstName" name="firstname" value="" required><br>
                    <label id="lastNameLabel">Efternamn</label><br>
                    <input type="text" id="lastName" name="lastname" value="" required><br>
                    <label id="emailLabel">Mailadress</label><br>
                    <input type="text" id="email" name="address" value="" required><br>
                    <label id="confirmEmailLabel">Bekräfta mailadress</label><br>
                    <input type="text" id="bkremail" name="address" value="" required><br>
                    <input id="clicker" type="submit" class="submitButton" value="Fyll i alla uppgifter" disabled>
                </fieldset>
            </form>
        </div>
        <div class="col-sm-8">
            <row>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {

                echo "
                    <div class='available-rooms col-sm-4'>
                        <div class='room-content'>
                        <h3>{$row['type']}</h3>";
                switch($row['type']) {
                    case 'Enkel': echo "<img class='room-pic col-sm-12 enkel' src='images/enkel.jpg'><p>Pris: 395 kr / natt</p><p>Rumsnr: {$row['id']}</p>"; break;
                    case 'Dubbel': echo "<img class='room-pic col-sm-12 dubbel' src='images/dubbel.jpg'><p>Pris: 995 kr / natt</p><p>Rumsnr: {$row['id']}</p>"; break;
                    case 'Familje': echo "<img class='room-pic col-sm-12 familje' src='images/familje.jpg'><p>Pris: 1395 kr / natt</p><p>Rumsnr: {$row['id']}</p>"; break;
                    default: echo "lol"; break;
                }

                echo "
                        <form action='confirmation.php' method='post'>
                            <input type='text' value='{$row['id']}' style='display: none;'>
                        </form>
                        <button class='room-button btn btn-default'>Välj rum</button>
                    </div>
                </div>";

                }

                if(mysqli_num_rows($result) == 0) {
                    echo "<h1>Det finns tyvärr inga lediga rum under vald period.</h1>";
                }

                ?>
            </row>
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
            <li><a><span class="glyphicon glyphicon-home"></span> Bergmästaregatan 7, 981 33 Kiruna</a></li>
            <li><a><span class="glyphicon glyphicon-earphone"></span>
070 603 13 21</a></li>
            <li id="vector"><a href="http://www.freepik.com/free-photo/nature-design-with-bokeh-effect_879723.htm">Header image designed by Freepik</a>
            </li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </footer>

      <script src="bokning.js"></script>
      <script src="roomsearch.js"></script>
    </body>
</html>
