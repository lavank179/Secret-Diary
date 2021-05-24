<?php
include('./controllers/connection.php');
include('./controllers/auth/login.php');
include('./controllers/auth/signup.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./headers/header.php'); ?>

    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="" id="homePageContainer">

                <div class="card text-center" style="background: grey;">
                    <div class="card-header">


                        <h1> Secret Diary Of Cool Boyzz </h1>
                        <p>
                            <marquee><strong>Store your thoughts permanently and securely.This webpage is created by Lavan kumar for the the Team COOL BOYZz (Ramakrishna , Lavankumar , NagarjunaReddy , SelaKaushik , Rajesh , SivaRamiReddy . These all peoples can use this site to store their information as Your Secret Diary.....!!!</strong></marquee>
                        </p>

                        <div>
                            <img width="100px" height="100px" src="./images/index.jpg">
                        </div>

                        <br><br><br>


                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <form method="POST" id="signUpForm">
                                    <p>Interested? Sign up now.</p>
                                    <br>
                                    <?php echo '<div class="alert alert-danger" role="alert">' . $Serror . '</div>'; ?>
                                    <fieldset class="form-group">
                                        <input class="form-control" type="text" name="username" placeholder="Your Name">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Your Email">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                    </fieldset>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="stayLoggedIn" value=1> Stay logged in
                                        </label>
                                    </div>
                                    <fieldset class="form-group">
                                        <input type="hidden" name="signUp" value="1">
                                        <input class="btn btn-success" type="submit" name="signup">
                                    </fieldset>
                                    <p><a class="toggleForms">Log in</a></p>
                                </form>

                                <form method="post" id="logInForm">
                                    <p>Log in using your username and password.</p>
                                    <br>
                                    <?php echo '<div class="alert alert-danger" role="alert">' . $Lerror . '</div>'; ?>
                                    <fieldset class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Your Email">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                    </fieldset>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="stayLoggedIn" value=1> Stay logged in
                                        </label>
                                    </div>
                                    <input type="hidden" name="signUp" value="0">
                                    <fieldset class="form-group">
                                        <input class="btn btn-success" type="submit" name="login" value="Log In!">
                                    </fieldset>
                                    <p><a class="toggleForms">Sign up</a></p>
                                </form>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <?php include('./headers/scripts.php'); ?>
    <script type="text/javascript" src="./js/index.js"></script>

</body>

</html>
<?php ?>