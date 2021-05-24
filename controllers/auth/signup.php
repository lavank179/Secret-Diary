<?php

global $Serror;

if (isset($_POST['signup'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $username = $_POST['username'];

    $query = "SELECT id FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $email) . "' LIMIT 1";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $Serror = "That email address is taken.";
    } else {
        $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('" . $username . "', '" . $email . "', '" . $pass . "')";
        if (!mysqli_query($link, $query)) {
            $Serror = "<p>Could not sign you up - please try again later.</p>";
        } else {
            $id = mysqli_insert_id($link);
            mysqli_query($link, $query);
            $_SESSION['id'] = $id;
            if ($_POST['stayLoggedIn'] == '1') {
                setcookie("id", $id, time() + 60 * 60 * 24 * 365);
            }
            header("Location: ./home.php");
        }
    }
}
?>