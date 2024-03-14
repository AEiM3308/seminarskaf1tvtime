<?php
include_once('dependencies.php');
?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>


<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper', {
  // Optional parameters
  loop: true,

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

<div>
    <img src="https://placehold.co/600x400/png" class="h-96">
    <div class="flex gap-4">
    <ul class="max-w-lg space-y-2 mt-4 grow">
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
        <li class="flex justify-between">Race<img src="assets/cup.png" class="w-6"></li>
    </ul>
    <button>File upload</button>
    </div>

</div>
<!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
    ...
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>