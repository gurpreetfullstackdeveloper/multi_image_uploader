<?php
$connection = new mysqli("localhost", "root", "", "multi_image_uploader");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = $connection->query("SELECT image FROM images WHERE id = $id");
    $row = $result->fetch_assoc();
    
    if ($row) {
        unlink("uploads/" . $row['image']);
        $connection->query("DELETE FROM images WHERE id = $id");
        echo "Image Deleted!";
    }
}
?>
