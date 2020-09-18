<?php

    session_start();
    //$diaryContent="";

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];

        //echo $_SESSION['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
              
      include("connection.php");
      
      $query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
 
      $diaryContent = $row['diary'];
      
    } else {
        
        header("Location: index.php");
        
    }

	include("header.php");

?>
<nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #e6e6ff;">
  
  <a class="navbar-brand" href="#">Secret Diary</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link active" id="pic" href="#"><button class="btn btn-outline-danger" >Photos</button> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><button class="btn btn-outline-danger" >Videos</button></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <button class="btn btn-outline-danger" >Others</button>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"><button class="btn btn-outline-danger" >Documents</button></a>
              <a class="dropdown-item" href="#"><button class="btn btn-outline-danger" >Files</button></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><button class="btn btn-outline-danger" >Something else here</button></a>
            </div>
            
    <ul>
  </div>

  <div>
  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></button>
  </div>
    <div class="pull-xs-right">
      <a href ='index.php?logout=1'>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
    </div>



</nav>
<?php include('file-upload.php'); ?>








    <div class="container-fluid" id="containerLoggedInPage">
        <textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
    </div>
<br><br><br>
<div class="container-fluid">
    <div class="row">
     <?php include("imgs.php"); ?>
          </div>
          </div>





    






    
<?php
    
    include("footer.php");
?>