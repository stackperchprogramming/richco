<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RichCo
 */

get_header();
while ( have_posts() ) :
the_post();
?>
<!-- hero -->
<section id="head" class="posts-head">
    <div class="hero-page-wrap parralax-container" style="background-image: url(<?php print get_the_post_thumbnail_url(); ?>)" data-stellar-background-ratio=".5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center top-half">
                        <h3 class="page-title">Alerts<span class="accent large-text">.</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / hero -->
 <!-- post section begin -->
    <section class="post-section pb-0 section-post">
            <div class="row">
                <div class="col-12 mb-50 aos-item" data-aos='slide-up'>
                    <div class="text-center">
                        <span class="subheading"><?php print get_the_title(); ?></span>
                    </div>
                </div>
            </div>
    </section>
    <section class="post-content-section pt-0 section-post">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-50 aos-item" data-aos='slide-up'>
                    <div class="text-justify">
                        <p class="post-content"><?php print get_the_content(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <section class="section-post">
    <div class="row">
        <div class="col-12 col-sm-8">
		<?php
		

			//get_template_part( 'template-parts/content', get_post_type() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
        </div><!-- /col -->
     <?php get_sidebar(); ?>
     </div><!-- /row -->
 </section>
<section id="news">
    <div class="container">
        <div class="row">
                <div class="col-12 text-center aos-item" data-aos="fade-down">
                          <span></span>
                        </h2>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme">
<?php
    $args = array('showposts' => -1);
    $the_query = new WP_Query( $args );
    $count = 0;
    if( $the_query->have_posts() ): 
        while ( $the_query->have_posts()) :  
            $the_query->the_post();
    $count++;
        echo '<div class="item">';
            echo '<div class="container"><div class="single-blog-item"><div class="sb-pic"><img src="';
            echo get_the_post_thumbnail_url();
            echo '"></div><div class="sb-text"><ul><li><i class="accent fa fa-user"></i> ';
            echo get_the_author();
            echo '</li><li><i class="accent far fa-clock"></i> ';
            echo get_the_date();
            echo '</li></ul><h4><a href="';
            echo get_the_permalink();
            echo '">';
            echo get_the_title();
            echo '.</a></h4></div></div></div></div>';        
        endwhile; 
    endif; 
    wp_reset_query(); 
?>
            </div><!-- end carousel -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php

get_footer();
