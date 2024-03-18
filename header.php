<header class="flex justify-between items-center px-4 py-2 border-b border-neutral-600 pb-4">
  <div class="flex gap-3">
  <a href="/seminarska/index.php">Home</a>
    <a href="/seminarska/crud/seasons.php">Seasons</a>
    <a href="/seminarska/crud/races.php">Races</a>
  </div>

  <div class="flex gap-3 items-center">
    <span class="font-semibold"><?= $_SESSION['user']['username'] ?></span>
    |
    <a href="/seminarska/auth/logout.php">Log out</a>
  </div>
</header>