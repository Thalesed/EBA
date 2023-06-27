<?php
/**
 * Template principal do tema.
 *
 * @package Nome do Tema
 * @since 1.0
 */

get_header();
?>

<main id="main-content" class="site-main">
<nav class="nav-menu">
  <?php
  wp_nav_menu( array(
    'theme_location' => 'primary',
    'container' => false,
  ) );
  ?>
</nav>

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

</main>

<?php //get_sidebar(); ?>

<?php //get_footer(); ?>
