<?php
include_once("../dependencies.php");

/*
    preveri ce sta mail pa geslo "postana" iz narejene forme
    dobi mail pa geslo is POST
    sql dobi vn uporabnika based by email
    pripravi stmt, ki ga pol executa z mailom kot parameter
    pol pa dobi informacije iz rezultata
        ce user ne obstaja pac da vn besedilo oz. echo k pac rece da ne obstaja oz. ga ne najde
        ce geslo ni enako geslu, ki je v databazi (je hashan) izda da geslo pac ni uredu
        ce se geslo in mail ujemata mailu pa geslu v bazi gas sprejme v session in ga da naprej na index.php ki ga pol redirecta na pravo stran*/
if (isset($_POST["email"]) && isset($_POST["password"])) { 
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user == false) 
    {
        echo "Email not found";
    }
    else if (!password_verify($password, $user["password_hash"])) 
    {
        echo "Password nicht gut";
    } 
    else 
    {
        unset($user["password_hash"]); //odstrani hash zarad varnostnih razlogov
       $_SESSION["user"]=$user; 
       header("location: ../index.php");
    }
}
?>

<body>
<h2 class="text-2xl max-w-xl mx-auto mb-6">Login</h2>
    <form action="login.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="email" >Email:</label>
        <input type="email" id="email" name="email" required >
        <label for="password" >Password:</label>
        <input type="password" id="password" name="password" required >
        <input type="submit" value="login" >
    </form>
</body>