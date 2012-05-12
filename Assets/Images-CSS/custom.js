(function($){
	var $featured = $('#featured'),
		$et_controllers = $('#controllers-wrapper-left'),
		$et_nav = $('#top-menu > ul'),
		$et_mobile_nav_button = $('#mobile_nav'),
		et_featured_width = $featured.width(),
		et_container_width = $('.container').width();
	
	$(document).ready(function(){
		var $recent_work = $('.r-work'),
			main_speed = 450;
			
		$et_nav.superfish({ 
			delay:       300,                            // one second delay on mouseout 
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			speed: 'fast',                          // faster animation speed 
			autoArrows:  true,                           // disable generation of arrow mark-up 
			dropShadows: false                            // disable drop shadows 
		});
		
		$(".entry, .et_pt_blogentry").fitVids();
		
		$recent_work.hover( function(){
			var $recent_work_caption = $(this).find('p'),
				et_window_width = $(window).width(),
				recent_more_link_left,
				recent_zoom_link_right,
				recent_work_caption_height;
				
			//recent_work_caption_height = $recent_work_caption.data('et_height') ? $recent_work_caption.data('et_height') : $recent_work_caption.height();
			recent_work_caption_height = 50;				
			
			if ( et_window_width >= 960 || et_window_width < 480 ){
				recent_more_link_left = recent_zoom_link_right = '62px';
			} else if ( et_window_width >= 768 && et_window_width < 960 ){
				recent_more_link_left = '26%';
				recent_zoom_link_right = '24%';
				recent_work_caption_height = 45;
			} else if ( et_window_width >= 480 && et_window_width < 768 ){
				recent_more_link_left = '33px';
				recent_zoom_link_right = '29px';
			}
			
			$(this).find('a.more').css( { opacity : 0, 'display' : 'block', 'left' : '0' }).stop(true,true).animate( { opacity: 1, 'left' : recent_more_link_left }, main_speed );
			$(this).find('a.zoom').css( { opacity : 0, 'display' : 'block', 'right' : '0' }).stop(true,true).animate( { opacity: 1, 'right' : recent_zoom_link_right }, main_speed );
			
			if ( et_window_width > 480 ) $recent_work_caption.data('et_height',recent_work_caption_height).css( { opacity : 0, 'display' : 'block', 'height' : '0', 'visibility' : 'visible' }).stop(true,true).animate( { opacity: 1, 'height' : recent_work_caption_height + 'px' }, main_speed );
		}, function(){
			var et_window_width = $(window).width();
			
			$(this).find('a.more').stop(true,true).animate( { opacity: 0, 'left' : '0' }, main_speed );
			$(this).find('a.zoom').stop(true,true).animate( { opacity: 0, 'right' : '0' }, main_speed );
			
			if ( et_window_width > 480 ) $(this).find('p').stop(true,true).animate( { opacity: 0, 'height' : '0' }, main_speed );
			else $(this).find('p').css( 'opacity', '1' );
		} );
		
		et_search_bar();
		
		var $comment_form = jQuery('form');
		$comment_form.find('input, textarea').each(function(index,domEle){
			var $et_current_input = jQuery(domEle),
				$et_comment_label = $et_current_input.siblings('label'),
				et_comment_label_value = $et_current_input.siblings('label').text();
			if ( $et_comment_label.length ) {
				$et_comment_label.hide();
				if ( $et_current_input.siblings('span.required') ) { 
					et_comment_label_value += $et_current_input.siblings('span.required').text();
					$et_current_input.siblings('span.required').hide();
				}
				$et_current_input.val(et_comment_label_value);
			}
		}).live('focus',function(){
			var et_label_text = jQuery(this).siblings('label').text();
			if ( jQuery(this).siblings('span.required').length ) et_label_text += jQuery(this).siblings('span.required').text();
			if (jQuery(this).val() === et_label_text) jQuery(this).val("");
		}).live('blur',function(){
			var et_label_text = jQuery(this).siblings('label').text();
			if ( jQuery(this).siblings('span.required').length ) et_label_text += jQuery(this).siblings('span.required').text();
			if (jQuery(this).val() === "") jQuery(this).val( et_label_text );
		});

		$comment_form.find('input#submit').click(function(){
			if (jQuery("input#url").val() === jQuery("input#url").siblings('label').text()) jQuery("input#url").val("");
		});

		
		if ( $('ul.et_disable_top_tier').length ) $("ul.et_disable_top_tier > li > ul").prev('a').attr('href','#');
		
		function et_search_bar(){
			var $searchform = jQuery('#navigation div#search-form'),
				$searchinput = $searchform.find("input#searchinput"),
				searchvalue = $searchinput.val();
				
			$searchinput.focus(function(){
				if (jQuery(this).val() === searchvalue) jQuery(this).val("");
			}).blur(function(){
				if (jQuery(this).val() === "") jQuery(this).val(searchvalue);
			});
		}
	});
	
	function et_center_slider(){
		var et_slider_width = $featured.width(),
			et_controllers_width = $et_controllers.innerWidth(),
			et_controllers_left = ( et_slider_width / 2 ) - ( et_controllers_width / 2 );

		$et_controllers.css( { 'left' : et_controllers_left, 'visibility' : 'visible' } );
	}
	
	$(window).load(function() {	
		if ( $featured.length ){
			et_slider_settings = {
				manualControls: 'li a',
				controlsContainer: '#featured #controllers-wrapper',
				slideshow: false
			}
	
			if ( $featured.is('.et_slider_auto') ) {
				var et_slider_autospeed_class_value = /et_slider_autospeed_(\d+)/g
					et_slider_autospeed = et_slider_autospeed_class_value.exec( $featured.attr('class') );
				
				et_slider_settings.slideshow = true;
				et_slider_settings.slideshowSpeed = et_slider_autospeed[1];
				
				if ( $featured.is('.et_slider_pause') ) et_slider_settings.pauseOnHover = true;
				if ( $featured.is('.et_slider_slide') ) et_slider_settings.animation = 'slide';
			}
			
			$featured.flexslider( et_slider_settings );
			
			et_center_slider();
		}
	});
	
	if ( $featured.length ){
		$(window).resize( function(){
			if ( et_featured_width != $featured.width() ) { 
				et_center_slider();
				et_featured_width = $featured.width();
			}
		});
	}
	
	if ( et_container_width <= 480 ){
		$et_nav.removeClass('nav').addClass('mobile_nav');
	}
	
	$(window).resize( function(){
		if ( et_container_width != $('.container').width() ) { 
			et_container_width = $('.container').width();
			if ( et_container_width <= 480 ){ 
				$et_nav.removeClass('nav').addClass('mobile_nav').css({ 'display' : 'none', 'opacity' : '0', 'height' : '0' });
				$et_mobile_nav_button.removeClass( 'opened' ).addClass( 'closed' );
			} else { 
				$et_nav.removeClass('mobile_nav').addClass('nav').css({ 'display' : 'block', 'opacity' : '1', 'height' : '100%' });
			}
		}
	});
	
	$et_mobile_nav_button.click( function(){
		if ( $(this).hasClass('closed') ){
			$(this).removeClass( 'closed' ).addClass( 'opened' );
			$et_nav.css({ opacity : 0, 'display' : 'block', height : 0 }).animate( { opacity: 1, height: '100%' }, 500 );
		} else {
			$(this).removeClass( 'opened' ).addClass( 'closed' );
			$et_nav.animate( { opacity: 0, height: 0 }, 500, function(){
				$(this).css( { 'display' : 'none' } );
			} );
		}
		return false;
	} );
})(jQuery)