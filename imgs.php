<?php
    $files = glob("uploads/*.*");
    $name = "";
     for ($i=0; $i<count($files); $i++)
      {
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
             echo '<div class="gallery-container"><div class="gallery-item"><div class="image"><img src="'.$image .'" alt="Randomimage"/></div><div class="text">'.$name .'</div></div></div>';
            } else {
                continue;
            }
          }
          ?>