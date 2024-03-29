<?php

/*
    sql stavek izbere vse kar je v tabeli 'season', k so v obliki z razvrsceni po letih pa v padajocem vrstem redu
    izvrsi se stavel z uprabo PDO in se shrani v $stmt spremenljivki
        while loop je zato da ponovi vsako sezono, ki jo dobis iz databaze in jih pregleda
        nato pa pac izpise kot besedilo
*/
$sql='SELECT * FROM seasons ORDER BY year DESC';
$stmt=$pdo->query($sql);
?>

<?php include 'header.php'; ?>

<div class="text-center my-24">

    <h4 class="text-4xl">SEASONS</h4>

</div>

<div class="grid grid-cols-4 gap-4">

    <?php
        while ($row=$stmt->fetch()){
            ?>
            <a class="min-h-[96px] block p-4 bg-black shadow-lg bg-black hover:bg-red-600 text-center rounded-md hover:scale-105 grid place-items-center text-xl hover:text-3xl transition-all duration-200"  href="season.php?year=<?= $row['id']?>"><?= $row["year"]?></a>
            <?php
        }
    ?>
</div>