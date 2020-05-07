<?php get_header(); ?>

<main class="page-main js-page-main"
      style="background-image:url(<?php the_sub_field('fon'); ?>)">
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

          <select class="search__list" name="city">
            <option class="search__element" selected disabled>Город</option>
            <option class="search__element" value="t1">Москва</option>
            <option class="search__element" value="t2">Чебоксары</option>
          </select>

          <select class="search__list" name="date">
            <option class="search__element" selected disabled>Дата</option>
            <option class="search__element" value="t1">1</option>
            <option class="search__element" value="t2">2</option>
          </select>

          <select class="search__list" name="event">
            <option class="search__element" selected disabled>Тип события</option>
            <option class="search__element" value="t1">1</option>
            <option class="search__element" value="t2">2</option>
          </select>

        </div>
      </form>

      <div class="desc-page swiper-container js-desc-page">
        <div class="desc-page-wrapper swiper-wrapper">

          <?php
            foreach ($posts as $post):
              setup_postdata($post);
              ?>

              <div class="desc-page__slider js-desc-page-item swiper-slide"
                   data-img-path="<?php the_field('image-fon'); ?>">
                <section class="page-event">
                  <div class="page-event__title"><?php the_field('title'); ?></div>

                  <div>
                    <div class="test bottom page-event__text page-event__text--opened">
                      <p>Новая программа Ирины Круг «Ты сердце и душа» не оставит равнодушным ни одного зрителя. Это
                        концерт
                        ярких, популярных, теплых, искренних и душевных песен, находящих отклик в сердцах тысячей людей.
                        Концерт превращается в разговор по душам с близким и родным человеком, который смог преодолеть
                        все
                        трудности и невзгоды и воплотить свои мечты в жизнь! </p>
                    </div>
                  </div>

                  <div class="page-event__block-btn">
                    <button class="button button--orange page-event__btn" type="button">Купить билеты онлайн</button>
                  </div>
                </section>

                <div class="detailed detailed--opened">
                  <div class="detailed__info">
                    <?php if (get_field('sobytie')): ?>
                      <?php while (has_sub_field('sobytie')): ?>
                        <?php $date = get_sub_field_object('date');

                        $date = $date['value'];
                        $date = explode(" ", $date); ?>

                        <p class="detailed__item">1 500 ₽ – 5 000 ₽</p>
                        <p class="detailed__item"><?php the_sub_field('date'); ?></p>
                        <p class="detailed__item">г. Железнодорожный. ДК Родник</p>
                      <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="detailed__share">
                      <svg width="13" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M10.334 7.668c-.905 0-1.707.454-2.189 1.146L5.197 7.339a2.656 2.656 0 000-1.678l2.948-1.475A2.665 2.665 0 1010.334 0a2.669 2.669 0 00-2.53 3.505L4.853 4.98A2.665 2.665 0 000 6.5a2.665 2.665 0 004.855 1.52l2.948 1.475A2.67 2.67 0 0010.333 13a2.67 2.67 0 002.667-2.666 2.67 2.67 0 00-2.666-2.666zm0-6.906c1.05 0 1.904.854 1.904 1.904 0 1.05-.854 1.904-1.904 1.904A1.906 1.906 0 018.43 2.666c0-1.05.854-1.904 1.904-1.904zM2.666 8.404A1.906 1.906 0 01.762 6.5c0-1.05.854-1.904 1.904-1.904 1.05 0 1.904.854 1.904 1.904 0 1.05-.854 1.904-1.904 1.904zm7.668 3.834a1.906 1.906 0 01-1.904-1.904c0-1.05.854-1.904 1.904-1.904 1.05 0 1.904.854 1.904 1.904 0 1.05-.854 1.904-1.904 1.904z"
                          fill="#DDA33D"/>
                      </svg>
                      <span>Поделитесь с друзьями</span>
                    </div>
                    <div class="detailed__social">
                      <a class="button button--white detailed__btn detailed__btn--facebook" href="">Facebook</a>
                      <a class="button button--white detailed__btn detailed__btn--vk" href="">VK</a>
                      <a class="button button--white detailed__btn detailed__btn--twitter" href="">Twitter</a>
                    </div>
                  </div>
                  <div class="detailed__gallery">

                  </div>
                </div>
              </div>

            <?php endforeach; ?>

        </div>
      </div>

      <section class="callboard callboard--closed">
        <div class="callboard__bg"></div>
        <div class="callboard__container js-callboard-thumbs">
          <div class="callboard__wrapper swiper-wrapper">

            <?php
              foreach ($posts as  $key => $post):
                setup_postdata($post);
                ?>

                <div class="callboard__slide swiper-slide js-callboard-slide" data-index="<?php echo $key?> " data-url="<?php the_permalink(); ?>">
                  <?php
                    $image = get_field('izobrazhenie_afishi');

                    echo wp_get_attachment_image($image, '88x109', false);
                  ?>
                  <div class="callboard__desc">


                    <?php if (get_field('sobytie')): ?>
                      <?php while (has_sub_field('sobytie')): ?>

                        <?php $date = get_sub_field_object('date');
                        $array = $date['name'];
                        if ($array === 'sobytie_0_date'):
                          $date = $date['value'];
                          $date = explode(" ", $date); ?>
                          <div>
                            <span class="callboard__title"><?php the_title() ?></span>
                            <span class="callboard__city"><?php the_sub_field('gorod'); ?></span>
                          </div>
                          <p class="callboard__date"><?php echo $date['0'] ?>
                            <span class="callboard__month"><?php echo $date['1'] ?></span>
                          </p>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    <?php endif; ?>

                  </div>
                </div>

              <?php endforeach; ?>

          </div>

        </div>
      </section>
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
