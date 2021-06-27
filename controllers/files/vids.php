<?php

if (isset($_POST['fils'])) {

    $filter = $_POST['fils'];
    $files = scandir("../../uploads/videos/");
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
        'mp4',
        'mpeg4',
        'mkv'
    );

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    // if ($ext == 'mkv') {
    //     $disp = '<video width="320" height="240" controls src="' . $image . '"></video>';
    // } else {
        $disp = '<video width="100%" height="100%" controls data-lightbox="mygallery">
                    <source src="./uploads/videos/' . $image . '" type="video/' . $ext . '">
                </video>';
    // }

    if (in_array($ext, $supported_file)) { // show only image name if you want to show full path then use this code // echo $image."<br />";
        echo  '<div class="gallery-container">
                      <div class="gallery-item">
                        <div class="image">
                         '.$disp.'
                        </div>
                      </div>
                    </div>';
    } else {
        continue;
    }
}
}

          //<a href="'.$image.'" data-lightbox="mygallery" data-title="'.$name.'">
          //<img src="'.$image .'" alt="Randomimage" data-lightbox="mygallery"/>
          //</a>
          ?>