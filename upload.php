<?php
if (isset($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
        echo "Access your file: <a href='" . $target_file . "'>" . $target_file . "</a>";
    } else {
        echo "Sorry, there was an error upload  ing your file.";
    }
} else {
    echo "No file uploaded.";
}
?>
