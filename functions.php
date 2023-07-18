<?php
function mytheme_enqueue_styles() {
    wp_enqueue_style( 'mytheme-style', get_stylesheet_directory_uri() . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_styles' );


function register_my_menus() {
  register_nav_menus( array(
    'menu-principal' => 'menu-principal'
  ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );

function custom_menu_order($menu_order) {
  if (!$menu_order) return true;

  return array(
    'Home',
    'Teste',
    'TI',
    'Tutoriais',
    'Contato'
  );
}
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'custom_menu_order');

function adicionar_titulo_site($title, $sep) {
    if (is_front_page() && is_home()) {
        $title = get_bloginfo('name');
    } elseif (is_singular()) {
        $title = single_post_title('', false);
    }
    return $title . ' ' . $sep . ' ' . get_bloginfo('description');
}
add_filter('wp_title', 'adicionar_titulo_site', 10, 2);
function theme_register_sidebar() {
  register_sidebar(array(
    'name'          => __('Barra Lateral', 'theme-domain'),
    'id'            => 'sidebar-1',
    'description'   => __('Esta é a barra lateral principal.', 'theme-domain'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'theme_register_sidebar');


function theme_setup() {
    // Suporte para página 404 personalizada
    add_action('template_redirect', 'theme_custom_404');
}

// Função para exibir a página 404 personalizada
function theme_custom_404() {
    if (is_404()) {
        include(get_template_directory() . '/404.php');
        exit();
    }
}

// Chamar a função theme_setup()
add_action('after_setup_theme', 'theme_setup');

function enqueue_custom_scripts() {
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

function sidebar_widget() {
  register_sidebar(array(
    'name' => 'Footer',
    'id' => 'footer',
    'description' => 'Descrição da Área de Widget',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="sidebar">',
    'after_title' => '</h3>',
  ));
}
add_action('widgets_init', 'sidebar_widget');

function theme_custom_colors() {
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Primary Color', 'Thales'),
            'slug' => 'primary-color',
            'color' => '#ff0000',
        ),
        array(
            'name' => __('Secondary Color', 'Thales'),
            'slug' => 'secondary-color',
            'color' => '#00ff00',
        ),
	// Adicione mais cores personalizadas conforme necessário
    ));
    add_theme_support('dark-editor-style');
}
add_action('after_setup_theme', 'theme_custom_colors');


function theme_dark_mode_styles() {
    wp_enqueue_style('dark-mode', get_template_directory_uri() . '/dark-mode.css', array(), '1.0', 'all');
}
add_action('enqueue_block_editor_assets', 'theme_dark_mode_styles');

function custom_redirect_404() {
    global $wp_query;

    if ( ! $wp_query->post ) {
        include( get_template_directory() . '/404.php' );
        exit();
    }
}
add_action( 'template_redirect', 'custom_redirect_404' );
// Adicionar suporte à imagem de fundo personalizada
add_theme_support('custom-background');

// Adicionar suporte a cores personalizadas
add_theme_support('custom-background', array(
  'default-color' => 'ffffff',
  'default-image' => '',
));


function EBA_customize_register( $wp_customize ) {
   // Cria uma seção para a opção de cor de fundo
   $wp_customize->add_section( 'EBA_background_color_section' , array(
       'title'       => __( 'Cor de Fundo', 'EBA' ),
       'priority'    => 30,
       'description' => 'Personalize a cor de fundo do tema',
   ) );

   // Adiciona o controle para a opção de cor de fundo
   $wp_customize->add_setting( 'EBA_background_color', array(
       'default'   => '#ffffff',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'EBA_background_color', array(
       'label'    => __( 'Cor de Fundo', 'EBA' ),
       'section'  => 'EBA_background_color_section',
       'settings' => 'EBA_background_color',
   ) ) );

   $wp_customize->add_setting( 'header_background_color', array(
    'default'           => '#ffffff', // Define a cor padrão do cabeçalho
    'sanitize_callback' => 'sanitize_hex_color', // Valida a cor hexadecimal
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
    'label'    => __( 'Cor do Cabeçalho', 'theme_name' ),
    'section'  => 'colors',
    'settings' => 'header_background_color',
) ) );

}

add_action( 'customize_register', 'EBA_customize_register' );

function meu_tema_definir_capa() {
    $capa_url = get_template_directory_uri() . '/screenshot.jpg';
    add_theme_support('custom-header', array(
        'default-image' => $capa_url,
        'width'         => 1200,
        'height'        => 600,
        'flex-width'    => true,
        'flex-height'   => true,
    ));
}
add_action('after_setup_theme', 'meu_tema_definir_capa');


add_action('widgets_init', 'my_theme_sidebars');
function my_theme_sidebars() {

        register_sidebar(array(
                'id' => 'primary-sidebar',
                'name' => 'Primary Sidebar',
                'description' => 'Sidebar that appears across the entire website',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
        ));

}

function theme_customize_register($wp_customize) {
  // Adicionar uma seção para a imagem do cabeçalho
  $wp_customize->add_section('header_image_section', array(
    'title' => 'Imagem do Cabeçalho',
    'priority' => 30,
  ));

  // Adicionar controle para a imagem do cabeçalho
  $wp_customize->add_setting('header_image', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image', array(
    'label' => 'Escolha uma imagem para o cabeçalho',
    'section' => 'header_image_section',
    'settings' => 'header_image',
  )));
}

add_action('customize_register', 'theme_customize_register');


// register custom post type to work with
 function lc_create_post_type() {
 // set up labels
 $labels = array (
 'name' => 'Events',
 'singular_name' => 'Event',
 'add_new' => 'Add New Event',
 'add_new_item' => 'Add New Event',
 'edit_item' => 'Edit Event',
 'new_item' => 'New Event',
 'all_items' => 'All Events',
 'view_item' => 'View Event',
 'search_items' => 'Search Events',
 'not_found' => 'No Events Found',
 'not_found_in_trash' => 'No Events found in Trash',
 'parent_item_colon' => '',
 'menu_name' => 'Events',
 );
 //register post type
 register_post_type ( 'event', array(
 'labels' => $labels,
 'has_archive' => true,
 'public' => true,
 'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
 'taxonomies' => array( 'post_tag', 'category' ),
 'exclude_from_search' => false,
 'capability_type' => 'post',
 'rewrite' => array( 'slug' => 'events' ),
 )
 );
 }
 add_action( 'init', 'lc_create_post_type' );
