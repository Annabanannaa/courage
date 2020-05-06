<?php get_header(); ?>

<main class="page-main js-page-main page-main--poster">
  <div class="container page-main__content js-container">
    <?php get_template_part('tmpl/menu'); ?>

    <?php $posts = get_posts(array(
      'numberposts' => -1,
      'post_type' => 'poster',
    ));
    ?>
    <div class="wrapper">
      <form class="search">
        <label class="search__item">
          <input class="search__field" required type="text" placeholder="Поиск мероприятий" name="name">
        </label>

        <div class="search__item search__wrapper">

          <select class="search__list js-select" name="city">
            <option class="search__element" selected disabled>Город</option>
            <option class="search__element" value="t1">Москва</option>
            <option class="search__element" value="t2">Чебоксары</option>
          </select>

          <select class="search__list js-select" name="date">
            <option class="search__element" selected disabled>Дата</option>
            <option class="search__element" value="t1">1</option>
            <option class="search__element" value="t2">2</option>
          </select>

          <select class="search__list js-select" name="event">
            <option class="search__element" selected disabled>Тип события</option>
            <option class="search__element" value="t1">1</option>
            <option class="search__element" value="t2">2</option>
          </select>
        </div>
      </form>

      <div class="poster-page">
        <div class="poster-page__wrapper">
          <h1 class="poster-page__title">Афиша</h1>
          <form class="search poster-page__search">
            <div class="search__item search__wrapper">
              <select class="search__list js-select" name="city">
                <option class="search__element" selected disabled>Город</option>
                <option class="search__element" value="t1">Москва</option>
                <option class="search__element" value="t2">Чебоксары</option>
              </select>

              <select class="search__list js-select" name="date">
                <option class="search__element" selected disabled>Дата</option>
                <option class="search__element" value="t1">1</option>
                <option class="search__element" value="t2">2</option>
              </select>

              <select class="search__list js-select" name="event">
                <option class="search__element" selected disabled>Тип события</option>
                <option class="search__element" value="t1">1</option>
                <option class="search__element" value="t2">2</option>
              </select>
            </div>
          </form>
        </div>

        <div class="poster-page__wrap">

          <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

            <div class="poster-page__item">
              <a class="" href="<?php the_permalink(); ?>">
                <?php
                  $image =  get_field('izobrazhenie_afishi');

                  echo wp_get_attachment_image( $image, '540x340', false, array(
                    'class' => 'img-fluid',
                  ));
                ?>
              </a>
              <div class="poster-page__date">
                <?php $date = get_sub_field_object('date');

                  $date = $date['value'];
                  $date = explode(" ", $date);
                ?>

                <span class="date__number"><?php echo $date['0'] ?></span>
                <span class="date__month"><?php echo $date['1'] ?></span>
              </div>
              <a class="poster-page__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>



    </div>

    <?php wp_reset_postdata(); ?>

    <div class="footer">
      <div class="footer__item">
        <a class="footer__link footer__phone" href="tel:+7 (925) 004-79-84">+7 (925) 004-79-84</a>
        <a class="footer__link" href="mailto:info@kuraj-concert.ru">info@kuraj-concert.ru</a>
      </div>
      <div class="menu__social footer__social">
        <a class="menu__icon" href="https://vk.com/"><img
            src="<?php echo get_template_directory_uri(); ?>/source/img/vk.png" alt="вконтакте"></a>
        <a class="menu__icon" href="https://www.instagram.com/"><img
            src="<?php echo get_template_directory_uri(); ?>/source/img/inst.png" alt="инстаграм"></a>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
