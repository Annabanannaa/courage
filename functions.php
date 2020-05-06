<?php
  // регистрируем скрипты
  add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
  function my_scripts_method() {
    // отменяем зарегистрированный jQuery
    // вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
    wp_deregister_script( 'jquery-core' );
    
    // регистрируем новые скрипты
    wp_register_script( 'jquery-core', get_template_directory_uri() . '/source/js/jquery.min.js' );
    //подключение слайдера
    wp_register_script( 'swiper',  get_template_directory_uri() . '/node_modules/swiper/js/swiper.min.js' );
    wp_register_script( 'fancybox-js', get_template_directory_uri() . '/source/js/jquery.fancybox.min.js');
    wp_register_script( 'scripts', get_template_directory_uri() . '/source/js/scripts.js' );
    

    // выводим скрипты
    wp_enqueue_script( 'jquery-core' );
    wp_enqueue_script( 'swiper' );
    wp_enqueue_script( 'select2' );
    wp_enqueue_script( 'fancybox-js', array('jquery') );
    wp_enqueue_script( 'scripts', array('jquery') );
  }

  // регистрируем CSS
  function true_style_frontend() {
    wp_enqueue_style('swiper', get_template_directory_uri() . '/node_modules/swiper/css/swiper.css' );
    wp_enqueue_style('fancybox-css', get_template_directory_uri() . '/source/css/jquery.fancybox.min.css' );
    wp_enqueue_style('style', get_template_directory_uri() . '/source/css/style.min.css' );
  }

  add_action( 'wp_enqueue_scripts', 'true_style_frontend' );


  // подключаем CSS для админки редактора
  function wph_inline_css_admin() {
    if ( current_user_can( 'editor' ) ) {
      wp_enqueue_style('redactorwp', get_template_directory_uri() . '/source/css/redactorwp.css' ); 
    }
  }
  add_action('admin_head', 'wph_inline_css_admin');

  // убираешь лишнее при генерации формы
  add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
  });

  // миниатюра в записи 
  add_theme_support( 'post-thumbnails' );

  // включаем поддержку меню
  if (function_exists('add_theme_support')) {
    add_theme_support('menus');
  }

  // регистрируем меню
  register_nav_menu('main_menu', __('Главное меню', 'Courage'));

  // создаем миниатюру
  add_image_size( '88x109', 88, 109, true );
  add_image_size( '120x100', 120, 100, true );
  add_image_size( '210x261', 210, 261, true );
  add_image_size( '255x255', 255, 255, true );
  add_image_size( '255x400', 255, 400, true );
  add_image_size( '540x340', 540, 340, true );
  add_image_size( '800x600', 800, 600, true );

/* Отключаем админ панель для всех пользователей. */
  show_admin_bar(false);

// убрать теги p и br в Contact Form 7
  add_filter('wpcf7_form_elements', function($content) {
  $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
  return $content;
});

  // создаем новый тип записи [Афиши]
  add_action( 'init', 'register_post_poster' );
  function register_post_poster() {
    $labels = array(
      'name' => 'Афиша',
      'singular_name' => 'Афиша', // админ панель Добавить->Функцию
      'add_new' => 'Добавить афишу',
      'add_new_item' => 'Добавить афишу', // заголовок тега <title>
      'edit_item' => 'Редактировать афишу',
      'new_item' => 'Новые афиши',
      'all_items' => 'Все афиши',
      'view_item' => 'Просмотр афиши на сайте',
      'search_items' => 'Искать афишу',
      'not_found' =>  'Афиша не найдена.',
      'not_found_in_trash' => 'В корзине нет афиши.',
      'parent_item_colon' => 'Родитель',
      'menu_name' => 'Афиша' // ссылка в меню в админке
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'map_meta_cap' => true,
      'show_ui' => true, // показывать интерфейс в админке
      'has_archive' => true,
      'menu_icon' => 'dashicons-images-alt', // иконка в меню
      'menu_position' => 20, // порядок в меню
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes')
    );
    register_post_type('poster', $args);
  }
  function additional_taxonomies_poster(){
    register_taxonomy_for_object_type('post_tag', 'poster');
  }
  add_action( 'init', 'additional_taxonomies_poster' );

  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


  function special_nav_class($classes, $item){
    $classes[] = 'main-nav__item';
    return $classes;
  }
?>