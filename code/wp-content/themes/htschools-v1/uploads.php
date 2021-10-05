<?php

// Set new file name
$new_image_name = "image_".time().".jpg";

// upload file
move_uploaded_file($_FILES["file"]["tmp_name"],'../../uploads/avatars/'.$new_image_name);

echo $new_image_name;

?>
