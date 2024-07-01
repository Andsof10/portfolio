<?php
session_start();
require "config.php";

// Check if the file was uploaded
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Sanitize the file name and create a new file name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // Directory where the file will be uploaded
    $uploadFileDir = './uploads/';
    $dest_path = $uploadFileDir . $newFileName;
    $id = $_SESSION['session_id'];
    
    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        // Update the database with the new file path
        $userId = $id; // Replace with the actual user ID
        $query = "UPDATE students SET ".$_GET['type']." = :img WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['img' => $dest_path, 'id' => $userId]);

        echo json_encode(['success' => true, 'file_path' => $dest_path]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'File upload error']);
}
?>
