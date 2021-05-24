<?php

ob_start();
// Set sessions
if (!isset($_SESSION)) {
    session_set_cookie_params(0);
    session_start();
}
$link = mysqli_connect('localhost', 'root', '', 'diary');
if (mysqli_connect_error()) {
    die("Database Connection Error");
}
?>