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
        <link rel='stylesheet' href='admin/admin.css'>";

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    $sql = "INSERT INTO pics (source)
                    VALUES ('$target_file')";

                    if ($db->query($sql) === TRUE) {
                        // echo "Jippie!";
                    } else {
                        echo "Tyvärr, där blev det något fel. Vänligen försök igen.";
                        echo "Error: " . $sql . "<br>" . $db->error;
                    }
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

    echo "</head>
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
                <h2>Bilder</h2>
                <label for='addpic'><p>Lägg till bild</p></label>
                <form action='' method='post' enctype='multipart/form-data'>
                    <input type='file' name='fileToUpload' id='fileToUpload' required>
                    <input type='submit' value='Upload Image' name='submit'>
                </form>
                <div class='container container-css' id='bf'>
                    <div class='row'>";

                            $query = "SELECT * FROM pics";

                            $result = mysqli_query($db, $query);

                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='pic-container'>
                                        <img class='pic' src='{$row['source']}'>
                                        <div class='pic-btns'>
                                            <form action='' method='post'>
                                                <input type='text' name='id' class='btn-delete' value='{$row['id']}' style='display:none'>
                                                <input type='submit' value='Radera'>
                                            </form>
                                        </div>
                                    </div>";

                                    $deleteId = $_POST['id'];
                                    $sql2 = "DELETE FROM pics WHERE id = $deleteId";

                                    if ($db->query($sql2) === TRUE) {
                                        header("Refresh:0");
                                        // echo "Record deleted successfully";
                                    } else {
                                        // echo "Error deleting record: " . $db->error;
                                    }
                            }
    echo "</div>
    </div>

    </div>

    </div>
    <script src='admin/galleri.js'></script>
    </body>
    </html>";
}
else {
    header("location: ../login.html");
}

$db->close();
