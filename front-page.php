<?php get_header(); ?>







<header class="overflow-x-hidden bonjour">
  <div class="w-screen h-screen flex justify-center items-center bg-cover bg-right" style="background-position: ; background-image: url(<?= wp_get_attachment_image_src('18', 'large')[0] ?>);">
    <h1 class="z-30"><?= the_title(); ?></h1>
    <div id="" class=" w-52 h-52 bg-red-500 animejs"></div>
  </div> <!--  background image -->
</header>



<?php get_footer(); ?>