<?php get_header();
$cor_sub = get_theme_mod('cor_subtitulo', '#ffd700');
?>

<div>
        <div class="row">
                <main class="col-sm-8">
                        <?php  if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<h1 style="background-color: <?php echo $cor_sub;?>;"><?php the_title(); ?></h1>
                                <div>
                                        <?php the_content(); ?>
                                </div>
                        <?php endwhile; endif; ?>
		</main>
		<?php get_sidebar(); ?>
                <div class="sidebar">
                        <?php

                               dynamic_sidebar('sidebar-1');

                        ?>
                </div>
        </div>
</div>

<footer>
	<?php if (is_active_sidebar('footer')) : ?>
		<div class="widget-area">
                	<?php dynamic_sidebar('footer'); ?>
                </div>
        <?php endif; ?>
</footer>
<?php get_footer();

