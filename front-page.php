<?php
/* 
 * @Author Ralph Harris 
 * Copyright (C) 2020 - [RaHa]Programming 
 * www.rahaprogramming.com
 * This software is distributed by [RaHa]Programming 
 * under General Public License but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * Basically, you can feel free to use my software as long as
 * you understand that any problems created by it are your
 * responsibility and you agree to not hold me responsible in any
 * way whatsoever for any problems resulting from the choice you
 * are making to use my software.
 * 
 * See the General Public License for more details at 
 * <http://www.gnu.org/licenses/>.
 */
get_header();
?>
<!-- hero -->
<div id="front-hero" class="hero-page-wrap parralax-container" style="background-image: url(<?php print get_theme_mod('front_page_hero', get_template_directory_uri() . '/images/hero.jpg'); ?>)">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row full-height pad-half">
            <div class="col-12">
                <div class="text text-center w-100">
                    <h1 class="mb-4 aos-item" id="title" data-aos="fade-right"><?php print get_theme_mod('front_page_title','Mortgage Field <br> Services') ?></h1>
                    <p class="mb-4 aos-item" id="subtitle"  data-aos="fade-left"><?php print get_theme_mod('front_page_subtitle','Setting a New Standard of Excellence') ?></p>
                    <p><a href="contact/" id="hero-btn" class="btn btn-primary py-3 px-4" ><?php print get_theme_mod('front_page_btntitle','Request Services') ?></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="mouse aos-item" data-aos="fade-up">
        <a href="#news" class="mouse-icon">
            <div class="mouse-wheel" id="mouse-wheel"><i class="fas fa-arrow-down"></i></div>
        </a>
    </div>
</div>
<!-- / hero -->

<!--services-->
<section  class="mar-tm-10" id="services">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center aos-item" data-aos="fade-up">
                <h2 class="title-small-center margin-btm-50">Services
                  <span></span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                            <img id='inspection_card_image_1' src='<?php print get_theme_mod('inspection_card_image_1',get_template_directory_uri()."/images/inspect.jpg"); ?>' />
                        </div>
                        <div class="text text-center">
                            <p class="tiny_note" id="front_page_inspect_card_subtitle_1"><?php print get_theme_mod('front_page_inspect_card_subtitle_1','On Time. Every Time.'); ?></p>
                            <h3 id='front_page_inspect_card_title_1'><?php print get_theme_mod('front_page_inspect_card_title_1','Property Inspections'); ?></h3>
                            <span class="location d-inline-block mb-3" id='front_page_inspect_card_desc_1'><?php print get_theme_mod('front_page_inspect_card_desc_1','Timely and accurate reporting of the condition and occupancy status of a property.'); ?></span>
                        </div>
                        <p class=""><a href="services/#inspections">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                              <img id='inspection_card_image_2' src='<?php print get_theme_mod('inspection_card_image_2',get_template_directory_uri()."/images/preservation.jpg"); ?>' />
                        </div>
                            <div class="text text-center">
                                <p id='front_page_inspect_card_subtitle_2' class="tiny_note"><?php print get_theme_mod('front_page_inspect_card_subtitle_2','Industry Leading Experts.'); ?></p>
                                <h3 id='front_page_inspect_card_title_2'> <?php print get_theme_mod('front_page_inspect_card_title_2','Property Preservation'); ?></h3>
                                <span class="location d-inline-block mb-3" id='front_page_inspect_card_desc_2'>
                                    <?php print get_theme_mod('front_page_inspect_card_desc_2','Keeping vacant properties secure, safe, and well-maintained.'); ?>
                                </span>
                            </div>
                        <p class=""><a href="services/#preservation">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                            <img  id='inspection_card_image_3' src='<?php print get_theme_mod('inspection_card_image_3',get_template_directory_uri()."/images/maintenance.jpg"); ?>' />
                        </div>
                        <div class="text text-center">
                            <p id="front_page_inspect_card_subtitle_3" class="tiny_note"><?php print get_theme_mod('front_page_inspect_card_subtitle_3','We Guarantee Clients Satisfaction.')?></p>
                            <h3 id="front_page_inspect_card_title_3"><?php print get_theme_mod('front_page_inspect_card_title_3','Property Maintenance');?></h3>
                            <span class="location d-inline-block mb-3" id='front_page_inspect_card_desc_3'>
                                <?php print get_theme_mod('front_page_inspect_card_desc_3','Maintaining the real estate assets of our clients to protect value and improve marketability.');?>
                                
                            </span>
                        </div>
                        <p class=""><a href="services/#maintenance">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image" >
                            <img id="inspection_card_image_4" src='<?php print get_theme_mod('inspection_card_image_4', get_template_directory_uri()."/images/reo.jpeg" ); ?>' />
                        </div>
                        <div class="text text-center">
                            <p class="tiny_note" id="front_page_inspect_card_subtitle_4"><?php print get_theme_mod('front_page_inspect_card_subtitle_4','Secure and Marketable.');?></p>
                            <h3 id="front_page_inspect_card_title_4" id="front_page_inspect_card_title_4"><?php print get_theme_mod('front_page_inspect_card_title_4','REO');?></h3>
                            <span class="location d-inline-block mb-3" id="front_page_inspect_card_desc_4">
                                <?php print get_theme_mod('front_page_inspect_card_desc_4','When a property moves to REO, the focus shifts from simply protecting and maintaining it, to marketing and selling the property as quickly as possible.'); ?>
                            </span>
                        </div>
                        <p class=""><a href="services/#maintenance">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                            <img id="inspection_card_image_5" src='<?php print get_theme_mod('inspection_card_image_5', get_template_directory_uri()."/images/landscaping.jpg") ?>' />
                        </div>
                        <div class="text text-center">
                            <p class="tiny_note" id="front_page_inspect_card_subtitle_5"><?php print get_theme_mod('front_page_inspect_card_subtitle_5','Preserving Curb Appeal.');?></p>
                            <h3 id="front_page_inspect_card_title_5"><?php print get_theme_mod('front_page_inspect_card_title_5','Landscaping');?></h3>
                            <span class="location d-inline-block mb-3" id="front_page_inspect_card_desc_5">
                                <?php print get_theme_mod('front_page_inspect_card_desc_5', 'Contractors follow FHA regulations and more. From simply cutting grass and shrub removal - to complete flood prevention plans.');?>
                            </span>
                        </div>
                        <p class=""><a href="services/#maintenance">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6  col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                            <img id="inspection_card_image_6" src='<?php print get_theme_mod('inspection_card_image_6', get_template_directory_uri()."/images/fha.jpg"); ?>'/>
                        </div>
                        <div class="text text-center">
                            <p class="tiny_note"id="front_page_inspect_card_subtitle_6"><?php print get_theme_mod('front_page_inspect_card_subtitle_6','20 Years Experience.');?></p>
                            <h3 id="front_page_inspect_card_title_6"><?php print get_theme_mod('front_page_inspect_card_title_6','FHA Conveyance');?></h3>
                            <span class="location d-inline-block mb-3" id="front_page_inspect_card_desc_6">
                                    <?php print get_theme_mod('front_page_inspect_card_desc_6','Properly managing the FHA post-sale process to avoid reconveyances.');?>
                                    
                                </span>
                        </div>
                        <p class=""><a href="services/#fha">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6  col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                            <img id="inspection_card_image_7" src='<?php print get_theme_mod('inspection_card_image_7', get_template_directory_uri()."/images/reg.jpg");?>' />
                        </div>
                        <div class="text text-center">
                            <p class="tiny_note" id="front_page_inspect_card_subtitle_7"><?php print get_theme_mod('front_page_inspect_card_subtitle_7','Field Management For The 21st Century.');?></p>
                            <h3 id="front_page_inspect_card_title_7"><?php print get_theme_mod('front_page_inspect_card_title_7','Property Registration');?></h3>
                            <span id="front_page_inspect_card_desc_7" class="location d-inline-block mb-3"><?php print get_theme_mod('front_page_inspect_card_desc_7', 'Staying ahead of local property registrations nationwide to ensure client compliance.');?></span>
                        </div>
                        <p class=""><a href="services/#reg">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
            <div class="col-xs-12 col-sm-6  col-lg-3 text-center services-card aos-item" data-aos="flip-up">
                <div class="wrap-card">
                    <div class="card">
                        <div class="card-image">
                            <img id="inspection_card_image_8" src='<?php print get_theme_mod('inspection_card_image_8', get_template_directory_uri()."/images/repairs.jpg");?>' />
                        </div>
                        <div class="text text-center">
                            <p class="tiny_note" id="front_page_inspect_card_subtitle_8"><?php print get_theme_mod('front_page_inspect_card_subtitle_8','Setting The Standard.');?></p>
                            <h3 id="front_page_inspect_card_title_8"><?php print get_theme_mod('front_page_inspect_card_title_8','Estimates &amp; Repairs');?></h3>
                            <span class="location d-inline-block mb-3" id="front_page_inspect_card_desc_8"><?php print get_theme_mod('front_page_inspect_card_desc_8','Stepping in when the worst-case scenario of damage to a property becomes a reality.');?></span>
                        </div>
                        <p class=""><a href="services/#repairs">Learn More <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    </div>
                </div>		
            </div>
        </div>
    </div>
</section>
<!--/ services -->

<!--VENDORS-->
<section  class="mar-tm-10 dimgrey-bg mar-tm-10" id="careers">
<div class="container">
        <div class="row">    
                <div class="col-xs-12 text-center aos-item" data-aos="fade-down">
                        <h2 class="title-small-center margin-btm-50 text_white">Vendors
                          <span></span>
                        </h2>
                </div>
        </div>
          <div class="row">
                <div class="col-8 pad_left_20 aos-item " data-aos="slide-right">
                        <!--h3 class="accent_text_outline aos-item" data-aos="slide-right">Become a vendor.</h3-->
                        <h5 class="text_white line_normal aos-item left_100 ml-5" data-aos="slide-right" id="front_page_vendor_phrase">
                            <?php print get_theme_mod('front_page_vendor_phrase', 'Join our elite vendor network.');?>
                            </h5>
                </div>
                <div class="aos-item center-horizontal col-4" data-aos="slide-left" align="center">
                    <a href='vendors/#signup'><button class="btn btn-primary btn-lg accent">Join Now</button></a>
                </div>
        </div>
  </div>
</section>
<!-- /VENDORS -->
<!-- NEWS -->
 <section  class="mar-tm-10 blog-section latest-blog spad" id="news">
    <div class="container">
        <div class="row">
                <div class="col-12 text-center aos-item" data-aos="fade-down">
                        <h2 class="title-small-center margin-btm-50" id="front_page_posts_title">
                            <?php print get_theme_mod('front_page_posts_title','Industry Alerts');?>
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
<!-- /NEWS -->
<?php
get_footer();
?>