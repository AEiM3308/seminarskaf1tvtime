<?php
include_once('../dependencies.php');

if(isset($_POST['create'])) {
    $date = $_POST['date'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $year = explode('-', $date)[0];

    $sql = 'SELECT id FROM seasons WHERE year = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$year]);
    $year_id = $stmt->fetchAll();
    if(empty($year_id)){
        echo "ne obstaja";
    }
    else {
        $year_id = $year_id[0]['id'];
        $sql = 'INSERT INTO races (date, name, location, season_id) VALUES (?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$date, $name, $location, $year_id]);

        echo "ja je";
    }
}

if(isset($_POST['read'])) {
    $sql_read = "SELECT races.*, seasons.year as season_year FROM races JOIN seasons ON races.season_id = seasons.id";
    $stmt = $pdo->query($sql_read);
            $races = $stmt->fetchAll();
            if (count($races) > 0) {
                foreach ($races as $race) {
                    echo "Race ID: " . $race['id'] . ", Date: " . $race['date'] . ", Name: " . $race['name'] . ", Season Year: " . $race['season_year'] . "<br>";
                }
            } 
            else {
                echo "No races found";
            }
}
if (isset($_POST['delete'])) {
    $race_id = $_POST['race_id']; // Retrieve Race ID from the form
    $sql_delete = "DELETE FROM races WHERE id = ?";
    $stmt = $pdo->prepare($sql_delete);
    $stmt->execute([$race_id]);
    echo "Race deleted successfully";
}
?>
<head>
    <title>Race Management</title>
</head>
<body>
    <form action="races.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="date">Datum: </label>
        <input type="date" id="date" name="date" required>
        
        <label for="name">Ime dirke: </label>
        <input type="text" id="name" name="name" required>

        <label for="location">Lokacija: </label>
        <input type="text" id="location" name="location" required>

        <button type="submit" name="create">Ustvari dirko</button>

        
    </form>
</body>