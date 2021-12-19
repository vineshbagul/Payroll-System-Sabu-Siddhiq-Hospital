<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
session_destroy();
session_set_cookie_params(0);

header('location:login.php');

?>