<?php
include_once('../dependencies.php');

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

<body>
    <h2 class="text-4xl">Update season</h2>
    <form action="updateseasons.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="oldyear" class="border border-green-500 p-2">Vpisi staro leto</label>
        <input type="number" id="oldyear" name="oldyear" required class="border border-green-500 p-2">
        <label for="newyear" class="border border-green-500 p-2">Vpisi novo leto </label>
        <input type="number" id="newyear" name="newyear" required class="border border-green-500 p-2">
        <input type="submit" value="potrdi" class="border border-green-500 p-3">
    </form>
</body>