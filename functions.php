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
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . 'script.js', array(), '1.0', true );
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


function EBA_customize_register( $wp_customize ) {
   $wp_customize->add_setting( 'header_background_color', array(
    'default'           => '#dd0000', // Define a cor padrão do cabeçalho
    'sanitize_callback' => 'sanitize_hex_color', // Valida a cor hexadecimal
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
    'label'    => __( 'Cor do Cabeçalho', 'EBA' ),
    'section'  => 'colors',
    'settings' => 'header_background_color',
) ) );

$wp_customize->add_setting( 'cor_texto_cabecalho', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ) );

    // Controle para a cor do texto do cabeçalho
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cor_texto_cabecalho', array(
        'label' => __( 'Cor do Texto do Cabeçalho', 'meu_tema' ),
        'section' => 'colors',
    ) ) );

	$wp_customize->add_setting( 'cor_subtitulo', array(
        'default' => '#ffd700',
        'transport' => 'refresh',
    ) );

    // Controle para a cor do texto do cabeçalho
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cor_subtitulo', array(
        'label' => __( 'Cor do Subtitulo', 'meu_tema' ),
        'section' => 'colors',
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

function lc_create_post_type() {
    // Configurar rótulos
    $labels = array(
        'name' => 'Eventos',
        'singular_name' => 'Evento',
        'add_new' => 'Adicionar Novo Evento',
        'add_new_item' => 'Adicionar Novo Evento',
        'edit_item' => 'Editar Evento',
        'new_item' => 'Novo Evento',
        'all_items' => 'Todos os Eventos',
        'view_item' => 'Visualizar Evento',
        'search_items' => 'Pesquisar Eventos',
        'not_found' => 'Nenhum Evento Encontrado',
        'not_found_in_trash' => 'Nenhum evento encontrado na lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Eventos',
    );

    // Registrar tipo de postagem
    register_post_type('event', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes'),
        'taxonomies' => array('post_tag', 'category'),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'events'),
    ));
}
add_action('init', 'lc_create_post_type');

// Função para adicionar campos personalizados no editor de eventos
function add_event_meta_boxes() {
    add_meta_box(
        'event_dates',
        'Event Dates',
        'event_dates_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_event_meta_boxes');

// Função de retorno de chamada para exibir os campos personalizados no editor de eventos
function event_dates_callback($post) {
    // Recupera as datas salvas (se existirem)
    $event_date = get_post_meta($post->ID, 'event_date', true);
    ?>

    <p>
        <label for="event_date">Event Date:</label>
        <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>">
    </p>

    <?php
}

// Função para salvar os campos personalizados
function save_event_meta($post_id) {
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
    }
}
add_action('save_post_event', 'save_event_meta');

// Função para exibir os eventos na página principal
function display_events_on_homepage() {
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 5,
        'meta_key' => 'event_date', // Campo personalizado para a data de acontecimento
        'orderby' => 'meta_value', // Ordenar pela meta_value (data de acontecimento)
        'order' => 'ASC', // Ordem ascendente
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            echo '<p>Date de Publicação: ' . get_the_date() . '</p>';
            echo '<p>Date do Evento: ' . get_post_meta(get_the_ID(), 'event_date', true) . '</p>';
            the_content();
        }
        wp_reset_postdata();
    } else {
        echo 'Não há eventos disponíveis.';
    }
}


