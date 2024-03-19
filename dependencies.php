<?php
include_once("db.php");
/*
    starta PHP sejo
    tm k je tailwind je @layer base je oblikovanje za gumbe pa pac kako oblikovanje je, isto za input pa za body
*/
session_start();
?>
<script src="https://cdn.tailwindcss.com"></script>
<style type="text/tailwindcss">
  @layer base {
    button, a.button, input[type="submit"] {
      @apply cursor-pointer border-none px-4 py-2 rounded-full text-white !bg-red-600 hover:bg-red-700 text-white font-semibold
    }

    input {
      @apply px-4 p-2 rounded-full border bg-transparent border-neutral-400 hover:border-red-600 focus:border-red-600  
    }

    body {
      @apply bg-[#212121] text-white p-4;
    }


  }

  </style>