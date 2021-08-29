<nav>
    <div class="bg-teal-600 w-fulf flex justify-center items-center text-teal-200">
      <a class="text-2xl ml-3 text-teal-900 whitespace-nowrap font-semibold" href="/">Wordpress introduction</a>
    <?= wp_nav_menu([
      'menu_class' => 'flex h-full w-full justify-evenly items-center px-3',
      'container' => ''
    ]) ?>
    </div>
  </nav>