<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= get_bloginfo('name') . ' | ' . get_the_title() ?></title>
  <?php wp_head() ?>
  <link rel="stylesheet" href="">
</head>

<body class="m-0 p-0 min-h-screen">
<?php get_template_part('template-parts/navigation/main_navigation') ?>