<?php
$connection = new mysqli("localhost", "root", "", "multi_image_uploader");

if ($_FILES['images']) {
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $filePath = "uploads/" . $fileName;
        
        if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $filePath)) {
            $connection->query("INSERT INTO images (image) VALUES ('$fileName')");
        }
    }
    echo "Images Uploaded Successfully!";
}
?>
