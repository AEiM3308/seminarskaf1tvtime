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
    <h2 class="text-4xl">User Login</h2>
    <form action="login.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="email" class="border border-green-500 p-2">Email:</label>
        <input type="email" id="email" name="email" required class="border border-green-500 p-2">
        <label for="password" class="border border-green-500 p-2">Password:</label>
        <input type="password" id="password" name="password" required class="border border-green-500 p-2">
        <input type="submit" value="login" class="border border-green-500 p-3">
    </form>
</body>