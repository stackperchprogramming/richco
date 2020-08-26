<?php
get_header();
?>
<!-- hero  -->
<section id="head">
    <div class="hero-page-wrap parralax-container" id="about_hero" style="background-image: url(<?php print get_theme_mod('about_hero', get_template_directory_uri() . '/images/about.png') ?>)" data-stellar-background-ratio=".5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center top-half">
                        <h3 class="page-title"><span id="about_title"><?php print get_theme_mod('about_title','About Us');?></span><span class="accent large-text">.</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ hero  -->

<section id='history'>
    <div class="about_mission aos-item" data-aos="slide-right">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--div class="text-center">
                        <span class="subheading">Mission</span>
                    </div-->
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_thumb">
                        <img id="about_img_1" src="<?php print get_theme_mod('about_img_1', get_template_directory_uri().'/images/happy.png');?>" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_text">
                        <h4 id="about_title_1"><?php print get_theme_mod('about_title_1','Synergy');?></h4>
                        <p id="about_text_1">
                            <?php print get_theme_mod('about_text_1','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.');?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id='history3'>
    <div class="about_mission aos-item" data-aos="slide-left">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--div class="text-center">
                        <span class="subheading">Mission</span>
                    </div-->
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_text">
                        <h4 id="about_title_1_2"><?php print get_theme_mod('about_title_1_2','Innovation ');?></h4>
                        <p id="about_text_1_2">
                            <?php print get_theme_mod('about_text_1_2','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.');?>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_thumb">
                        <img id="about_img_1_2" src="<?php print get_theme_mod('about_img_1_2', get_template_directory_uri().'/images/happy.png');?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id='history2'>
    <div class="about_mission aos-item" data-aos="slide-right">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--div class="text-center">
                        <span class="subheading">Mission</span>
                    </div-->
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_thumb">
                        <img id="about_img_1_3" src="<?php print get_theme_mod('about_img_1_3', get_template_directory_uri().'/images/happy.png');?>" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_text">
                        <h4 id="about_title_1_3"><?php print get_theme_mod('about_title_1_3','Commitment');?></h4>
                        <p id="about_text_1_3">
                            <?php print get_theme_mod('about_text_1_3','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.');?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- testimonial_area  -->
    <div class="parralax-container overlay-dark " id="about_img_3" style="background-image: url(<?php print get_theme_mod('about_img_3', get_template_directory_uri() . '/images/vendors01.jpg'); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="action_heading">
                        <h3 id="about_title_3"><?php print get_theme_mod('about_title_3','Call today for a free in-person evaluation!');?></h3>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="call_add_action">
                        <span id="about_phone">512-793-6714</span>
                        <a href="../contact/" class="boxed-btn3-line" id="about_btn_text">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


<section id='faq'>
    <!-- accordion  -->
    <div class="accordion_area " >
            <div class="container">
                <div class="row align-items-center">
                        <div class="col-6">
                            <div class="faq_ask">
                                <h3 id="about_title_2"><?php print get_theme_mod('about_title_2','Frequently asked Questions');?></h3>
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="accordian-chevron fa fa-chevron-down"></i> <span id="about_accordian_question_1"><?php print get_theme_mod('about_accordian_question_1','Adieus who direct esteem. It esteems?');?></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                            <div class="card-body"  id="about_accordian_answer_1"><?php print get_theme_mod('about_accordian_answer_1','Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="accordian-chevron fa fa-chevron-down"></i> <span id="about_accordian_question_2"><?php print get_theme_mod('about_accordian_question_2','Adieus who direct esteem. It esteems?');?></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                            <div class="card-body" id="about_accordian_answer_2"><?php print get_theme_mod('about_accordian_answer_2','Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="accordian-chevron fa fa-chevron-down"></i> <span id="about_accordian_question_3"><?php print get_theme_mod('about_accordian_question_3','Adieus who direct esteem. It esteems?');?></span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                            <div class="card-body" id="about_accordian_answer_3"><?php print get_theme_mod('about_accordian_answer_3','Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-6">
                        <div class="accordion_thumb">
                            <img id="about_img_2" src="<?php print get_theme_mod('about_img_2', get_template_directory_uri().'/images/accordion.png');?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- accordion  -->
</section>

    
 <?php
 get_footer();
 ?>