<?php
include_once('../dependencies.php');

if (!empty($_FILES) && isset($_POST["season_id"])) {
    $uploadDir = "../uploads/";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        echo "File " . $fileName . " has been uploaded.";

        $sql = "INSERT INTO images (path, season_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["/seminarska/uploads/" . $fileName, $_POST["season_id"]]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "There was an error uploading file.";
    }
}
