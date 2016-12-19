<?php
$db = mysqli_connect('geten-219508.mysql.binero.se', '219508_rb16043','gladageten' , '219508-geten');

if (isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Den glada geten - Admin</title>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel='stylesheet' href='admin/admin.css'>
    </head>
    <body>

    <div class='flex-container'>
        <header>
            <h1 class='admin'>Den glada geten - Admin</h1>
        </header>

        <nav class='nav'>
            <ul>
                <li><a href='?p=bokning'><div class='nav-btn'>Bokningar</div></a></li>
                <li><a href='?p=galleri'><div class='nav-btn'>Bildgalleri</div></a></li>
                <li><a href='?p=texter'><div class='nav-btn'>Texter</div></a></li>
                <li><a href='?p=logout'><div class='nav-btn'>Logga ut</div></a></li>
            </ul>
        </nav>
        <div class='content'>
            <h2>Bokningar</h2>
            <div class='booking-container'>";

        $query = "SELECT * FROM bookings
                    WHERE depDate >= NOW()
                    ORDER BY arrDate ASC
        ";

        $result = mysqli_query($db, $query);
        // $query2 = "DELETE $row['source'] FROM pics"

            while($row = mysqli_fetch_assoc($result)) {
            echo "
                    <div class='book-item'>
                        <h3>{$row['firstname']} {$row['lastname']}</h3>
                        <p>Incheckning:
                            <span class='fl-right'>{$row['arrDate']}</span></p>
                        <p>Utcheckning:
                            <span class='fl-right'>{$row['depDate']}</span></p>
                        <p class='click'>Klicka för mer info...</p>
                        <div class='info hidden'>
                            <div class='info-div'>
                                <p>Rumsnummer:</p>
                                <p><span class=''>{$row['typeID']}</span></p>
                            </div>
                            <div class='info-div'>
                                <p>Typ av rum:</p>
                                <p><span class=''>{$row['room']}</span></p>
                            </div>
                            <div class='info-div'>
                                <p>E-mail:</p>
                                <p><span class=''>{$row['address']}</span></p>
                            </div>
                        </div>
                    </div>
                ";
            }
        echo "
            </div>
        </div>



    </div>



    <script src='admin/bokning.js'></script>
    </body>
    </html>
";
}
else {
    header("location: ../login.html");
}

$db->close();
