<?php session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    if($_POST['username'] == "glada" && $_POST['password'] == "geten") {
        $_SESSION['admin'] = TRUE;
    }
}

// if (isset($_GET['logout'])) {
//         $_SESSION['admin'] = FALSE;
//         header("location: login.html");
// }
// Inloggad admin
if (isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE) {
    // header("location: admin/bokning.php");
    if ($_GET['p'] === "bokning") {
        include('admin/bokning.php');
    } else if ($_GET['p'] === "galleri") {
        include('admin/galleri.php');
    } else if ($_GET['p'] === "texter") {
        include('admin/texter.php');
    } else if ($_GET['p'] === "logout") {
        $_SESSION['admin'] = FALSE;
        header("location: login.html");
    }
    else {
        include('admin/bokning.php');
    }
}
else {
    header("location: login.html");
}
?>
