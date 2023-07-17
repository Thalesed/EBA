<?php get_header(); ?>

<div class="container pt-5">
        <div class="row">
                <div class="col-sm-8">
                        <?php  if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                                <h1><?php the_title(); ?></h1>
                                <div>
                                        <?php the_content(); ?>
                                </div>
                        <?php endwhile; endif; ?>
                </div>
                <div class="sidebar">
                        <?php

                                dynamic_sidebar('primary-sidebar');

                        ?>
                </div>
        </div>
</div>

<?php get_footer();

