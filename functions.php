<?php
/**
 * Funções e definições do tema.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marina
 * @since 1.0.0
 */

/**
 * Define o caminho absoluto do diretório do tema.
 */
define( 'MARINA_THEME_DIR', get_template_directory() );

/**
 * Define o caminho absoluto do diretório de recursos do tema.
 */
define( 'MARINA_THEME_ASSETS', MARINA_THEME_DIR . '/assets' );

/**
 * Registra e carrega os arquivos CSS e JS do tema.
 */
function marina_enqueue_scripts() {

  // Registra o arquivo style.css do tema.
  wp_enqueue_style(
    'marina-style',
    get_stylesheet_uri(),
    array(),
    wp_get_theme()->get( 'Version' )
  );

  // Registra e carrega o arquivo script.js do tema.
  wp_enqueue_script(
    'marina-script',
    MARINA_THEME_ASSETS . '/js/script.js',
    array( 'jquery' ),
    wp_get_theme()->get( 'Version' ),
    true
  );
}

add_action( 'wp_enqueue_scripts', 'marina_enqueue_scripts' );

/**
 * Define as configurações padrão do tema.
 */
function marina_setup() {

  // Define o suporte a traduções do tema.
  load_theme_textdomain( 'marina', MARINA_THEME_DIR . '/languages' );

  // Define o suporte a imagens em destaque.
  add_theme_support( 'post-thumbnails' );

  // Define o tamanho padrão das imagens em destaque.
  set_post_thumbnail_size( 1200, 600, true );

  // Define o suporte a títulos SEO.
  add_theme_support( 'title-tag' );

  // Define o suporte a menus personalizados.
  register_nav_menus(
    array(
      'primary' => __( 'Menu principal', 'marina' ),
    )
  );
}

add_action( 'after_setup_theme', 'marina_setup' );

/**
 * Registra o widget de busca do tema.
 */
function marina_register_widgets() {

  // Registra o widget de busca.
  register_sidebar(
    array(
      'name'          => __( 'Busca', 'marina' ),
      'id'            => 'sidebar-search',
      'description'   => __( 'Adicione o widget de busca aqui.', 'marina' ),
      'before_widget' => '<div class="widget widget_search">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}

add_action( 'widgets_init', 'marina_register_widgets' );
