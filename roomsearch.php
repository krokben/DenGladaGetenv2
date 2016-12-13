<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');

$arrDate = $_POST['arrDate'];
$depDate = $_POST['depDate'];
$rooms = $_POST['rooms'];
$guests = $_POST['guests'];

$begin = new DateTime($arrDate);
$end = new DateTime($depDate);

$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

foreach($daterange as $date){
    $dateSpan = "AND" . " '" . $date->format("Y-m-d") . "' ";
    $querySpan .= $dateSpan;
}

$query = "
        SELECT DISTINCT type FROM rooms AS r
        WHERE r.id NOT IN (
        SELECT typeID FROM bookings AS b
        WHERE (
        (arrDate BETWEEN '$arrDate' AND '$depDate')
        OR (depDate BETWEEN '$arrDate' AND '$depDate')
        OR (arrDate = '$arrDate')
        OR (depDate = '$depDate')
        OR ('$arrDate' >= arrDate AND '$depDate' <= depDate)
        ))
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
                    <li class="active2"><a id="bokning" href="bokning.html">Bokning</a></li>
                    <li><a id="om" href="aktiviteter.php">Aktiviteter</a></li>
                    <li><a id="info1" href="info.php">Info</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Bokning -->
    <row>
        <div class="col-sm-4 bookingMain">
            <form class="form-group" action="confirmation.php" method="post">
                <fieldset class="bookingFieldset">
                    <h3>Boka rum hos oss!</h3>
                    <label for="datepicker">Incheckning</label><br>
                    <input type="text" id="datepicker" name="arrDate" value="<?php echo $arrDate ?>" placeholder="ÅÅÅÅ-MM-DD" pattern="\d{4}-\d{1,2}-\d{1,2}" title="ÅÅÅÅ-MM-DD" required><br>
                    <label for="datepicker2">Utcheckning</label><br>
                    <input type="text" id="datepicker2" name="depDate" placeholder="ÅÅÅÅ-MM-DD" pattern="\d{4}-\d{1,2}-\d{1,2}" title="ÅÅÅÅ-MM-DD" required><br>
                    <label for="guests">Antal gäster</label>
                    <input id="guests" type="number" min="1" max="8" name="guests" value="<?php echo $guests ?>" required><br>
                    <label for="rooms">Antal rum</label>
                    <input id="rooms" type="number" min="1" max="8" name="rooms" value="<?php echo $guests ?>" required><br>
                    <input class="submitButton" type="submit" value="Sök lediga rum">
                </fieldset>
            </form>
        </div>
        <div class="col-sm-8 bookingSecondary">


            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <div class='avalible-rooms col-sm-4'>
                    <h3>{$row['type']}</h3>

                    <p>Incheckning:
                        <span class='fl-right'>{$row['arrDate']}</span></p>
                    <p>Utcheckning:
                        <span class='fl-right'>{$row['depDate']}</span></p>
                    <form action='confirmation.php' method='post'>
                        <input type='text' value='{$row['type']}' style='display: none;'>
                        <input type='submit' value='Boka'>
                    </form>
                </div>";

            }
            ?>

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
    </body>
</html>