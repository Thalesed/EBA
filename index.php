<!DOCTYPE html>
<html>
<?php
/**
 * Template principal do tema.
 *
 * @package Nome do Tema
 * @since 1.0
 */

get_header();
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">


<title> <?php echo wp_title('');  ?> </title>

<main id="main-content" class="site-main">
<nav class="menu">
<?php
 wp_nav_menu( array(
    'theme_location' => 'menu-principal',
  'container' => 'nav',
  'container_class' => 'menu-principal'
  ) );
  ?>
</nav>
<script>
var icon = document.querySelector('.menu-icon');
document.querySelector('.menu-icon').addEventListener('click', function() {
	if(icon.textContent == "X"){
		document.querySelector('.menu-principal').style.left = '-250px'; 
		icon.textContent = ":::";
	}else{
		document.querySelector('.menu-principal').style.left = '0';
		icon.textContent = "X";
	}
});

document.querySelector('.menu-principal').addEventListener('click', function() {
	document.querySelector('.menu-principal').style.left = '-250px'; 
});


</script>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

    </article>

  <?php endwhile; endif; ?>
	
	<?php if (is_active_sidebar('nome-da-area')) : ?>
  <div class="widget-area">
    <?php dynamic_sidebar('nome-da-area'); ?>
  </div>
<?php endif; ?>


</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</html>
