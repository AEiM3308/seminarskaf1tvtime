<?php
include_once('../dependencies.php');

if(isset($_POST['create'])) {
    $date = $_POST['date'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $cover = $_POST['cover'];
    $winner_driver = isset($_POST['winner_driver']) ? $_POST['winner_driver'] : null;
    $winner_team = isset($_POST['winner_team']) ? $_POST['winner_team'] : null;
    $season_year = isset($_POST['season_year']) ? $_POST['season_year'] : null;

    $sql_create = "INSERT INTO races (date, name, location, cover, winner_driver, winner_team, season_id) 
                        SELECT '$date', '$name', '$location', '$cover', '$winner_driver', '$winner_team', seasons.id
                            FROM seasons WHERE year = '$season_year'";
    $stmt = $pdo->prepare($sql_create);
    $stmt->execute([$date, $name, $cover, $winner_driver, $winner_team, $season_year]); 
    echo "Dirka ustvarjena";                   
}
if(isset($_POST['read'])) {
    $sql_read = "SELECT races.*, seasons.year as season_year FROM races JOIN seasons ON races.season_id = seasons.id";
    $stmt = $pdo->query($sql_read);
            $races = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($races) > 0) {
                foreach ($races as $race) {
                    echo "Race ID: " . $race['id'] . ", Date: " . $race['date'] . ", Name: " . $race['name'] . ", Season Year: " . $race['season_year'] . "<br>";
                }
            } 
            else {
                echo "No races found";
            }
}
//do update
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

        <label for="cover">Cover: </label>
        <input type="text" id="cover" name="cover">

        <label for="winner_driver">Zmagovalni voznik: </label>
        <input type="text" id="winner_driver" name="winner_driver">
       
        <label for="winner_team">Zmagovalna ekipa: </label>
        <input type="text" id="winner_team" name="winner_team">

        <label for="season_id">Sezona ID: </label>
        <input type="number" id="season_id" name="season_id">

        <button type="submit" name="create">Ustvari dirko</button>

        <button type="submit" name="update">Posodobi dirko</button>

        <button type="submit" name="read">Preberi dirke</button>

        <button type="submit" name="delete">Izbrisi dirko</button>
    </form>
</body>