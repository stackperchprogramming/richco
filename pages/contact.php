<?php
get_header();
?>
<!-- hero  -->
<section id="head">
    <div class="hero-page-wrap parralax-container" id="contact_hero" style="background-image: url(<?php print get_theme_mod('contact_hero', get_template_directory_uri() . '/images/contact.png'); ?>)" data-stellar-background-ratio=".5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center top-half">
                        <h3 class="page-title"><span id="contact_title"><?php print get_theme_mod('contact_title','Contact Us');?></span><span class="accent large-text">.</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-50 aos-item" data-aos='slide-up'>
                    <!--div class="text-center">
                        <span class="subheading">Contact</span>
                    </div-->
                    <h3 class="subheading-text text-center" id="contact_subtitle"><?php print get_theme_mod('contact_subtitle','Available 24 hours a day.');?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="map ">
                        <div class="map-inside mr-5">
                            <img id="contact_picture" src="<?php print get_theme_mod('contact_picture', get_template_directory_uri(). '/images/contact-side.jpg');?>" class="" />
                            <i class="icon_pin"></i>
                            <div class="inside-widget mt-2">
                                <h4 id="contact_bus_name"><?php print get_theme_mod('contact_bus_name','RichCo Property Solutions');?></h4>
                                <ul>
                                    <li id="contact_address"><?php print get_theme_mod('contact_address','Pass Christian, MS');?></li>
                                    <li id="contact_phone"><?php print get_theme_mod('contact_phone','Phone: 512-793-6714');?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-text">
                                <div class="section-title">
                                    <h2 id="contact_message_form_title"><?php print get_theme_mod('contact_message_form_title','Get In Touch');?></h2>
                                </div>
                                <form action="#" class="contact-form" id="contact-form">
                                    <input type="text" id="contact_name" placeholder="Name">
                                    <input type="text" id="contact_email" placeholder="Email">
                                    <input type="text" id="contact_phone" placeholder="Phone number">
                                    <input type="text" id="contact_business" placeholder="Business Name">
                                    <textarea id="contact_message" placeholder="Message"></textarea>
                                    <button id="contact_us_btn" type="submit" class="btn btn-primary site-btn">Send Message</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 mt-5" id="contact_result"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->   
<?php
get_footer()
?>