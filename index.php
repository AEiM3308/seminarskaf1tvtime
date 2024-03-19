<?php
include_once('dependencies.php');

/*
    pregleda ce je seja uprabnika aktivna
    pol pa pac da homepage za prijavljenje uporabnika
    pa za ne prijavljenje/nove
*/
?>
<body>
    <?php
    if(isset($_SESSION['user']))
    {
      include_once('homepage.php');
    }
    else
    {
      include_once('logedouthomepage.php');
    }
    ?>
</body>