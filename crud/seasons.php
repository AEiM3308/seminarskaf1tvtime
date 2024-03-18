<?php
include_once('../dependencies.php');

if(isset($_POST['create'])) {
    $year = $_POST['year'];
    $stmt = $pdo->prepare("INSERT INTO seasons (year) VALUES (:year)");
    $stmt->bindParam(':year', $year);
    $stmt->execute();
    echo "Leto ustvarjeno";
}

if(isset($_POST['read'])) {
    $stmt = $pdo->prepare("SELECT * FROM seasons");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $row) {
        echo "Season ID: " . $row['id'] . ", Year: " . $row['year'] . "<br>";
    }
}
if(isset($_POST['delete'])) {
    $stmt = $pdo->prepare("TRUNCATE TABLE seasons");
    $stmt->execute();
}
?>
<head>
    <title>Season Management</title>
</head>
<body>
    <form action="seasons.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="year">Leto</label>
        <input type="number" id="year" name="year" required>

        <button type="submit" name="create">Ustvari sezono</button>

        <button type="submit" name="update">Update Season</button>

        <button type="submit" name="read">Read Seasons</button>

        <button type="submit" name="delete">Delete Seasons</button>
        

    </form>
</body>