<?php 
include_once("../dependencies.php");
/*
    preveri a so vsa potreba polja dolocena v POST
    dobi vse informacije iz POST spremenljivk
        preveri ce je geslo ki je vpisano enako geslu v polju kjer se preveri identicnost
            geslo se hasha za bcrypt, za vecjo varnost
            sql stavek vpise se podatke v databazo
            pripravi stmt, ki ga pol izvede z user data kot parameter
*/
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if($password != $confirm_password)
    {
        echo "Password does not match";
    }
    else
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);  
        $sql = "INSERT INTO users (username, email, password_hash) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password_hash]);

        header("location: ../auth/login.php");
    }
}
?>
<body>
    <h2 class="text-2xl max-w-xl mx-auto mb-6">User Register</h2>
    <form action="register.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="username" >Username:</label>
        <input type="text" id="username" name="username" required >
        <label for="email" >Email:</label>
        <input type="email" id="email" name="email" required >
        <label for="password" >Password:</label>
        <input type="password" id="password" name="password" required >
        <label for="confirm_password" >Confirm password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required >
        <input type="submit" value="register">
    </form>
</body>