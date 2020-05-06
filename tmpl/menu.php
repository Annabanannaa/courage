<section class="menu">
  <div>
    <a class="page-header__logo-link" href="">
      <picture>
        <source media="(min-width: 768px)"
                srcset="<?php echo get_template_directory_uri(); ?>/source/img/logo-tablet.png">
        <img class="page-header__logo" src="<?php echo get_template_directory_uri(); ?>/source/img/logo-mobile.png"
             alt="логотип">
      </picture>
    </a>
    <nav class="main-nav">
      <button class="main-nav__toggle js-toggle" type="button">Открыть меню</button>
      <div class="main-nav__wrapper main-nav__wrapper--open">

        <?php
          wp_nav_menu( array(
            'menu'            => 'Menu-right',
            'container'       => 'ul',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'main-nav__list js-list',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 2
          ) );
        ?>
        <ul class="main-nav__list js-list">
          <ul class="main-nav__list js-list">
          <li class="main-nav__item search search--menu">
            <form>
              <label class="search__item--menu-bg">
                <input class="search__field search__field--menu" required type="text"
                       placeholder="Поиск мероприятий" name="name">
              </label>
              <div class="search__wrapper">
                <select class="search__list search__list--menu js-select" name="city">
                  <option class="search__element" selected disabled>Город</option>
                  <option class="search__element" value="t1">Москва</option>
                  <option class="search__element" value="t2">Чебоксары</option>
                </select>
                <select class="search__list search__list--menu js-select" name="date">
                  <option class="search__element" selected disabled>Дата</option>
                  <option class="search__element" value="t1">1</option>
                  <option class="search__element" value="t2">2</option>
                </select>
                <select class="search__list search__list--menu js-select" name="event">
                  <option class="search__element" selected disabled>Тип события</option>
                  <option class="search__element" value="t1">1</option>
                  <option class="search__element" value="t2">2</option>
                </select>
              </div>
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="menu__contacts">
    <a class="menu__link" href="tel:+7 (925) 004-79-84">+7 (925) 004-79-84</a>
    <a class="menu__link" href="mailto:info@kuraj-concert.ru">info@kuraj-concert.ru</a>
    <div class="menu__social">
      <a class="menu__icon" href="https://vk.com/"><img
          src="<?php echo get_template_directory_uri(); ?>/source/img/vk.png" alt="вконтакте"></a>
      <a class="menu__icon" href="https://www.instagram.com/"><img
          src="<?php echo get_template_directory_uri(); ?>/source/img/inst.png" alt="инстаграм"></a>
    </div>
  </div>
</section>