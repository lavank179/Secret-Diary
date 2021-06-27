<?php

if (isset($_POST['fils'])) {

  $filter = $_POST['fils'];
  $files = scandir("../../uploads/images/");
  $files = array_slice($files, 2);
  if ($filter == 'a-z') {
    sort($files);
  } else if($filter == 'z-a'){
    rsort($files);
  } else if($filter == '1-10'){
    sort($files, SORT_NUMERIC);
  } else if($filter == '10-1'){
    rsort($files, SORT_NUMERIC);
  }

  $name = "";
  for ($i = 0; $i < count($files); $i++) {
    $image = $files[$i];
    $name = basename($image);
    $supported_file = array(
      'gif',
      'jpg',
      'jpeg',
      'png'
    );

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (in_array($ext, $supported_file)) { // show only image name if you want to show full path then use this code // echo $image."<br />";
      echo  '<div class="gallery-container">
                      <div class="gallery-item">
                        <div class="image">
                        <a href="./uploads/images/' . $image . '" data-lightbox="mygallery" data-title="' . $name . '">
                          <img src="./uploads/images/' . $image . '" alt="Randomimage" data-lightbox="mygallery"/>
                        </a>
                      </div>
                      <div class="text">' . $name . '</div></div>
                    </div>';
    } else {
      continue;
    }
  }
}
