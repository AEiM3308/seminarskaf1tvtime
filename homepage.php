<?php
$sql='SELECT * FROM seasons';
$stmt=$pdo->query($sql);
?>
<div>
    <a href="auth/logout.php">Log out</a>
</div>
<div class="grid grid-cols-4 grid-rows-2 gap-2 p-2">
    <?php
        while ($row=$stmt->fetch()){
            ?>
            <div><span><?= $row["year"]?></span></div>
            <?php
        }
    ?>
</div>