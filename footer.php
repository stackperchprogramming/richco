<?php
 /* @package RichCo */
?>
    </div><!-- content end --> 
    <!-- FOOTER -->
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="ftco-footer-widget">
                        <img id="footer_logo" src="<?php print get_theme_mod('footer_logo', get_template_directory_uri() . '/images/logo_wide_footer.png')?>" class="ftco-heading-2 image-footer" />
                        <p id='catch_phrase'><?php print get_theme_mod('footer_catch_phrase','Setting the standard.'); ?></p>
                      <ul class="ftco-footer-social list-unstyled">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                      </ul>
                    </div>
                </div>
            <div class="col-md">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2" id='footer_title_1'><?php print get_theme_mod('footer_title_1','Community'); ?></h2>
                    <ul class="list-unstyled">
                        <li><a href="contact/">Contact Us</a></li>
                      <li><a href="vendors/">Vendors</a></li>
                      <li><a target="_blank" href="https://propertypreswizard.com/control.php">Property Press Wizard</a></li>
                      
                    </ul>
                </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget">
                <h2 class="ftco-heading-2" id='footer_title_2'><?php print get_theme_mod('footer_title_2','About Us'); ?></h2>
                <ul class="list-unstyled">
                  <li><a href="about/mission">Our Story</a></li>
                  <li><a href="services/">Services</a></li>
                  <li><a href="about/#faq">FAQs</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
               <div class="ftco-footer-widget">
                <h2 class="ftco-heading-2" id='footer_title_3'><?php print get_theme_mod('footer_title_3','Company'); ?></h2>
                <ul class="list-unstyled">
                  <li><a href="about/">About Us</a></li>
                  <li><a href="contact/">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget">
                  <h2 class="ftco-heading-2">Have a Questions?</h2>
                  <div class="block-23 mb-3">
                        <ul class="list-unstyled">
                          <li><a href="#"><span class="icon icon-phone"></span><span class="text" id='footer_phone'><?php print get_theme_mod('footer_phone','512-793-6714'); ?></span></a></li>
                          <li><a href="#"><span class="icon icon-envelope"></span><span id='footer_email' class="text"><?php print get_theme_mod('footer_email','Richcoproperty@gmail.com'); ?></span></a></li>
                        </ul>
                      </div>
              </div>
            </div>
            </div>
            <div class="row">
                <div class="col-12 col-xs-12">
                    <p class="linkback" >Made with love by <a class="linkback" href="http://www.rahaprogramming.com" target="_blank">Rahaprogramming</a></p>
                </div>
              <div class="col-md-12 text-center">
                <hr class="footer-break" />
                <p>Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script> 
                    All rights reserved
                </p>
              </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->
   
    <?php wp_footer(); ?>

    </body>
</html>
