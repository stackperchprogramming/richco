<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RichCo
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<?php
    $args = array('showposts' => -1);
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): 
        echo '<table>';

        while ( $the_query->have_posts()) : $the_query->the_post(); 
            echo '<tr><td><a href="'.get_the_permalink().'">'.get_the_post_thumbnail().' '.get_the_title().'</tr></td>';
        endwhile; 

        echo '</table>';
    endif; 
    wp_reset_query(); 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
