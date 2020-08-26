<?php
/**
 * @package RichCo
 */

get_header();
?>
<section  class="mar-tm-10 blog-section latest-blog spad" id="news">
    <div class="container">
        <div class="row">
                <div class="col-12 text-center aos-item" data-aos="fade-down">
                        <h2 class="title-small-center margin-btm-50">What's New
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
?>