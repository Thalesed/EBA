<!doctype html>
<html>
	<meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
<?php wp_head();
$cor_cabecalho = get_theme_mod( 'header_background_color', '#dd0000' );
$cor_texto = get_theme_mod('cor_texto_cabecalho', '#111111');
?>
<body>
<link rel="icon" type="image/jpeg" href="<?php echo get_template_directory_uri(); ?>/favicon.jpeg">

<div class="header-image">
      <img src="<?php echo esc_url(get_theme_mod('header_image')); ?>">
</div>
<header style="background-color: <?php echo $cor_cabecalho; ?>; color: <?php echo $cor_texto;?>;">
<h1 class="titulo">
<div class="menu-icon">
	:::
</div>
<span class="separator"></span>
<div class"texto">
	<?php
$descricao_site = get_bloginfo('title');
echo $descricao_site;
?>
</div>
</h1>
</header>


<nav class="menu">
<?php
 wp_nav_menu( array(
    'theme_location' => 'menu-principal',
  'container' => 'nav',
  'container_class' => 'menu-principal'
  ) );
  ?>
</nav>

<script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>

