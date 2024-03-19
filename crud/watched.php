<?php
include_once('../dependencies.php');

if (isset($_POST['race_id']) && isset($_SESSION['user'])) {
    $race_id = $_POST['race_id'];
    $user_id = $_SESSION['user']['id'];

    $sql = "SELECT * FROM watched WHERE user_id = ? AND race_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $race_id]);
    $watched = $stmt->fetch();

    if (!$watched) {
        echo 'Add to watched';  
        $sql = "INSERT INTO watched (user_id, race_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $race_id]);
    } else {
        echo 'Remove from watched';
        $sql = "DELETE FROM watched WHERE user_id = ? AND race_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $race_id]);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']); // 1
} else {
    echo 'error';
}
?>