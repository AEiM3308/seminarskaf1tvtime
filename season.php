<?php
include_once('dependencies.php');

if (isset($_GET['year'])) {
  $year = $_GET['year'];
  $sql = 'SELECT * FROM seasons WHERE id = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$year]);
  $season = $stmt->fetch();

  $sql = 'SELECT * FROM races WHERE season_id = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$year]);
  $races = $stmt->fetchAll();
  $race_ids = array_map(fn ($race) => $race['id'], $races);

  $sql = 'SELECT * FROM images WHERE season_id = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$year]);
  $images = $stmt->fetchAll();

  $sql = 'SELECT * FROM watched WHERE user_id = ? AND race_id IN (?)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_SESSION['user']['id'], join(',', $race_ids)]);
  $watched = $stmt->fetchAll();
  $watched_race_ids = array_map(fn ($watch) => $watch['race_id'], $watched);
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper', {
    // Optional parameters
    loop: true,
    centeredSlides: true,
    centeredSlidesBounds: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
<style>
  :root {
    --swiper-navigation-color: "#dc2626" !important;
  }
</style>

<?php include 'header.php'; ?>

<div class="mt-12">
  <div class="swiper max-h-[466px]">
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php foreach ($images as $image) :  ?>
        <div class="swiper-slide"><img class="object-cover object-bottom mx-auto" src="<?= $image['path'] ?>"></div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

  <div class="mx-auto max-w-[1000px] gap-4">

    <h1 class="text-2xl uppercase font-bold mb-2 mt-12">Races</h1>

    <ul class="space-y-2">
      <?php foreach ($races as $race) :  ?>
        <li class="even:bg-neutral-900 rounded-lg odd:bg-neutral-900/60 flex items-center justify-between p-3">
          <?= $race['name'] ?>

          <div class="flex items-center gap-2">
            <form action='./crud/watched.php' method='post' class="mb-0">
              <input type='hidden' name='race_id' value='<?= $race['id'] ?>' />
              <button class="flex gap-2">
                <?php if (in_array($race['id'], $watched_race_ids)) : ?>
                  <img src="assets/cup.png" class="invert w-6">
                <?php else : ?>
                  <span>not watched</span>
                <?php endif; ?>
              </button>
            </form>
            <form action="./crud/races.php" method="post" class="mb-0">
              <input type="hidden" name="delete" value="true">
              <input type="hidden" name="race_id" value="<?= $race['id'] ?>">
              <button>Izbriši</button>
            </form>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>

    <form action="./crud/fileupload.php" method="post" enctype="multipart/form-data" class="mt-4">
      <h2 class="uppercase font-bold mb-1.5">Add picture</h2>
      <input type="hidden" name="season_id" value="<?= $year ?>" />
      <input type="file" name="file" accept="image/*" required />
      <button>Upload picture</button>
    </form>
  </div>
</div>