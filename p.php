<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["input_fgeotiff"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES["input_fgeotiff"]["tmp_name"], $target_file);


// Check if image file is a actual image or fake image
if(isset($_POST["btn_submit"])) {
    $check = getimagesize($_FILES["input_fgeotiff"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
		move_uploaded_file($_FILES["input_fgeotiff"]["tmp_name"], $target_file);
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>