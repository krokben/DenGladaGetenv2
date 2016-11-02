<?php

if($_POST['username'] == "glada" && $_POST['password'] == "geten") {
    echo "success";
    $cookie_name = "glada";
    $cookie_value = "geten";
    setcookie($cookie_name, $cookie_value);
}
else {
    echo "fail";
}
