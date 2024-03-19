<?php
include_once('../dependencies.php');
/*
    preveri ce je race_id v POST in ce je session od uporabika aktiva
    pridobi race_id iz POST in user id iz podatkov seje
    sql stavek v databazi preveri ce je uporabnik ze gledal dirko s tem da izbere iz tabele 'watched' kjer se user_id pa race_id matchata
        dodajanje in odstranjevanje dirke iz watched seznama
        ce dirka se ni gledana pol echo "add to watched" doda nek nov zapis v tabelo 'watched' kjer ga vpise kot gledano
            ce je dirka ze gledana pol echo "remove from watched' deluje kot 'delete', ki iz tabele 'watched' izbrise vpis
                redirecta nazaj na prejsn page (1)  z pomocjo HTTP_REFERER (to je spremenljivka kjer ma vkljucen URL od strani, ki ga pol refera nazaj na page (i think))
                    ce dirka ne obstaj izise error
*/
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