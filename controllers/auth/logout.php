<?php
if (array_key_exists("logout", $_GET)) {
    unset($_SESSION);
    setcookie("id", "", time() - 60 * 60);
    $_COOKIE["id"] = "";

    session_destroy();
} else if ((array_key_exists("id", $_SESSION) and $_SESSION['id']) or (array_key_exists("id", $_COOKIE) and $_COOKIE['id'])) {

    header("Location: ./home.php");
}
?>