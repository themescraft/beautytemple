<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package beautytemple
 */

get_header();
?>
	<?php 
		get_template_part( 'template-parts/content', 'sticky' );
	?>

    <section class="main-wrapper">
        <div class="container main-wrapper__inner">
            <section class="blog-posts">
	            <?php
	            if ( have_posts() ) :

		            /* Start the Loop */
		            while ( have_posts() ) :
			            the_post();

						if(is_sticky()) {
							continue;
						}
			            /*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
			            get_template_part( 'template-parts/content', get_post_type() );

		            endwhile;

		            the_posts_navigation();

	            else :

		            get_template_part( 'template-parts/content', 'none' );

	            endif;
	            ?>
            </section>
            <?php get_sidebar(); ?>
        </div>
    </section>

<?php

get_footer();
