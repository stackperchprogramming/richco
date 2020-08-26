
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * global data
 */
/* global data */

/*

 * 
 * @param method $ jQuery
 * @param method api wp.customizer(element, @return string)
 * @returns null
 */
( function( $, api ) {
    var home = data.home,
        is_front = data.is_front;
    console.log('is_front: '+data.is_front);
  
    
    if (location.protocol !== 'https:') {
        location.replace(`https:${location.href.substring(location.protocol.length)}`);
    }
    
    /******************************
     * vendors page start
     *****************************/
    //hero
    api( 'vendors_hero', function( value ) {
        value.bind( function( to ) {
                $('#vendors_hero').css('background-image','url('+to+')');
        } );
    } );
    //title
    api( 'vendors_title', function( value ) {
        value.bind( function( to ) {
                $('#vendors_title').html(to);
        } );
    } );
    //title
    api( 'vendors_subtitle', function( value ) {
        value.bind( function( to ) {
                $('#vendors_subtitle').html(to);
        } );
    } );
    //contact_picture
    api( 'contact_picture', function( value ) {
        value.bind( function( to ) {
                $('#contact_picture').html('src',to);
        } );
    } );
    //title
    api( 'vendors_section_title_1', function( value ) {
        value.bind( function( to ) {
                $('#vendors_section_title_1').html(to);
        } );
    } );
    //title
    api( 'vendors_section_text_1_1', function( value ) {
        value.bind( function( to ) {
                $('#vendors_section_text_1_1').html(to);
        } );
    } );
    //title
    api( 'vendors_section_text_2_1', function( value ) {
        value.bind( function( to ) {
                $('#vendors_section_text_2_1').html(to);
        } );
    } );
    //title
    api( 'vendors_section_text_3_1', function( value ) {
        value.bind( function( to ) {
                $('#vendors_section_text_3_1').html(to);
        } );
    } );
    //title
    api( 'vendors_section_vid', function( value ) {
        value.bind( function( to ) {
                $('#vendors_section_vid').attr('src',to);
        } );
    } );
    //title
    api( 'vendors_vid_poster', function( value ) {
        value.bind( function( to ) {
                $('#video').attr('poster',to);
        } );
    } );
    //title
    api( 'vendors_signup_section_title', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_title').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_text', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_text').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_title', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_title').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_title_1', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_title_1').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_title_2', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_title_2').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_title_3', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_title_3').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_text_1', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_text_1').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_text_2', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_text_2').html(to);
        } );
    } );
    //title
    api( 'vendors_signup_section_final_text_3', function( value ) {
        value.bind( function( to ) {
                $('#vendors_signup_section_final_text_3').html(to);
        } );
    } );
    /******************************
     * contact page start
     *****************************/
    //hero
    api( 'contact_hero', function( value ) {
        value.bind( function( to ) {
                $('#contact_hero').css('background-image','url('+to+')');
        } );
    } );
    //title
    api( 'contact_title', function( value ) {
        value.bind( function( to ) {
                $('#contact_title').html(to);
        } );
    } );
    //title
    api( 'contact_subtitle', function( value ) {
        value.bind( function( to ) {
                $('#contact_subtitle').html(to);
        } );
    } );
    //contact_phone
    api( 'contact_phone', function( value ) {
        value.bind( function( to ) {
                $('#contact_phone').html(to);
        } );
    } );
    //contact_address
    api( 'contact_address', function( value ) {
        value.bind( function( to ) {
                $('#contact_address').html(to);
        } );
    } );
    //contact_address
    api( 'contact_address', function( value ) {
        value.bind( function( to ) {
                $('#contact_address').html(to);
        } );
    } );
    //contact_address
    api( 'contact_message_form_title', function( value ) {
        value.bind( function( to ) {
                $('#contact_message_form_title').html(to);
        } );
    } );
  
  /*****************************
   *client
   ***************************/
  
    //section 3  img
    api( 'client_hero', function( value ) {
        value.bind( function( to ) {
                $('#client_hero').css( 'background-image','url('+to+')');
        } );
    } );
    
    //section 2  acc
    api( 'client_title', function( value ) {
        value.bind( function( to ) {
                $('#client_title').html( to);
        } );
    } );
  
    //section 2  acc
    api( 'client_subtitle', function( value ) {
        value.bind( function( to ) {
                $('#client_subtitle').html( to);
        } );
    } );
  
  
    //section 2  acc
    api( 'client_bullet__text_1', function( value ) {
        value.bind( function( to ) {
                $('#client_bullet__text_1').html( to);
        } );
    } );
  
  
    //section 2  acc
    api( 'client_bullet_1', function( value ) {
        value.bind( function( to ) {
                $('#client_bullet_1').html( to);
        } );
    } );
  
    //section 2  acc
    api( 'client_bullet_2', function( value ) {
        value.bind( function( to ) {
                $('#client_bullet_2').html( to);
        } );
    } );
  
    //section 2  acc
    api( 'client_bullet__text_2', function( value ) {
        value.bind( function( to ) {
                $('#client_bullet__text_2').html( to);
        } );
    } );
  
  
    //section 2  acc
    api( 'clients_slideshow_img_1', function( value ) {
        value.bind( function( to ) {
                $('#clients_slideshow_img_1').attr( 'src',to);
        } );
    } );
  
  
  
    //section 2  acc
    api( 'clients_slideshow_img_2', function( value ) {
        value.bind( function( to ) {
                $('#clients_slideshow_img_2').attr( 'src',to);
        } );
    } );
  
  
  
    //section 2  acc
    api( 'clients_slideshow_img_3', function( value ) {
        value.bind( function( to ) {
                $('#clients_slideshow_img_3').attr( 'src',to);
        } );
    } );
  
  
    //section 2  acc
    api( 'client_slideshow_overlay_title', function( value ) {
        value.bind( function( to ) {
                $('#client_slideshow_overlay_title').html(to);
        } );
    } );
  
  
    //section 2  acc
    api( 'client_slideshow_overlay_text', function( value ) {
        value.bind( function( to ) {
                $('#client_slideshow_overlay_text').html( to);
        } );
    } );
  //client_signup_title
  
  
    //section 2  acc
    api( 'client_signup_title', function( value ) {
        value.bind( function( to ) {
                $('#client_signup_title').html( to);
        } );
    } );
    /******************************
     * about page start
     *****************************/
    //hero
    api( 'about_hero', function( value ) {
        value.bind( function( to ) {
                $('#about_hero').css('background-image','url('+to+')');
        } );
    } );
    //title
    api( 'about_title', function( value ) {
        value.bind( function( to ) {
                $('#about_title').html(to);
        } );
    } );
    //img 1
    api( 'about_img_1', function( value ) {
        value.bind( function( to ) {
                $('#about_img_1').attr('src',to);
        } );
    } );
    //section 1 title
    api( 'about_title_1', function( value ) {
        value.bind( function( to ) {
                $('#about_title_1').html(to);
        } );
    } );
    //section 1 phrase
    api( 'about_text_1', function( value ) {
        value.bind( function( to ) {
                $('#about_text_1').html(to);
        } );
    } );
    
    
    
    
    
    
    //img 1
    api( 'about_img_1_2', function( value ) {
        value.bind( function( to ) {
                $('#about_img_1_2').attr('src',to);
        } );
    } );
    //section 1 title
    api( 'about_title_1_2', function( value ) {
        value.bind( function( to ) {
                $('#about_title_1_2').html(to);
        } );
    } );
    //section 1 phrase
    api( 'about_text_1_2', function( value ) {
        value.bind( function( to ) {
                $('#about_text_1_2').html(to);
        } );
    } );
    
    
    
    
    
    
    
    //img 1
    api( 'about_img_1_3', function( value ) {
        value.bind( function( to ) {
                $('#about_img_1_3').attr('src',to);
        } );
    } );
    //section 1 title
    api( 'about_title_1_3', function( value ) {
        value.bind( function( to ) {
                $('#about_title_1_3').html(to);
        } );
    } );
    //section 1 phrase
    api( 'about_text_1_3', function( value ) {
        value.bind( function( to ) {
                $('#about_text_1_3').html(to);
        } );
    } );
    
    
    
    
    
    //section 1 img
    api( 'about_img_1', function( value ) {
        value.bind( function( to ) {
                $('#about_img_1').attr('src',to);
        } );
    } );
    //section 2 img
    api( 'about_img_2', function( value ) {
        value.bind( function( to ) {
                $('#about_img_2').attr('src',to);
        } );
    } );
  
    //section 2  ttl
    api( 'about_title_2', function( value ) {
        value.bind( function( to ) {
                $('#about_title_2').html( to);
        } );
    } );
  
    //section 2  acc
    api( 'about_accordian_question_1', function( value ) {
        value.bind( function( to ) {
                $('#about_accordian_question_1').html( to);
        } );
    } );
  
    //section 2  about_accordian_answer_1
    api( 'about_accordian_answer_1', function( value ) {
        value.bind( function( to ) {
                $('#about_accordian_answer_1').html( to);
        } );
    } );
  
    //section 2  about_accordian_question_2
    api( 'about_accordian_question_2', function( value ) {
        value.bind( function( to ) {
                $('#about_accordian_question_2').html( to);
        } );
    } );
  
    //section 2  about_accordian_answer_2
    api( 'about_accordian_answer_2', function( value ) {
        value.bind( function( to ) {
                $('#about_accordian_answer_2').html( to);
        } );
    } );
  
    //section 2  about_accordian_question_3
    api( 'about_accordian_question_3', function( value ) {
        value.bind( function( to ) {
                $('#about_accordian_question_3').html( to);
        } );
    } );
  
    //section 2  acc
    api( 'about_accordian_answer_3', function( value ) {
        value.bind( function( to ) {
                $('#about_accordian_answer_3').html( to);
        } );
    } );
    //section 3  img
    api( 'about_img_3', function( value ) {
        value.bind( function( to ) {
                $('#about_img_3').css( 'background-image','url('+to+')');
        } );
    } );
  
    //about_title_3
    api( 'about_title_3', function( value ) {
        value.bind( function( to ) {
                $('#about_title_3').html( to);
        } );
    } );
    //about_title_3
    api( 'about_title_3', function( value ) {
        value.bind( function( to ) {
                $('#about_title_3').html( to);
        } );
    } );
    //about_phone
    api( 'about_phone', function( value ) {
        value.bind( function( to ) {
                $('#about_phone').html( to);
        } );
    } );
  //about_btn_text
    api( 'about_btn_text', function( value ) {
        value.bind( function( to ) {
                $('#about_btn_text').html( to);
        } );
    } );
  
    /******************************
     * services page start
     *****************************/
    //hero
    api( 'services_hero', function( value ) {
        value.bind( function( to ) {
                $('#services_hero').css('background-image','url('+to+')');
        } );
    } );
    //title
    api( 'services_title', function( value ) {
        value.bind( function( to ) {
                $('#services_title').html(to);
        } );
    } );
    //title
    api( 'services_intro_phrase', function( value ) {
        value.bind( function( to ) {
                $('#services_intro_phrase').html(to);
        } );
    } );
    
    /**
    * section 1
     */
   //title
    api( 'services_section_title_1', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_1').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_1', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_1').html(to);
        } );
    } );
   //image
    api( 'services_section_image_1', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_1').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_1', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_1').html(to);
        } );
    } );
  
    
    /**
    * section 2
     */
   //title
    api( 'services_section_title_2', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_2').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_2', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_2').html(to);
        } );
    } );
   //image
    api( 'services_section_image_2', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_2').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_2', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_2').html(to);
        } );
    } );
  
  
    
    /**
    * section 3
     */
   //title
    api( 'services_section_title_3', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_3').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_3', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_3').html(to);
        } );
    } );
   //image
    api( 'services_section_image_3', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_3').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_3', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_3').html(to);
        } );
    } );
  
  
    
    /**
    * section 4
     */
   //title
    api( 'services_section_title_4', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_4').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_4', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_4').html(to);
        } );
    } );
   //image
    api( 'services_section_image_4', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_4').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_4', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_4').html(to);
        } );
    } );
  
  
    
    /**
    * section 5
     */
   //title
    api( 'services_section_title_5', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_5').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_5', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_5').html(to);
        } );
    } );
   //image
    api( 'services_section_image_5', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_5').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_5', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_5').html(to);
        } );
    } );
  
  
    
    /**
    * section 6
     */
   //title
    api( 'services_section_title_6', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_6').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_6', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_6').html(to);
        } );
    } );
   //image
    api( 'services_section_image_6', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_6').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_6', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_6').html(to);
        } );
    } );
  
  
    
    /**
    * section 7
     */
   //title
    api( 'services_section_title_7', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_7').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_7', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_7').html(to);
        } );
    } );
   //image
    api( 'services_section_image_7', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_7').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_7', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_7').html(to);
        } );
    } );
  
  
    
    /**
    * section 8
     */
   //title
    api( 'services_section_title_8', function( value ) {
        value.bind( function( to ) {
                $('#services_section_title_8').html(to);
        } );
    } );
   //subtitle
    api( 'services_section_subtitle_8', function( value ) {
        value.bind( function( to ) {
                $('#services_section_subtitle_8').html(to);
        } );
    } );
   //image
    api( 'services_section_image_8', function( value ) {
        value.bind( function( to ) {
                $('#services_section_image_8').attr('src',to);
        } );
    } );
   //image
    api( 'services_section_intro_8', function( value ) {
        value.bind( function( to ) {
                $('#services_section_intro_8').html(to);
        } );
    } );
  
   //image
    api( 'contact_bus_name', function( value ) {
        value.bind( function( to ) {
                $('#contact_bus_name').html(to);
        } );
    } );
  
    /******************************
     * front page start
     *****************************/
    
    api( 'front_page_hero', function( value ) {
        value.bind( function( to ) {
            $('#front-hero').css('background-image','url('+to+')');
        } );
    } );  
    //title
    api( 'front_page_title', function( value ) {
        value.bind( function( to ) {
            $('#title').html(to);
        } );
    } );  
    //subtitle
    wp.customize( 'front_page_subtitle', function( value ) {
        value.bind( function( to ) {
                $('#subtitle').html(to);
        } );
    } );    
    //subtitle
    wp.customize( 'front_page_btntitle', function( value ) {
        value.bind( function( to ) {
                $('#hero-btn').text(to);
        } );
    } );  
    
    /**
     * card 1
     */
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_1', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_1').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_1', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_1').html(to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_1', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_1').html(to);
        } );
    } );  
    //card - image
    wp.customize( 'inspection_card_image_1', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_1').attr('src',to);
        } );
    } ); 
    /**
     * card 2
     */
    //card - image
    wp.customize( 'inspection_card_image_2', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_2').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_2', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_2').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_2', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_2').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_2', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_2').html(to);
        } );
    } );  
    /**
     * card 3
     */
    //card - image
    wp.customize( 'inspection_card_image_3', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_3').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_3', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_3').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_3', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_3').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_3', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_3').html(to);
        } );
    } );  
    /**
     * card 4
     */
    //card - image
    wp.customize( 'inspection_card_image_4', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_4').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_4', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_4').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_4', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_4').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_4', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_4').html(to);
        } );
    } );  
    /**
     * card 5
     */
    //card - image
    wp.customize( 'inspection_card_image_5', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_5').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_5', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_5').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_5', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_5').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_5', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_5').html(to);
        } );
    } );  
    /**
     * card 6
     */
    //card - image
    wp.customize( 'inspection_card_image_6', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_6').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_6', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_6').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_6', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_6').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_6', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_6').html(to);
        } );
    } );  
    /**
     * card 7
     */
    //card - image
    wp.customize( 'inspection_card_image_7', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_7').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_7', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_7').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_7', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_7').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_7', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_7').html(to);
        } );
    } );    
    /**
     * card 8
     */
    //card - image
    wp.customize( 'inspection_card_image_8', function( value ) {
        value.bind( function( to ) {
                $('#inspection_card_image_8').attr('src',to);
        } );
    } );  
    //card - description
    wp.customize( 'front_page_inspect_card_desc_8', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_desc_8').html(to);
        } );
    } );  
    //card - title inspect
    wp.customize( 'front_page_inspect_card_title_8', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_title_8').html(to);
        } );
    } );  
    //card - sub inpect
    wp.customize( 'front_page_inspect_card_subtitle_8', function( value ) {
        value.bind( function( to ) {
                $('#front_page_inspect_card_subtitle_8').html(to);
        } );
    } );  
    wp.customize( 'front_page_posts_title', function( value ) {
        value.bind( function( to ) {
                $('#front_page_posts_title').html(to+'<span></span>');
        } );
    } );  
    
    wp.customize( 'front_page_vendor_phrase', function( value ) {
        value.bind( function( to ) {
                $('#front_page_vendor_phrase').html(to);
        } );
    } );  
    
    
    /****************************
     * footer
     ***************************/
    
    //footer_email
    wp.customize( 'footer_email', function( value ) {
        value.bind( function( to ) {
                $('#footer_email').html(to);
        } );
    } ); 
    //footer_phone
    wp.customize( 'footer_phone', function( value ) {
        value.bind( function( to ) {
                $('#footer_phone').html(to);
        } );
    } ); 
    //title 3
    wp.customize( 'footer_title_3', function( value ) {
        value.bind( function( to ) {
                $('#footer_title_3').html(to);
        } );
    } ); 
    //title 2
    wp.customize( 'footer_title_2', function( value ) {
        value.bind( function( to ) {
                $('#footer_title_2').html(to);
        } );
    } ); 
    //title 1
    wp.customize( 'footer_title_1', function( value ) {
        value.bind( function( to ) {
                $('#footer_title_1').html(to);
        } );
    } ); 
    //catch_phrase
    wp.customize( 'footer_catch_phrase', function( value ) {
        value.bind( function( to ) {
                $('#catch_phrase').html(to);
        } );
    } ); 
    //logo
    wp.customize( 'footer_logo', function( value ) {
        value.bind( function( to ) {
                $('#footer_logo').attr('src',to);
        } );
    } ); 
    
        
    function get_classes_from_id(id){
        return document.getElementById(id).className.split(/\s+/);
    }
    
}( jQuery,wp.customize ) );
