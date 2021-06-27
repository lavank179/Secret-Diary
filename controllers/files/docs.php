<?php

if (isset($_POST['fils'])) {

  $filter = $_POST['fils'];
  $files = scandir("../../uploads/documents/");
  $files = array_slice($files, 2);
  if ($filter == 'a-z') {
    sort($files);
  } else if ($filter == 'z-a') {
    rsort($files);
  } else if ($filter == '1-10') {
    sort($files, SORT_NUMERIC);
  } else if ($filter == '10-1') {
    rsort($files, SORT_NUMERIC);
  }
  print_r($files);
  $name = "";
  for ($i = 0; $i < count($files); $i++) {
    $image = $files[$i];
    $name = basename($image);
    $supported_file = array(
      'pdf',
      'docx',
      'txt',
      'xlsx',
      'pptx'
    );

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (in_array($ext, $supported_file)) { // show only image name if you want to show full path then use this code // echo $image."<br />";
      echo  '<div class="gallery-container">
                      <div class="gallery-item">
                        <div class="image">
                        
                        <iframe src="ViewerJS/#.././uploads/documents/' . $image . '" width="100%" height="100%"></iframe>
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
          //<embed src="'.$image.'" type="application/pdf" height="100%" width="100%" data-lightbox="mygallery">
          //<iframe src="https://docs.google.com/gview?url='.$image.'&embedded=true"></iframe>
            ?>