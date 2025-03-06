CREATE DATABASE multi_image_uploader;
USE multi_image_uploader;

CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
