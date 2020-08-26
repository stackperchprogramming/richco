<?php
get_header();
?>
<!-- hero  -->
<section id="head">
    <div class="hero-page-wrap parralax-container" id="vendors_hero" style="background-image: url(<?php print get_theme_mod('vendors_hero',get_template_directory_uri() . '/images/vendor-hero.jpg'); ?>)" data-stellar-background-ratio=".5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
        <div class="container">
            <div class="row">
                <div class="mx-auto col-sm-6 col-xs-12">
                    <div class='mt-100 phrase-container'>
                        <div class='catch-phrase text-center'>
                            <h3 class="text-white"><span class="accent text-lg-center"></span></h3>
                            <p class="text-white" id="vendors_title"><?php print get_theme_mod('vendors_title','Working to make a difference');?><span class="accent text-large">.</span></p>
                            <img src="<?php print get_template_directory_uri() . '/images/hex.png' ?>" /><br />
                            <button id='goto_signup' class="btn shine text-white">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ hero  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <span class="sub-heading quotation aos-item" data-aos="slide-up" id="vendors_subtitle"><?php print get_theme_mod('vendors_subtitle','Go further than youve ever gone before!');?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="text-justify accent" id="vendors_section_title_1">
                        <?php print get_theme_mod('vendors_section_title_1','MAKE YOUR COMPANY PART OF AN ELITE TEAM THAT INSPECTS, MAINTAINS, AND PRESERVES HOMES ACROSS THE NATION.');?>
                    </h3>
                    <p class="text-justify " id="vendors_section_text_1_1">
                        <?php print get_theme_mod('vendors_section_text_1_1','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit');?>
                    </p>
                    <p class="text-justify "id="vendors_section_text_2_1">
                        <?php print get_theme_mod('vendors_section_text_2_1','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit');?>
                    </p>
                    <p class="text-justify " id="vendors_section_text_3_1">
                        <?php print get_theme_mod('vendors_section_text_3_1','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit');?>
                    </p>
                </div>
            <div class="col-12 col-md-6">
                    <div class="vendor-vid" id="play-vendor">
                        <div class="overlay-vend overlay-play"><i class="fas fa-play-circle"></i></div>
                        <video id="video" class="video" id="vendors_vid_poster" playsinline muted poster="<?php print get_theme_mod('vendors_vid_poster', get_template_directory_uri() . '/images/video-bg.jpg');?>">
                            <source id="vendors_section_vid" src="<?php print get_theme_mod('vendors_section_vid', get_template_directory_uri() .'/images/vendor-vid.mp4');?>" type="video/mp4">Your browser does not support the video tag.
                        </video>
                    </div>
                
                </div>
        </div>
    </div>
</section>
<section id='signup'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <span class="subheading" id="vendors_signup_section_title"><?php print get_theme_mod('vendors_signup_section_title','SIGN UP TO BECOME A VENDOR');?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="vendors_signup_form">
            <div class="col-12 col-sm-4">
                <div class="text-center">
                    <span class="side-bar-white sub-heading-white " id="vendors_signup_section_text"><?php print get_theme_mod('vendors_signup_section_text','Sign up now, Make your own hours and let us handle the rest!');?></span>
                </div>
            </div>
            <div class="col-12 col-sm-8"  id="vendors_signup_form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="name" />
                                    <label class="input_label" for="name">
                                        <span class="input_label_content" data-content="First Name">First &AMP; Last Name</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="phone" />
                                    <label class="input_label" for="phone">
                                            <span class="input_label_content" data-content="Phone Number">Best Contact Number</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="email" />
                                    <label class="input_label" for="email">
                                            <span class="input_label_content" data-content="Email">Email</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="address" />
                                    <label class="input_label" for="address">
                                            <span class="input_label_content" data-content="Complete Address">Complete Address</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="background" />
                                    <label class="input_label" for="background">
                                            <span class="input_label_content" data-content="Can You Pass a Background Check?">Can You Pass a Background Check?</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="years" />
                                    <label class="input_label" for="years">
                                            <span class="input_label_content" data-content="Years in Industry">Years in Industry</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="coverage" />
                                    <label class="input_label" for="coveragae">
                                            <span class="input_label_content" data-content="Coverage area (County & State)">Coverage area (County &amp; State)</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="subcontractors" />
                                    <label class="input_label" for="subcontractors">
                                            <span class="input_label_content" data-content="Do you use subcontractors?">Do you use subcontractors?</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12">
                            <span class="input_span">
                                <textarea class="input_jump" type="text" id="comments" ></textarea>
                                    <label class="input_label" for="comments">
                                            <span class="input_label_content" data-content="Additional Comments.">Additional Comments.</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 ">                        
                            <button class="btn shine text-white w-100 h-100" id="vendors_signup" style='border-width: 1px;font-size: 1.5rem;'>Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5"  id="vendors_result"></div>
        </div>
    </div>
</section>
<section id="info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <span class="subheading-green" id="vendors_signup_section_final_title"><?php print get_theme_mod('vendors_signup_section_final_title','WHAT IS MORTGAGE FIELD SERVICES?');?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 mb-50">
                <div class="text-center"><img class="img-thumbnail w-50" src="<?php print get_template_directory_uri() . '/images/inspect.png'?>"></div>
                <div class='text-center mt-30'>
                    <h3 id="vendors_signup_section_final_title_1"><?php print get_theme_mod('vendors_signup_section_final_title_1','INSPECTIONS');?></h3>
                    <p class="" id="vendors_signup_section_final_text_1"><?php print get_theme_mod('vendors_signup_section_final_text_1','Property inspections identify issues and damages that threaten the value, condition and safety of properties');?></p>
                </div>
            </div>
            <div class="col-12 col-sm-4 mb-50">
                <div class="text-center"><img class="img-thumbnail w-50" src="<?php print get_template_directory_uri() . '/images/maintenance.png'?>"></div>
                <div class='text-center mt-30'>
                    <h3 id="vendors_signup_section_final_title_2"><?php print get_theme_mod('vendors_signup_section_final_title_1','PRESERVATION, MAINTENANCE & REPAIR');?></h3>
                    <p class="" id="vendors_signup_section_final_text_2"><?php print get_theme_mod('vendors_signup_section_final_text_2','Protect and preserve vacant properties while keeping them maintained and secure.');?></p>
                </div>
            </div>
            <div class="col-12 col-sm-4 mb-50">
                <div class="text-center"><img class="img-thumbnail w-50" src="<?php print get_template_directory_uri() . '/images/seasonal.png'?>"></div>
                <div class='text-center mt-30'>
                    <h3 id="vendors_signup_section_final_title_3"><?php print get_theme_mod('vendors_signup_section_final_title_3','SEASONAL MAINTENANCE');?></h3>
                    <p class="" id="vendors_signup_section_final_text_3"><?php print get_theme_mod('vendors_signup_section_final_text_3','Proper exterior maintenance improves curb appeal, maintains a  safe environment, and assures compliance with local ordinances.');?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section id='vendor-owl'>
        <div class="container no-gutters no-padding">
        <div class="row no-gutters">
            <div class="col-12 col-sm-6">
                <div class="owl-carousel owl-theme">
                    
                    <div class='overlay-green'><img class='item w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                    <div class='overlay-green'><img class='item w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                    <div class='overlay-green'><img class='item w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="row no-gutters">
                    <div class="col-6"><img class='w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                    <div class="col-6"><img class='w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                    <div class="col-6"><img class='w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                    <div class="col-6"><img class='w-100' src='<?php print get_template_directory_uri() . "/images/grow.png"?>'></div>
                </div>
            </div>
        </div>
    </div>
</section-->
<?php
get_footer()
?>