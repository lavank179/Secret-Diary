<?php

session_start();
//$diaryContent="";

if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {

  $_SESSION['id'] = $_COOKIE['id'];

  //echo $_SESSION['id'];

}

if (array_key_exists("id", $_SESSION)) {
  include("./controllers/connection.php");
  $query = "SELECT diary FROM `users` WHERE id = " . mysqli_real_escape_string($link, $_SESSION['id']) . " LIMIT 1";
  $row = mysqli_fetch_array(mysqli_query($link, $query));
  $diaryContent = $row['diary'];
} else {
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./headers/header.php'); ?>

  <link rel="stylesheet" href="./css/home.css">
  <link rel="stylesheet" href="./css/lightbox.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #e6e6ff;">
    <a class="navbar-brand" href="#">Secret Diary</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fal fa-align-right" aria-hidden="true"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div>
            <?php include('./controllers/uploads/file-upload.php'); ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#uploadimgs"> Upload <i class="fa fa-plus-square fa-1x" aria-hidden="true"></i></button>
          </div>
        </li>
        <li class="nav-item">
          <a href='index.php?logout=1'>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </a>
        </li>
        <ul>
    </div>
  </nav>





  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <div class="" id="containerLoggedInPage">
        <textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
      </div>
      <br><br><br>

      <div class="card" style="background: black;">
        <div class="card-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link btn btn-light" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="true"> Photos </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link btn btn-light" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false"> Videos </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link btn btn-light" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab" aria-controls="documents" aria-selected="false"> Documents </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link btn btn-light" id="others-tab" data-bs-toggle="tab" data-bs-target="#others" type="button" role="tab" aria-controls="others" aria-selected="false"> Others </a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="photos" role="tabpanel" aria-labelledby="photos-tab">
              <br><br>
              <div>
                <ul class="list-inline">
                  <li class="list-inline-item btn btn-light">
                    <h5 id="btnAZ">A - Z</h5>
                  </li>
                  <li class="list-inline-item btn btn-light ml-auto">
                    <h5 id="btn1-10">1 - 10</h5>
                  </li>
                </ul>
              </div>
              <div class="container1">
                <?php //include("./controllers/files/imgs.php"); 
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
              <br><br>
              <div>
                <ul class="list-inline">
                  <li class="list-inline-item btn btn-light">
                    <h5 id="btnAZ">A - Z</h5>
                  </li>
                  <li class="list-inline-item btn btn-light ml-auto">
                    <h5 id="btn1-10">1 - 10</h5>
                  </li>
                </ul>
              </div>
              <div class="container1">
                <?php include("./controllers/files/vids.php"); ?>
              </div>
            </div>
            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
              <br><br>
              <div>
                <ul class="list-inline">
                  <li class="list-inline-item btn btn-light">
                    <h5 id="btnAZ">A - Z</h5>
                  </li>
                  <li class="list-inline-item btn btn-light ml-auto">
                    <h5 id="btn1-10">1 - 10</h5>
                  </li>
                </ul>
              </div>
              <div class="container1">
                <?php include("./controllers/files/docs.php"); ?>
              </div>
            </div>
            <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab"><br><br>...</div>
          </div>
        </div>
      </div>


    </div>
    <div class="col-sm-2"></div>
  </div>



  <div id="sim"></div>
  <?php include("./headers/footer.php"); ?>

  <?php include('./headers/scripts.php'); ?>
  <script type="text/javascript" src="./js/home.js"></script>

</body>

</html>
<?php ?>