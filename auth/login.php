<?php
include_once("../dependencies.php");

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
        unset($user["password_hash"]);
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