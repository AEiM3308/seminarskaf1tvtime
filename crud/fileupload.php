<?php
include_once('../dependencies.php');
/*
    preveri ce datotecni (files) niz ni prazen in ce je season_is v POST
    doloci ker directory bo uporablen kjer bodo datoteke nalozene
        ga ustvari ce se ne obstaja (ob prvi uporabi)
        0777 je pac da majo usi, lastnik, ostali, in skupine dovoljenje da berejo, pisejo, izvrsijo v pac tej datoteki
        pridobitev imena datoteke, pot v kateri je shranjeno
            prestavi datoteko v pac doloceno lokacijo (kjer smo dolocili)
            vstavi vse podtake v databazo, pot in season_id
            redirecta nazaj na prejsno stran 1
                ce upload faila pac da error sporocilo
*/
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
        header('Location: ' . $_SERVER['HTTP_REFERER']); //1
    } else {
        echo "There was an error uploading file.";
    }
}
