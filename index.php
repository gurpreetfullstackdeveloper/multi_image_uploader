<?php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Image Uploader</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .upload-box { width: 50%; margin: auto; padding: 20px; border: 2px dashed #008CBA; cursor: pointer; }
        .upload-box:hover { background-color: #f8f8f8; }
        .preview img { width: 100px; margin: 10px; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>Multi Image Uploader</h2>

    <div class="upload-box" onclick="$('#fileInput').click()">Click or Drag & Drop Images Here</div>
    <input type="file" id="fileInput" multiple style="display: none;">
    
    <div class="preview"></div>
    
    <div id="uploadedImages"></div>

    <script>
        $(document).ready(function () {
            $("#fileInput").change(function (e) {
                let files = e.target.files;
                let formData = new FormData();
                
                $.each(files, function (i, file) {
                    $(".preview").append(`<img src="${URL.createObjectURL(file)}">`);
                    formData.append("images[]", file);
                });

                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response);
                        location.reload();
                    }
                });
            });

            loadImages();
        });

        function loadImages() {
            $.ajax({
                url: "fetch_images.php",
                type: "GET",
                success: function (data) {
                    $("#uploadedImages").html(data);
                }
            });
        }

        function deleteImage(id) {
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: { id: id },
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });
        }
    </script>

</body>
</html>
