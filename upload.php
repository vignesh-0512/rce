<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Handle file uploads
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $file['tmp_name'];
            $name = basename($file['name']);  
            $upload_dir = 'uploads/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            if (move_uploaded_file($tmp_name, $upload_dir . $name)) {
                echo "<script>alert('File uploaded successfully:')</script>";
                exit();
                // echo "<br><a href='uploads/$name'>Click here to view your file</a>"; 
            } else {
                echo "<div class='error'>Failed to move uploaded file.</div>";
            }
        } else {
            echo "<div class='error'>File upload error: " . $file['error'] . "</div>";
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with RCE Bug</title>
    <style>
        body {
            display: flex;
            justify-content: center; 
            align-items: center;
            height: 100vh; 
            margin: 0; 
            background: linear-gradient(to right, #6a11cb, #2575fc); 
        }

        .container {
            background-color: #fff;
            color: #333;
            max-width: 500px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            color: #2575fc;
            margin-bottom: 20px;
            font-size: 28px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
            color: #333;
            font-weight: bold;
        }

        /* Input styles */
        input[type="file"] {
            padding: 12px; 
            width: calc(100% - 24px);
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: #f7f7f7;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box; 
        }

        input[type="file"]:focus {
            border-color: #2575fc;
        }

        .submit-btn {
            width: 50%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #2575fc;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #6a11cb;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload a File</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="file">Select file to upload:</label>
            <input type="file" name="file" id="file" required>
            <input type="submit" value="Upload File" class="submit-btn">
        </form>
    </div>
</body>
</html>

