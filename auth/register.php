<?php 
include_once("../dependencies.php");

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
    }
}
?>
<body>
    <h2>User Register</h2>
    <form action="register.php" method="post" class="flex flex-col gap-3 max-w-xl mx-auto">
        <label for="username" class="border border-green-500 p-2">Username:</label>
        <input type="text" id="username" name="username" required class="border border-green-500 p-2">
        <label for="email" class="border border-green-500 p-2">Email:</label>
        <input type="email" id="email" name="email" required class="border border-green-500 p-2">
        <label for="password" class="border border-green-500 p-2">Password:</label>
        <input type="password" id="password" name="password" required class="border border-green-500 p-2">
        <label for="confirm_password" class="border border-green-500 p-2">Confirm password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required class="border border-green-500 p-2">
        <input type="submit" value="register" class="border border-green-500 p-3">
    </form>
</body>