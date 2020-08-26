<?php
get_header();
?>
<!-- hero  -->
<section id="head">
    <div class="hero-page-wrap parralax-container sliding-item" id="client_hero" style="background-image: url(<?php print get_theme_mod('client_hero', get_template_directory_uri() . '/images/clients-hero.jpg'); ?>)" data-stellar-background-ratio=".5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center top-half">
                        <h3 class="page-title" id="client_title"><?php print get_theme_mod('client_title','Clients');?><span class="accent large-text">.</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ hero  -->
<section id='values'>
    <div class="row">
        <div class="col-12">
            <div class="text-center aos-item" data-aos="slide-up">
                <span class="subheading" id="client_subtitle"><?php print get_theme_mod('client_subtitle','Always Improving');?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="border-left-green">
                <h2 class="header-green" id="client_bullet_1">
                    <?php print get_theme_mod('client_bullet_1','Client Satisfaction');?>
                    
                </h2>
                <p class="pad" id="client_bullet__text_1">
                    <?php print get_theme_mod('client_bullet__text_1','Our client portal offers easy solutions to even the most convoluted of projects. Easily upload large job requests and contact us instantly without ever leaving your desk.');?>
                    
                </p>
            </div>
            <div class="border-left-green mt-5 mb-5">
                <h2 class="header-green" id="client_bullet_2">
                    <?php print get_theme_mod('client_bullet_2','Property Experts');?>
                </h2>
                <p class="pad" id="client_bullet__text_2">
                    <?php print get_theme_mod('client_bullet__text_2','With over 20 years of experience in property management, we offer our clients the most comprehensive coverage and the fastest results guaranteed so you can focus on marketing your property in the least amount of time possible.');?>
                </p>
            </div>
            <div class="container">
            <div class="slidecontainer">
                <div id="slideshow">
                    <img class="imageflex" id="clients_slideshow_img_1" src="<?php print get_theme_mod('clients_slideshow_img_1' ,get_template_directory_uri() . '/images/slideshow-1.jpg'); ?>">
                    <img class="imageflex" id="clients_slideshow_img_2" src="<?php print get_theme_mod('clients_slideshow_img_2', get_template_directory_uri() . '/images/slideshow-2.jpg'); ?>">
                    <img class="imageflex" id="clients_slideshow_img_3" src="<?php print get_theme_mod('clients_slideshow_img_3', get_template_directory_uri() . '/images/slideshow-3.png'); ?>">
                </div>
            </div>          <div class="overlay-shaded-white">
                <h2 class="blfo header-green" id="client_slideshow_overlay_title">
                    <?php print get_theme_mod('client_slideshow_overlay_title','Over 2 Decades');?>
                  
              </h2> 
                <p class="blfo" id="client_slideshow_overlay_text">
                 <?php print get_theme_mod('client_slideshow_overlay_text','For over 2 decades weve seen every type of blighted property you can imagine. We get your property back to marketable condition faster than any other company on the coast and keep it that way. From Yard maintenance to Complete remodeling, theres nothing we havent seen and nothing we cant handle.');?>
              </p>
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
                    <span class="subheading text-white text-large" id="client_signup_title"><?php print get_theme_mod('client_signup_title','Client Portal');?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="client_signup_form">
            <div class="col-12 col-sm-4">
                <div class="text-center">
                    <span class="side-bar-white sub-heading-white " id="client_signup_text"><?php print get_theme_mod('client_signup_text','Need access to our clients portal? Fill out this request form and well shoot you over your login information right away!');?></span>
                </div>
            </div>
            <div class="col-12 col-sm-8"  id="client_signup_form">
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
                                            <span class="input_label_content" data-content="Phone Number">Phone Number</span>
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
                                            <span class="input_label_content" data-content="Street Address">Street Address</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="city" />
                                    <label class="input_label" for="city">
                                            <span class="input_label_content" data-content="City">City</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="state" />
                                    <label class="input_label" for="state">
                                            <span class="input_label_content" data-content="State">State</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="zip" />
                                    <label class="input_label" for="zip">
                                            <span class="input_label_content" data-content="Zip Code">Zip Code</span>
                                    </label>
                            </span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <span class="input_span">
                                    <input class="input_jump" type="text" id="company" />
                                    <label class="input_label" for="company">
                                            <span class="input_label_content" data-content="Company Name">Company Name</span>
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
                            <button class="btn shine text-white w-100 h-100" id="clients_signup" style='border-width: 1px;font-size: 1.5rem;'>Send Request</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5"  id="clients_result"></div>
        </div>
    </div>
</section>
<section>
   
    <div class="row">
        <div class="container ml-5 mr-5">
            <div class="careercontent border-left-green">
            <h2 class="sh ml-5">Client Portal</h2>
            <div  class="pad-20-center bg-accent text-white">
                <a class="anchor-green-btn" id="client_login_link" href="#">Login</a>
            </div>
        </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>