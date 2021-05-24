<?php

global $Lerror;

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE email = '" . $email . "'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    if (isset($row)) {

        if ($pass == $row['password']) {
            $_SESSION['id'] = $row['id'];

            if (isset($_POST['stayLoggedIn']) and $_POST['stayLoggedIn'] == '1') {
                setcookie("id", $row['id'], time() + 60 * 60 * 24 * 365);
            }
            header("Location: ./home.php");
        } else {
            $Lerror = "That email/password combination could not be found.";
        }
    } else {
        $Lerror = "That email/password combination could not be found.";
    }
}
?>