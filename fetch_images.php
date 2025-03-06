<?php
$connection = new mysqli("localhost", "root", "", "multi_image_uploader");
$result = $connection->query("SELECT * FROM images ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div>
        <img src='uploads/{$row['image']}' width='100px'>
        <button onclick='deleteImage({$row['id']})'>Delete</button>
    </div>";
}
?>
