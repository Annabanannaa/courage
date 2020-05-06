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

      <div class="contacts">
        <h1 class="contacts__title">Контакты</h1>
        <div class="contacts__info">
          <div class="contacts__item">
            <span class="contacts__desc">Контактный телефон:</span>
            <span class="contacts__text contacts__text--phone">+7 (925) 004-79-84</span>
          </div>
          <div class="contacts__item">
            <span class="contacts__desc">Почта</span>
            <span class="contacts__text">info@kuraj-concert.ru</span>
          </div>
          <div class="contacts__item">
            <span class="contacts__desc">VK:</span>
            <span class="contacts__text">vk.com/kurajconcert</span>
          </div>
          <div class="contacts__item">
            <span class="contacts__desc">Instagram:</span>
            <span class="contacts__text">kuraj_concert</span>
          </div>
        </div>

        <form class="form-contacts">
          <span class="form-contacts__title">Задайте свой вопрос</span>
          <?php echo do_shortcode('[contact-form-7 id="53" title="Задать вопрос"]'); ?>
<!--          <div class="form-contacts__wrapper">-->
<!--            <div class="form-contacts__item">-->
<!--              <input class="form-contacts__input" id="person-name" placeholder="Иван Петров" required name="name"-->
<!--                     type="text">-->
<!--              <label class="form-contacts__label" for="person-name">Ваше имя</label>-->
<!--            </div>-->
<!--            <div class="form-contacts__item">-->
<!--              <input class="form-contacts__input" id="person-phone" placeholder="+79999999" required name="name"-->
<!--                     type="text">-->
<!--              <label class="form-contacts__label" for="person-phone">Телефон</label>-->
<!--            </div>-->
<!--            <div class="form-contacts__item">-->
<!--              <input class="form-contacts__input" id="person-mail" placeholder="Ваш e-mail" required name="name"-->
<!--                     type="text">-->
<!--              <label class="form-contacts__label" for="person-mail">Ваш e-mail</label>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="form-contacts__wrapper">-->
<!--            <div class="form-contacts__item form-contacts__item--message">-->
<!--              <input class="form-contacts__input form-contacts__input--message" id="person-name"-->
<!--                     placeholder="Хотелось бы узнать..." required name="name" type="text">-->
<!--              <label class="form-contacts__label" for="person-name">Сообщение</label>-->
<!--            </div>-->
<!--            <div class="form-contacts__item form-contacts__item--message">-->
<!--              <input class="form-contacts__file" id="file" type="file" name="file">-->
<!--              <label class="form-contacts__add-file" for="file">Прикрепить файл</label>-->
<!--            </div>-->
<!--          </div>-->
<!--          <button class="button button--orange form-contacts__btn" type="button">Задать вопрос</button>-->
          <label class="form-contacts__checkbox">
            <input type="checkbox" checked="checked">
            <span class="form-contacts__text">Я согласен с условиями <a class="form-contacts__link" target="_blank" href="">Политики конфиденциальности</a></span>
          </label>
        </form>
      </div>

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
