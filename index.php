<!DOCTYPE html>
<html>
 <?php
                        /**
                         * Template principal do tema.
                         *
                         * @package EBA
                         * @since 1.0
                         */

                        get_header();
                ?>

                <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
        </head>

        <body>
                <main id="main-content" class="site-main">
                        <?php if(have_posts()) :
                                while(have_posts()) :
                                        the_post();

                                        $categories = get_the_category();
                                        if($categories) :
                                                foreach($categories as $category) :
                                                        if($category->name == "Academico") :
                        ?>
                                                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                                                        <div class="entry-content">
                                                                                <?php the_content();?>
                                                                                <ul class="post-categories">
                                                                                        <li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                                                                </ul>
                                                                        </div>
                                                                </article>
                                                        <?php endif;
                                                endforeach;
                                        endif;
                                endwhile;
                                while(have_posts()) :
                                        the_post();

                                        $categories = get_the_category();
                                        if($categories) :
                                                foreach($categories as $category) :
                                                        if($category->name == "Administrativo") :
                                                         ?>
                                                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                                                        <div class="entry-content">
                                                                                <?php the_content();?>
                                                                                <ul class="post-categories">
                                                                                        <li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a></li>
                                                                                </ul>
                                                                        </div>
                                                                </article>
                                                        <?php endif; ?>
                                                <?php endforeach; ?>
                                        <?php endif; ?> 
                      <?php endwhile; ?>
                        <?php else:
                                echo "Não há posts";
                        endif; ?>
                </main>

                <?php if (is_active_sidebar('nome-da-area')) : ?>
                        <div class="widget-area">
                                <?php dynamic_sidebar('nome-da-area'); ?>
                        </div>
                <?php endif; ?>

        <?php get_footer(); ?>


