<?php
include_once('../dependencies.php');

/*
    preveri ce ima obrazec vpisano oboje, newyear in oldyear
    pridobi newyear in oldyear iz podatkov iz obrazca
    sql stavek izbere season_id na osnovi podaneka starega leta (oldyear)
    pridobi podatke
        preusmeri na index.php ce se podatek o starem letu en najde/ne obstaja
        sql stavek posodobi 'update' season year z newyear
        izvrsi update, ce je uspesno da doloceno sporoci, ce ni usesno izda error
*/
if(isset($_POST['newyear']) && isset($_POST['oldyear'])) {
    $newyear = $_POST['newyear'];
    $oldyear = $_POST['oldyear'];

    $sql = 'SELECT id FROM seasons WHERE year = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$oldyear]);
    $data = $stmt->fetch();

    if (!$data) {
        header("location: ../index.php");
    }

    $sql = 'UPDATE seasons SET year=? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([$newyear, $data['id']]);
    
    echo 'posodobljeno';}
    catch(PDOException $error) {
        echo "napaka: " . $error->getMessage();
    }


}

?>

<?php include '../header.php'; ?>

<body>
    <h2 class="text-2xl max-w-xl mx-auto mb-6">Update season</h2>
    <form action="updateseasons.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="oldyear">Vpisi staro leto</label>
        <input type="number" id="oldyear" name="oldyear" required>
        <label for="newyear">Vpisi novo leto </label>
        <input type="number" id="newyear" name="newyear" required>
        <input type="submit" value="potrdi" class="border border-green-500 p-3">
    </form>
</body>