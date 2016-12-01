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
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Raleway|Raleway:700|Pinyon+Script' rel='stylesheet'>
  <link rel='stylesheet' href='header.css'>
  <link rel='stylesheet' href='main.css'>
  <link rel='stylesheet' href='menu.css'>
  <link rel='stylesheet' href='footer.css'>

  <script>
      $(function(){
          $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd', minDate: new Date() });
          $('#datepicker2').datepicker({ dateFormat: 'yy-mm-dd', minDate: new Date() }).bind('change',function(){
              var minValue = $(this).val();
              minValue = $.datepicker.parseDate('yy-mm-dd', minValue);
              minValue.setDate(minValue.getDate()+1);
              $('#datepicker2').datepicker( 'option', 'minDate', minValue );
          })
      });
  </script>
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
                    <li class='active2'><a id='hem' href='index.php'>Hem</a></li>
                    <li><a id='bildgalleri' href='bildgalleri.php'>Bildgalleri</a></li>
                    <li><a id='bokning' href='bokning.html'>Bokning</a></li>
                    <li><a id='om' href='aktiviteter.html'>Aktiviteter</a></li>
                    <li><a id='info1' href='info.html'>Info</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!--Allt under slider-->
    <div class='container-fluid'>
        <div class='row content'>
            <!--Bokningsformulär/sidenav-->
            <div class='container col-sm-2 sidenav-col'>

                <div class='col-sm-12 sidenav'>
                    <form id='bookingForm' action='bokningstart.php' method='post'>
                        <fieldset>
                            <p class='bookHead'>Sök lediga rum</p>
                            <p>Datum för incheckning</p>
                            <div class='input-group date' data-provide='datepicker' placeholder='ÅÅÅÅ-MM-DD'>
                                <input type='text' id='datepicker' class='form-control width100' name='arrDate'>
                                <!-- <div class='input-group-addon'>
                                    <span class='glyphicon glyphicon-th'></span>
                                </div> -->
                            </div>
                            <p class='para'>Antal gäster</p>
                            <select class='form-control nights' name='guests'>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                            <input class='btn-success' id='submit' name='submit' type='submit' value='Sök' />
                        </fieldset>
                    </form>
                </div>

            </div>
            <!--Content-->
            <div class='container-fluid col-sm-10 content-area'>

                <div class='row'>
                    <div class='col-sm-2'></div>
                    <div class='col-sm-8 indexinfo'>
                        <h1 class='welcome'><?php
                        $query = "
                            SELECT * FROM texts
                            WHERE id = 1;
                        ";

                        $result = mysqli_query($db, $query);

                        while($row = mysqli_fetch_assoc($result)) {
                            echo $row['rubrik'];
                            }
                        ?></h1>
                        <img class='silhouette' src='images/silhouette.png' /><p><?php
                        $query = "
                            SELECT * FROM texts
                            WHERE id = 1;
                        ";

                        $result = mysqli_query($db, $query);

                        while($row = mysqli_fetch_assoc($result)) {
                            echo $row['text'];
                            }
                        ?></p>
                        <img class='hero' src='images/bookingimage.jpg'>
                        <p>Samtliga rum på den glada geten har härliga sänglinnen i percale,
                        som utlovar en härlig och sval natts sömn. Det finns även Wifi i alla rum
                        (även om vi på glada geten förespråkar en nedkopplad tillvaro med nära naturupplevelser
                        framför internet), minibar, vattenkokare, handdukar och badlakan och vår alldeles egna
                        handgjorda tvål att använda i badkaret eller duschen! Familjerummen har även öppenspis.</p>
                        <p class='underskrift'>Kristin Wikström</p>
                    </div>
                    <div class='col-sm-2'></div>
                </div>
            </div>
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
            <li><a href='login.php'>Login</a></li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script src='calendar.js'></script>
    <script src='main.js'></script>
</body>
</html>
