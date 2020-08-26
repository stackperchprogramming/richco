<?php
get_header();
?>
<section id="head">
    <div class="hero-page-wrap parralax-container" id="services_hero" style="background-image: url(<?php print get_theme_mod('services_hero', get_template_directory_uri(). '/images/services.jpg'); ?>)">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center top-half">
                        <h3 class="page-title"><span id="services_title"><?php print get_theme_mod('services_title','Services');?></span><span class="accent large-text">.</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
<section id="accordion">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <!--span class="subheading">Our Services</span-->
                </div>
                <h3 class="subheading-text text-center" id="services_intro_phrase">
                    <?php print get_theme_mod('services_intro_phrase','RichCo leads the industry in managing a full scope of mortgage field services on vacant, defaulted, and foreclosed properties.');?>
                </h3>
                <div class="section-title"><h3 id="services_section_title_1"><?php print get_theme_mod('services_section_title_1','Inspections');?></h3></div>
            </div>
        </div>
        <div class="row" id="inspections">
            <div class="col-md-6">
                <div class="intro-img-box">
                    <h4 id="services_section_subtitle_1"><?php print get_theme_mod('services_section_subtitle_1','Property Inspections');?></h4>
                    <img id="services_section_image_1" src="<?php print get_theme_mod('services_section_dropdown_image_1', get_template_directory_uri() . '/images/inspections.gif'); ?>" alt="">
                </div>
            </div>
            <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_1"><?php print get_theme_mod('services_section_intro_1','Timely and accurate reporting of the condition and occupancy status of a property.');?></h4>
                        <div id="accordion1">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <i class="accordion-chevron fa fa-chevron-down"></i> <span id="services_section_dropdown_1_title_1"><?php print get_theme_mod('services_section_dropdown_1_title_1','Exterior Inspections');?></span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1" style="">
                                        <div class="card-body" id="services_section_dropdown_1_answer_1">
                                            <?php print get_theme_mod('services_section_dropdown_1_answer_1','Our inspectors verify the occupancy status, in addition to providing a detailed description of the exterior condition of the property.');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingTwo">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="accordion-chevron fa fa-chevron-down"></i> <span id="services_section_dropdown_1_title_2"><?php print get_theme_mod('services_section_dropdown_1_title_2','Interior Inspections');?></span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1" style="">
                                        <div class="card-body" id="services_section_dropdown_1_answer_2">
                                            <?php print get_theme_mod('services_section_dropdown_1_answer_2','Interior inspections reduce the severity and cost of damages hidden inside a property, like mold, water intrusion and pest infestations.');?>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingThree">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <i class="accordion-chevron fa fa-chevron-down"></i> <span id="services_section_dropdown_1_title_3"><?php print get_theme_mod('services_section_dropdown_1_title_3','Insurance Loss Inspection');?></span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1" style="">
                                        <div class="card-body">
                                            <?php print get_theme_mod('services_section_dropdown_1_answer_3','Inspectors verify to an insurance company that repairs and rehab work are successfully completed prior to the release of insurance funds.');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingFour">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <i class="accordion-chevron fa fa-chevron-down"></i> <span id="services_section_dropdown_1_title_4"><?php print get_theme_mod('services_section_dropdown_1_title_4','Contact Attempt Inspection');?></span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion1" style="">
                                        <div class="card-body">
                                            <?php print get_theme_mod('services_section_dropdown_1_answer_4','Inspectors attempt to provide contact information to delinquent borrowers on behalf of mortgage servicers and lenders.');?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingFive">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                <i class="accordion-chevron fa fa-chevron-down"></i> <span id="services_section_dropdown_1_title_5"><?php print get_theme_mod('services_section_dropdown_1_title_5','FEMA Inspections');?></span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion1" style="">
                                        <div class="card-body" id="services_section_dropdown_1_answer_5">
                                            <?php print get_theme_mod('services_section_dropdown_1_answer_5','After a disaster, inspections are performed to assess damages on all types of properties – occupied or vacant, current or delinquent loans.');?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingSix">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                <i class="accordion-chevron fa fa-chevron-down"></i> <span id="services_section_dropdown_1_title_6"><?php print get_theme_mod('services_section_dropdown_1_title_6','Broker Check Inspections');?></span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion1" style="">
                                        <div class="card-body" id="services_section_dropdown_1_answer_6">
                                            <?php print get_theme_mod('services_section_dropdown_1_answer_5','When properties are for sale, inspectors report on the effectiveness of the broker’s efforts to market the property and verify its condition.');?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                            </div>
                        </div>
                    </div>
            </div>
        
<!--------------------------------- end accordion1 ---------------------------->
<!--------------------------------- accordion 2 ---------------------------->
            <div class="row" id="preservation">
                <div class="col-12">
                    <div class="section-title-end"><h3 class="align-right" id="services_section_title_2"><?php print get_theme_mod('services_section_title_2','Protection');?></h3></div>
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_2"><?php print get_theme_mod('services_section_intro_2','Keeping vacant properties secure, safe, and well-maintained.');?></h4>
                        <div id="accordion2">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingSeven">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Securing</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion2" style="">
                                        <div class="card-body">
                                            Once a property is deemed vacant, a contractor will secure it and perform a lock change according to investor or insurer guidelines.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingEight">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Winterization</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion2" style="">
                                        <div class="card-body">
                                            Vacant properties are vulnerable to costly damages from frozen and burst water lines, so our contractors winterize all plumbing fixtures.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingNine">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Debris Removal</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion2" style="">
                                        <div class="card-body">Our debris removal services inspect a house for all fallen or damaged material and removes it
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end accordion -->
                <div class="col-md-6">
                    <div class="intro-img-box">
                        <h4 id="services_section_subtitle_2"><?php print get_theme_mod('services_section_subtitle_2','Property Preservation');?></h4>
                        <img id="services_section_image_2" src="<?php print get_theme_mod('services_section_image_2',get_template_directory_uri() . '/images/preservation.gif'); ?>" alt="">
                    </div>
                </div>
            </div><!-- end row -->
            
<!------------------------- end accordion 2 ----------------------------->
        <!-- start new section -->
        <div class="row" id="maintenance">
            <div class="col-12">
                <div class="section-title"><h3 id="services_section_title_3"><?php print get_theme_mod('services_section_title_3', 'Real Estate Maintenance');?></h3></div>
            </div>
            <div class="col-md-6">
                <div class="intro-img-box">
                    <h4 id="services_section_subtitle_3"><?php print get_theme_mod('services_section_subtitle_3','Maintaining Value');?></h4>
                    <img id="services_section_image_3" src="<?php print get_theme_mod('services_section_image_3', get_template_directory_uri() . '/images/maintenance.gif' );?>" alt="">
                </div>
            </div>
            <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_3"><?php print get_theme_mod('services_section_intro_3','Maintaining the real estate assets of our clients to protect value and improve marketability.');?></h4>
                        <div id="accordion3">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingOneOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseOneOne" aria-expanded="false" aria-controls="collapseOneOne">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Initial Services</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseOneOne" class="collapse" aria-labelledby="headingOneOne" data-parent="#accordion3" style="">
                                        <div class="card-body">
                                            When a property moves to REO, the focus shifts from simply protecting and maintaining it, to marketing and selling the property as quickly as possible.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingOneTwo">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseOneTwo" aria-expanded="false" aria-controls="collapseOneTwo">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Securing</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseOneTwo" class="collapse" aria-labelledby="headingOneTwo" data-parent="#accordion3" style="">
                                        <div class="card-body">
                                            During the initial service visit, the property is secured to the client’s specifications.
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingOneThree">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseOneThree" aria-expanded="false" aria-controls="collapseOneThree">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Debris Removal &amp; Maid Services</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseOneThree" class="collapse" aria-labelledby="headingOneThree" data-parent="#accordion3" style="">
                                        <div class="card-body">
                                            By removing debris and cleaning the property, our goal is to make a house appealing to prospective buyers so they can envision themselves living there.
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingOneFour">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseOneFour" aria-expanded="false" aria-controls="collapseOneFour">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Ongoing Services</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseOneFour" class="collapse" aria-labelledby="headingOneFour" data-parent="#accordion3" style="">
                                        <div class="card-body">
                                            Our goal is to assure that every REO property remains secure and marketable from the initial service order through the final inspection
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                            </div><!-- end accordion -->
                        </div>
                    </div>
            </div><!-- end inspections -->

     <!------------------------- end accordion 3 ----------------------------->
            <div class="row" id="landscaping">
                <div class="col-12">
                    <div class="section-title-end"><h3 class="align-right" id="services_section_title_4" id="services_section_title_4"><?php print get_theme_mod('services_section_title_4','Landscaping');?></h3></div>
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_4">
                            <?php print get_theme_mod('services_section_intro_4','Improving curb appeal, safety, and compliance with yard maintenance and flood prevention.');?> 
                        </h4>
                        <div id="accordion4">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingFourOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFourOne" aria-expanded="false" aria-controls="collapseFourOne">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Grass Cuts</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseFourOne" class="collapse" aria-labelledby="headingFourOne" data-parent="#accordion4" style="">
                                        <div class="card-body">
                                            Contractors follow FHA regulations, generally cutting grass every two weeks in season, or according to client instructions and investor guidelines.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingFourTwo">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFourTwo" aria-expanded="false" aria-controls="collapseFourTwo">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Shrub Maintenance</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseFourTwo" class="collapse" aria-labelledby="headingFourTwo" data-parent="#accordion4" style="">
                                        <div class="card-body">
                                            Shrubs are trimmed once per season, and more frequently at the client’s request.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingFourThree">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFourThree" aria-expanded="false" aria-controls="collapseFourThree">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Flood Protection</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseFourThree" class="collapse" aria-labelledby="headingFourThree" data-parent="#accordion4" style="">
                                        <div class="card-body">
                                            Our flood protection services can often prevent future flooding by implementing an appropriate plan.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end accordion -->
                <div class="col-md-6">
                    <div class="intro-img-box">
                        <h4 id="services_section_subtitle_4"><?php print get_theme_mod('services_section_subtitle_4','Preserving Curb Appeal');?></h4>
                        <img id="services_section_image_4" src="<?php print get_theme_mod('services_section_image_4', get_template_directory_uri() . '/images/landscaping.gif'); ?>" alt="">
                    </div>
                </div>
            </div><!-- end row -->
    <!----------------------- end accordion 4-------------------------->
            <!-- start new section -->
        <div class="row" id="fha">
            <div class="col-12">
                <div class="section-title"><h3 id="services_section_title_5"><?php print get_theme_mod('services_section_title_5','FHA Conveyance');?></h3></div>
            </div>
            <div class="col-md-6">
                <div class="intro-img-box">
                    <h4 id="services_section_subtitle_5"><?php print get_theme_mod('services_section_subtitle_5','Reconveyance Prevention');?></h4>
                    <img id="services_section_image_5" src="<?php print get_theme_mod('services_section_image_5', get_template_directory_uri() . '/images/fha.gif'); ?>" alt="">
                </div>
            </div>
            <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_5"><?php print get_theme_mod('services_section_intro_5','Properly managing the FHA post-sale process to avoid reconveyances.');?></h4>
                        <div id="accordion5">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingThreeOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThreeOne" aria-expanded="false" aria-controls="collapseThreeOne">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Convey Maintenance</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseThreeOne" class="collapse" aria-labelledby="headingThreeOne" data-parent="#accordion5" style="">
                                        <div class="card-body">
                                            Contractors are sent to confirm and immediately report back an assurance that the property is in acceptable condition to convey to HUD.
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                            </div><!-- end accordion -->
                        </div>
                    </div>
            </div><!-- end inspections -->
<!--------------------------- end accordion 5----------------------------------->

     <!------------------------- accordion 6 ----------------------------->
            <div class="row" id="reg">
                <div class="col-12">
                    <div class="section-title-end"><h3 class="align-right" id="services_section_title_6"><?php print get_theme_mod('services_section_title_6','Property Registration');?></h3></div>
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_6"><?php print get_theme_mod('services_section_intro_6','Staying ahead of local property registrations nationwide to ensure client compliance.');?></h4>
                        <div id="accordion6">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingSixOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseSixOne" aria-expanded="false" aria-controls="collapseSixOne">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Residential</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseSixOne" class="collapse" aria-labelledby="headingSixOne" data-parent="#accordion4" style="">
                                        <div class="card-body">
                                            We complete property registrations on behalf of our mortgage servicing clients.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingSixTwo">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseSixTwo" aria-expanded="false" aria-controls="collapseSixTwo">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Commercial</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseSixTwo" class="collapse" aria-labelledby="headingSixTwo" data-parent="#accordion6" style="">
                                        <div class="card-body">
                                            To address blight, many jurisdictions are including both residentially and commercially zoned properties in their ordinances.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end accordion -->                
                <div class="col-md-6">
                    <div class="intro-img-box">
                        <h4 id="services_section_subtitle_6"><?php print get_theme_mod('services_section_subtitle_6','Vacancy Registration');?></h4>
                        <img id="services_section_image_6" src="<?php print get_theme_mod('services_section_image_6', get_template_directory_uri() . '/images/vacant.gif');?> ?>" alt="">
                    </div>
                </div>
            </div><!-- end row -->
    <!----------------------- end accordion 6-------------------------->
            <!-- start new section -->
        <div class="row" id='repairs'>
            <div class="col-12">
                <div class="section-title"><h3 id="services_section_title_7"><?php print get_theme_mod('services_section_title_7','Estimates & Repairs');?></h3></div>
            </div>
            <div class="col-md-6">
                <div class="intro-img-box">
                    <h4 id="services_section_subtitle_7"><?php print get_theme_mod('services_section_subtitle_7','Retaining Value');?></h4>
                    <img id="services_section_image_7" src="<?php print get_theme_mod('services_section_image_7',get_template_directory_uri() . '/images/est.gif'); ?>" alt="">
                </div>
            </div>
            <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4 id="services_section_intro_7">
                            <?php print get_theme_mod('services_section_intro_7','Stepping in when the worst-case scenario of damage to a property becomes a reality.');?>
                        </h4>
                        <div id="accordion7">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingSevenOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseSevenOne" aria-expanded="false" aria-controls="collapseSevenOne">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Damage Assessment</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseSevenOne" class="collapse" aria-labelledby="headingSevenOne" data-parent="#accordion7" style="">
                                        <div class="card-body">
                                            We provide estimate and repair services for damaged properties to address the needs of clients, investors, neighborhoods and cities.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingSevenTwo">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseSevenTwo" aria-expanded="false" aria-controls="collapseSevenTwo">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Bio-Hazard Environmental Remediation</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseSevenTwo" class="collapse" aria-labelledby="headingSevenTwo" data-parent="#accordion7" style="">
                                        <div class="card-body">
                                            Our staff is trained and certified to identify and remediate biohazards and environmental issues.
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                            </div><!-- end accordion -->
                        </div>
                    </div>
            </div><!-- end inspections -->
<!--------------------------- end accordion 7----------------------------------->


     <!------------------------- start accordion 8 ----------------------------->
            <div class="row" id='enforcement'>
                <div class="col-12">
                    <div class="section-title-end"><h3 class="align-right" id="services_section_title_8"><?php print get_theme_mod('services_section_title_8','High Risk Code Enforcement');?></h3></div>
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="intro-text-box">
                        <h4>Preventing code compliance issues while maintaining communication with local officials.</h4>
                        <div id="accordion8">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingEightOne">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseEightOne" aria-expanded="false" aria-controls="collapseEightOne">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Violation Resolution</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseEightOne" class="collapse" aria-labelledby="headingEightOne" data-parent="#accordion8" style="">
                                        <div class="card-body">
                                            Our violations specialists communicate with officials on a daily basis to assist with the abatement process at the property level.
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header" id="headingEightTwo">
                                        <p class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseEightTwo" aria-expanded="false" aria-controls="collapseEightTwo">
                                                    <i class="accordion-chevron fa fa-chevron-down"></i> <span>Municipal Research</span>
                                            </button>
                                        </p>
                                    </div>
                                    <div id="collapseEightTwo" class="collapse" aria-labelledby="headingEightTwo" data-parent="#accordion8" style="">
                                        <div class="card-body" id="services_section_intro_8">
                                            <?php print get_theme_mod('services_section_intro_8','Preventing code compliance issues while maintaining communication with local officials.');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end accordion -->
                <div class="col-md-6">
                    <div class="intro-img-box">
                        <h4 id="services_section_subtitle_8"><?php print get_theme_mod('services_section_subtitle_8','Code Enforcement');?></h4>
                        <img id="services_section_image_8" src="<?php print get_theme_mod('services_section_image_8',get_template_directory_uri() . '/images/party.gif'); ?>" alt="">
                    </div>
                </div>
            </div><!-- end row -->
                
    <!----------------------- end accordion 8-------------------------->
    
        <!-- /end section -->
        </div>
</section>
<?php
get_footer();
?>
