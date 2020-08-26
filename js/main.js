//force secure version of site
if (location.protocol !== 'https:') {
    location.replace(`https:${location.href.substring(location.protocol.length)}`);
}
jQuery(window).on('load', function() {
    jQuery('#ftco-loader').removeClass('show');
     setTimeout(function(){
        AOS.refresh();
    }, 500);
});
setTimeout(function(){
    jQuery('#ftco-loader').removeClass('show');
}, 6000);
(function($) {
    console.log('main loaded');
    var page = data.page,
        portal_url = 'http://richcopropertysolutions.com/admin',
        admin_url = data.admin_url;
        //portal_url = 'http://localhost/portal/';
    
    if(page === 'vendors'){
        fix_vendor_container();
        $(window).on('resize',function(){
            fix_vendor_container();
        });
        $("#goto_signup").click(function (){
            $('html, body').animate({
                scrollTop: $("#signup").offset().top
            }, 2000);
        });
        register_vendors(data.register_vendors);
        enable_signup_form();
    }else if(page === 'clients'){
        enable_slideshow();
        enable_signup_form();
        $('#client_login_link').on('click',function(e){
            e.preventDefault();
            window.location = admin_url;
        });
        register_clients(data.register_clients);
    }
    $('#contact_us_btn').on('click',function(e){
        e.preventDefault();
        console.log('click');
        
        var name = $('#contact_name').val(),
           email = $('#contact_email').val(),
           phone = $('#contact_phone').val(),
           business = $('#contact_business').val(),
           message = $('#contact_message').val(),
           contact_form = data.contact_form,
           error = false, msg = '';
           
           if(name.length < 1){ error = true; msg = 'Please enter your name.'; }
           
           if(!isEmail(email)){  error = true; msg = 'Please enter a valid email address.'; }
           
           if(phone.length < 1){ error = true; msg = 'Please enter a valid phone number.'; }
           
           if(message.length < 1){ error = true; msg = 'Please enter a message.'; }
           
           if(!error){
                var contact_data = {
                    'name':name,
                    'email':email,
                    'phone':phone,
                    'business':business,
                    'message':message
                }
                $.post( contact_form, contact_data, function( response ) {
                    console.log(JSON.stringify(response));
                    var output = response.msg;//load json data from server and output message
                    if(response.error === 1){ //error?
                        $( "#contact_result" ).hide().html( output ).slideDown(1000);//show error message
                    }else{//success
                        $( "#contact_result" ).hide().html( output ).slideDown(1000);//show success message
                    }
                },'JSON');
            }else{
                var error = "<p class='alert alert-danger'>"+msg+"</p>";
                $( "#contact_result" ).hide().html( error ).slideDown(1000);//show success message
            }
    });
    $('#mouse-wheel, .mouse-icon').on('click',function(e){
        e.preventDefault();
        scroll('#news');
    });

    $('#play-vendor').on('click',function(e){
        e.preventDefault();
        var playing = true;
       console.log('play');
       var overlay = $(this).find('.overlay-vend');overlay.removeClass('overlay-play');
       var playbtn = $(this).find('fa-play-circle');
       var vid = $('#video')[0];vid.play();
        $(vid).on('ended',function(){
            overlay.addClass('overlay-play');
            playing = false;
            playbtn.addClass('fa-play-circle');
            playbtn.css('display','block');
        });
    });
    
    if(window.location.hash) {
      var hash = window.location.hash; //Puts hash in variable, and removes the # character
      if($(hash).length){
        scroll(hash);
      }
    } 

    "use strict";
    
    //init aos
    AOS.init({
        duration: 900,
        easing: 'slide'
    });
    
    //about page start
    //rotate chevron dow for chevron up
    $('#accordion button.btn').on('click',function(){
           $(this).find('svg.svg-inline--fa').toggleClass('fa-rotate-180');
    });
                
    //add button to header
    $('#ftco-nav').append('<div align="center"><button class="btn btn-primary margin-nav" id="show_login">Login</button></div>');
    $('#show_login').on('click',function(){
        window.location = portal_url;
    });
    //add active classes to nav  menu
    $('#hamburger_menu li').each(function(){
        var hamb_text = $(this).find('a').text();
        if(page){//if not false (it exists)
            if(page === 'front_page'){page = 'home';}
            if(page === 'about'){page = 'about us';}
            if(hamb_text.toLowerCase() === page.toLowerCase() ){
                $(this).addClass('active');
            }
        }
        //add classes to menu for styling (lazy hack)
        if(!$(this).hasClass('menu-item')){$(this).addClass('menu-item');}
        if(!$(this).find('a').hasClass('nav-link')){$(this).find('a').addClass('nav-link');}
    });

    //post page style edits for comments section (yeah. its lazy.)
    $('.comment-form-comment label').html(' ');
    $('.comment-form-author').addClass('col-4');
    $('.comment-form-email').addClass('col-4');
    $('.comment-form-url').addClass('col-4');

    $('.owl-carousel').owlCarousel({
                center: true,
                loop: true,
                autoplay:true,
                items:3,
                margin: 0,
                stagePadding: 0,
                nav: false,
                responsive:{
                    0:{
                        items: 1
                    },
                    650:{
                        items:3
                    }  
                }
        });

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
                
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});

	// scroll
	var scrollWindow = function() {
            var navbar = $('.ftco_navbar'), wpbar = $('#wpadminbar');
            $('.dropdown-menu').css('background',$(navbar).css('background'));
            $(window).on('resize',function(){
                var adjust_nav_at_top = (navbar.css('position') === 'absolute' && wpbar.css('position') === 'fixed'),
                adjust_nav_scrolled = (navbar.css('position') === 'fixed' && wpbar.css('position') === 'fixed');

                if(wpbar.length){
                    if (navbar.hasClass('scrolled')){//nav scrolled
                        if(adjust_nav_scrolled){
                            if(wpbar.css('position') !== 'absolute')navbar.css('top',wpbar.height()+'px');
                        }else{
                            navbar.css('top','0');
                        }
                    }else{//nav not scrolled (at top)
                        if(adjust_nav_at_top){
                            navbar.css('top',wpbar.height()+'px');
                        }else{
                            navbar.css('top','0');
                        }
                    }
                }else{
                    navbar.css('top','0');
                }
            });
            $(window).scroll(function(){
                var $w = $(this),st = $w.scrollTop(), navbar = $('.ftco_navbar'),
                sd = $('.js-scroll-wrap'), wpbar = $('#wpadminbar'),
                adjust_nav_at_top = (navbar.css('position') === 'absolute' && wpbar.css('position') === 'fixed'),
                adjust_nav_scrolled = (navbar.css('position') === 'fixed' && wpbar.css('position') === 'fixed');

                if (st > 150) {//nav scrolled
                        if ( !navbar.hasClass('scrolled') ) {
                                navbar.addClass('scrolled');
                                $('.dropdown-menu').css('background',$(navbar).css('background'));
                        }
                        if (adjust_nav_scrolled){navbar.css('top',wpbar.height()+'px');}
                        else{navbar.css('top','0');}
                } 
                if (st < 150) {//nav near top 
                        if ( navbar.hasClass('scrolled') ) {
                                navbar.removeClass('scrolled sleep');
                                $('.dropdown-menu').css('background',$(navbar).css('background'));
                        }
                        if(adjust_nav_at_top){navbar.css('top',wpbar.height()+'px');}
                        else{navbar.css('top','0');}
                } 
                if ( st > 350 ) {//drop-down nav
                        if ( !navbar.hasClass('awake') ) {
                                navbar.addClass('awake');
                            }
                        if(sd.length > 0) {
                                sd.addClass('sleep');
                        }
                }
                if ( st < 350 ) {//pull-up nav
                        if ( navbar.hasClass('awake') ) {
                                navbar.removeClass('awake');
                                navbar.addClass('sleep');
                        }
                        if(sd.length > 0) {
                                sd.removeClass('sleep');
                        }
                }
            });
	};
	scrollWindow();

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
        
	// magnific popup
        /*
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });

  $('[data-toggle="popover"]').popover()
	$('[data-toggle="tooltip"]').tooltip()
*/
         
        
        /*
         * removed below
         */
        /*
         	// Scrollax
   $.Scrollax();


	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });
    
    
    
    
    

	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();
    
    
    
    
    
    	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();
    
    
    
    
    
    
	var counter = function() {
		
		$('#section-counter, .hero-wrap, .ftco-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();
         */
        
function enable_slideshow(){
    $("#slideshow > img:gt(0)").hide();

    setInterval(function() { 
      $('#slideshow > img:first')
        .fadeOut(3000)
        .next()
        .fadeIn(3000)
        .end()
        .appendTo('#slideshow');
    },  5000);
}
//dropdown_menu();
function dropdown_menu(){
    
    $('.navbar-dark .navbar-nav .menu-item a ').each(function(){
        var anchor = $(this);
        var menu = $(anchor).find('.dropdown-menu');
        if($(menu)){
            $(menu_anchor).on('click',function(){
                console.log('click menu');
            });
            var menu_anchor = $(menu).find('a');
            if(menu_anchor){
                console.log('menu_anchor');
                $(menu_anchor).on('click',function(){
                    console.log('click menu anchor');
                });
            }
        }
        
                    //var nav = $(this).attr('href');
                    //window.location.href = nav;
    });
}
//add_menu_hover();
function add_menu_hover(){
    var navbar = $('#ftco-navbar'),
        hamburger_menu = $('#hamburger_menu'),
        login_btn = $('#show_login');
    $(hamburger_menu).find('li').each(function(){
        var list_item = $(this),//this ;)
            list_item_anchor = $(this).find('a'),//list anchor
            text = $(this).find('a.nav-link').text(),//menu item name
            dropdown_link = false,//if this is a dropdown item
            id;//id of anchor
        console.log('link item: '+text);
        if(text === 'Home'){
            
        }else if(text === 'Services'){
            
        }else if(text === 'About Us'){
            console.log('about checks');
            dropdown_link = true;
            id = 'about';
            $(list_item_anchor).attr('id',id);
            $(list_item_anchor).append('<div class="dropdown-menu" aria-labelledby="'+id+'">'
                    +'<a class="dropdown-item" href="about/#history">History</a>'
                    +'<a class="dropdown-item" href="careers/#values">Values</a>'
                    +'</div>'
                    );
        }else if(text === 'Careers'){
            
        }else if(text === 'Contact'){
            
        }else if(text === 'Vendors'){
            
        }
        if(dropdown_link){
            $(list_item).addClass('dropdown');
            $(list_item_anchor).addClass('dropdown-toggle');
            $(list_item_anchor).attr('data-toggle','dropdown');
            $(list_item_anchor).attr('aria-haspopup','true');
            $(list_item_anchor).attr('data-expanded','false');
        }
    }); 
}
//enable_login_toggle();
function enable_login_toggle(){
    var menu = $('#ftco-nav');
    var navbar = $('.ftco_navbar');
    var login = $('#login');
    var triangle = $('.login-triangle');
    var is_menu_button_visible = ($('button.navbar-toggler').css('display') !== 'none');
    var show_form_btn = $('#show_login');
    var opacity_click, slider_click;
    if(is_menu_button_visible){
        remove_triangle(triangle);//remove litte triangle
        $(login).css('display','none');// hide for a second
        $(login).addClass('slide-in');//put in visible area
        $(login).addClass('no-opacity');//prepare fade-in        
        setTimeout(function(){ $(login).css('display','block'); },1000);//re-show after animation completes
        $(show_form_btn).on('click',function(){$(login).toggleClass('no-opacity');});//set click event
        opacity_click = true;
        $('.navbar-toggler').on('click',function(){
            if($('#ftco-nav').hasClass('show')){
                if(!$(login).hasClass('no-opacity')){$(login).addClass('no-opacity');}
            }
        });
    }else{
        $(show_form_btn).on('click',function(){$(login).toggleClass('slide-in');});//set click evnt
        slider_click = true;
    }
    
    $(window).on('scroll',function(){
        if($(navbar).css('position') !== 'fixed'){//nav is at top - position should be absolute for login form
            if($(login).css('position') !== 'absolute')$(login).css('position','absolute');//don't constantly add attribute
        }else{//nav is fixed - login form needs to be fixed
            if($(login).css('position') !== 'fixed')$(login).css('position','fixed');//don't constantly add attribute
        }
        is_menu_button_visible = ($('button.navbar-toggler').css('display') !== 'none');
        if(is_menu_button_visible){//yes menu btn
            remove_triangle(triangle);//remove litte triangle
            if(!$(login).hasClass('slide-in')){$(login).addClass('slide-in');}//put in visible area
        }else{//no menu btn
            add_triangle(triangle);
            if($(login).hasClass('no-opacity')){$(login).removeClass('no-opacity');}//no menu means we need to see it always!
        }
    });
    
    //this gets buggy at this point because we set both click events and can't disable one or the other
    $(window).on('resize',function(){
        is_menu_button_visible = ($('button.navbar-toggler').css('display') !== 'none');
        if(is_menu_button_visible){
            remove_triangle(triangle);//remove litte triangle            
            $(login).css('display','none');// hide for a second
            if(!$(login).hasClass('slide-in')){$(login).addClass('slide-in');}//put in visible area
            $(login).css('right','0');//bug fix?
            if(!$(login).hasClass('no-opacity')){ $(login).addClass('no-opacity');}//remove opacity
            setTimeout(function(){ $(login).css('display','block'); },1000);//re-show after animation completes
            if(!opacity_click){//event not set!
                $(show_form_btn).on('click',function(){$(login).toggleClass('no-opacity');});//set click event
                opacity_click = true;//mark set event
            }
        }else{
            add_triangle(triangle);
            if($(login).hasClass('slide-in')){$(login).removeClass('slide-in');}
            $(login).css('right','-50vw');//bug fix?
            //slider_click not enabled
            if(!slider_click){//event not set
                $(show_form_btn).on('click',function(){$(login).toggleClass('slide-in');});//set click evnt
                slider_click = true;//mark set event
            }
        }
    });
}
function remove_triangle(triangle_element){
        if($(triangle_element).hasClass('login-triangle')){
            $(triangle_element).removeClass('login-triangle');
        }
}
function add_triangle(triangle_element){
            if(!$(triangle_element).hasClass('login-triangle')){
                $(triangle_element).addClass('login-triangle');
            }
}
function fix_vendor_container(){
    var navbar = $('.ftco_navbar');
    var pos = (navbar.css('position'));
    
    if(pos === 'absolute'){
        $('.phrase-container').removeClass('mt-100').addClass('mt-200');
    }else if(pos === 'relative'){
        $('.phrase-container').removeClass('mt-200').addClass('mt-100');
    }
}

function scroll(hash){
    $('html, body').animate({scrollTop: $(hash).offset().top},2000);
}

var param = function param(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
function enable_signup_form(){
        //reset fields on input click
    $('#signup input').on('click',function(){
        $('#signup input').each(function(){
            if($(this).css('border-color') === 'rgb(255, 0, 0)'){//red
                $(this).css('border-color', 'rgb(245,245,245');
            }
        });
        $('#vendors_result').slideUp(1000).html('');
    });
    $('#signup input').each(function(){
        $(this).on('keyup',function(){
            if($(this).val().length > 0){//red
                $(this).parent().find('label').find('span').css('transform','translate3d(0, 200%, 0)').css('-webkit-transform','translate3d(0, 200%, 0)');
                $(this).parent().find('label').find('span').css('-webkit-transform','translate3d(0, 200%, 0)');
                $(this).parent().find('label').css('transform','translate3d(0, 0, 0)').css('-webkit-transform','translate3d(0, 0, 0)');
            }
        });
    });
}
function register_vendors(page){
    //submit
    $('#vendors_signup').on('click',function(){
        var name = $('#name').val(),
            phone = $('#phone').val(),
            email = $('#email').val(),
            address = $('#address').val(),
            background = $('#background').val(),
            years = $('#years').val(),
            coverage = $('#coverage').val(),
            subcontractors = $('#subcontractors').val(),
            comments = $('#comments').val(),
            company = $('#company').val(),
            valid = true, error = '';
            
            if(name.length < 4){
                error = error + "Enter your full name. ";
                valid = false;
                $('#name').css('border-color','red');
            }
            if(phone.length < 10){
                error = error + "Phone number must be a 10 digit number. ";
                valid = false;
                $('#phone').css('border-color','red');
            }
            if(!isEmail(email)){
                $('#email').css('border-color','red');
                error = error + "Invalid Email! ";
                valid = false;
            }
            if(address.length < 1){
                error = error + "Enter an address. ";
                valid = false;
                $('#address').css('border-color','red');
            }
            if(background.length < 1){
                error = error + "Can you pass a background check? ";
                valid = false;
                $('#background').css('border-color','red');
            }
            if(years.length < 1){
                error = error + "Enter years of experience or 0 for none. ";
                valid = false;
                $('#years').css('border-color','red');
            }
            if(coverage.length < 1){
                error = error + "Enter your coverage area. ";
                valid = false;
                $('#coverage').css('border-color','red');
            }
            if(subcontractors.length < 1){
                error = error + "Do you use subcontractors? ";
                valid = false;
                $('#subcontractors').css('border-color','red');
            }
            if(valid){
                //console.log('valid');
                var data = {
                    'name':name,
                    'phone':phone,
                    'email':email,
                    'address':address,
                    'background':background,
                    'years':years,
                    'coverage':coverage,
                    'subcontractors':subcontractors,
                    'company':company,
                    'message':comments
                };
                var output = "";//for final message
                $.post( page, data, function( response ) {
                    console.log(JSON.stringify(response));
                    output = response.msg;//load json data from server and output message
                    if(response.error === 1){ //error?
                        $( "#vendors_result" ).html( output ).slideDown(1000);//show error message
                    }else{//success
                        $( "#vendors_result" ).html( output ).slideDown(1000);//show success message
                        setTimeout(function(){
                            //window.location = redirect;
                        },5000);
                    }
                },'JSON');
            }else{
                console.log('invalid');
                $('#vendors_result').hide().html('<p class="alert alert-danger">'+error+'</p>').slideDown(1000);
            }
    });
}
function register_clients(page){
    //submit
    $('#clients_signup').on('click',function(){
        var name = $('#name').val(),
            phone = $('#phone').val(),
            email = $('#email').val(),
            address = $('#address').val(),
            city = $('#city').val(),
            state = $('#state').val(),
            zip = $('#zip').val(),
            company = $('#company').val(),
            comments = $('#comments').val(),
            valid = true, error = '';
            
            if(name.length < 4){
                error = error + "Enter your full name. ";
                valid = false;
                $('#name').css('border-color','red');
            }
            if(phone.length < 10){
                error = error + "Phone number must be a 10 digit number. ";
                valid = false;
                $('#phone').css('border-color','red');
            }
            if(!isEmail(email)){
                $('#email').css('border-color','red');
                error = error + "Invalid Email! ";
                valid = false;
            }
            if(address.length < 1){
                error = error + "Enter an address. ";
                valid = false;
                $('#address').css('border-color','red');
            }
            if(city.length < 1){
                error = error + "Please enter a city. ";
                valid = false;
                $('#city').css('border-color','red');
            }
            if(state.length < 1){
                error = error + "Please enter a state. ";
                valid = false;
                $('#state').css('border-color','red');
            }
            if(zip.length < 1){
                error = error + "Please enter your zip code. ";
                valid = false;
                $('#zip').css('border-color','red');
            }
            if(company.length < 1){
                error = error + "Please enter you companies name. ";
                valid = false;
                $('#company').css('border-color','red');
            }
            if(valid){
                //console.log('valid');
                var data = {
                    'name':name,
                    'phone':phone,
                    'email':email,
                    'address':address,
                    'city':city,
                    'state':state,
                    'zip':zip,
                    'comments':comments,
                    'company':company
                };
                var output = "";//for final message
                $.post( page, data, function( response ) {
                    console.log(JSON.stringify(response));
                    output = response.msg;//load json data from server and output message
                    if(response.error === 1){ //error?
                        $( "#clients_result" ).html( output ).slideDown(1000);//show error message
                    }else{//success
                        $( "#clients_result" ).html( output ).slideDown(1000);//show success message
                        setTimeout(function(){
                            //window.location = redirect;
                        },5000);
                    }
                },'JSON');
            }else{
                console.log('invalid');
                $('#clients_result').hide().html('<p class="alert alert-danger">'+error+'</p>').slideDown(1000);
            }
    });
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
})(jQuery);
