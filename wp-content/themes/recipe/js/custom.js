jQuery(document).ready(function($){
	"use strict";
	/* HIDE TABLES UNTIL THEY ARE FULLY LOADED */
	$(window).load(function(){
		if( $('.bt-table').length > 0 ){
			$('.pretable-loading').hide();
			$('.bt-table').show();
			$('.fixed-table-toolbar input').attr('placeholder', 'Search for recipes...');
		}
	});
	
	
	/* BUTTON TO TOP */
	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){		
		if( $(window).scrollTop() > 200 ){
			$('.to_top').fadeIn(100);
		}
		else{
			$('.to_top').fadeOut(100);
		}
	});
	
	$('.to_top').click(function(e){
		e.preventDefault();
		$("html, body").stop().animate(
			{
				scrollTop: 0
			}, 
			{
				duration: 1200
			}
		);		
	});
	
	/* RESPONSIVE SLIDES FOR THE GALLERY POST TYPE */
	$('.gallery-slider').responsiveSlides({
		speed: 800,
		auto: false,
		pager: false,
		nav: true,
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>',
	});
	
	/* NAVIGATION */
	function handle_navigation(){
		if ($(window).width() >= 767) {
			$('ul.nav li.dropdown, ul.nav li.dropdown-submenu').hover(function () {
				$(this).addClass('open').find(' > .dropdown-menu').stop(true, true).hide().slideDown(200);
			}, function () {
				$(this).removeClass('open').find(' > .dropdown-menu').stop(true, true).show().slideUp(200);
	
			});
		}
		else{
			$('ul.nav li.dropdown, ul.nav li.dropdown-submenu').unbind('mouseenter mouseleave');
		}
	}
	
	
	$(window).resize(function(){
		setTimeout(function(){
			handle_navigation();
		}, 200);
	});		
	
	//GALERY SLIDER
	function start_slider(){
		$('.post-slider').responsiveSlides({
			speed: 800,
			auto: false,
			pager: false,
			nav: true,
			prevText: '<i class="fa fa-angle-left"></i>',
			nextText: '<i class="fa fa-angle-right"></i>',
		});	
	}
	start_slider();

	/* SUBMIT FORMS */
	$('.submit-live-form').click(function(){
		$(this).parents('form').submit();
	});
	
	$('.submit-form').click(function(){
		var $this = $(this);
		var $form = $this.parents( 'form' );
		var $result = $form.find('.send_result');
		if( $this.find( 'i' ).length == 0 ){
			var $html = $this.html();
			$this.html( $html+' <i class="fa fa-spin fa-spinner"></i>' );
			if( $form.find('#description').length > 0 && typeof tinyMCE !== 'undefined' && $('#wp-description-wrap').hasClass('tmce-active') ){
				var tiny = tinyMCE.get('description').getContent();
				$('#description').val( tiny );
			}
			if( $form.find('#recipe_steps').length > 0 && typeof tinyMCE !== 'undefined' && $('#wp-recipe_steps-wrap').hasClass('tmce-active') ){
				var tiny = tinyMCE.get('recipe_steps').getContent();
				$('#recipe_steps').val( tiny );
			}			
			$.ajax({
				url: ajaxurl,
				data: $form.serialize(),
				method: $form.attr('method'),
				dataType: "JSON",
				success: function(response){
					if( response.message ){
						$result.html( response.message );
					}
					if( response.captcha ){
						$('.captcha-solve').html( response.captcha );
						$('#captcha').val('');
					}
					if( response.url ){
						window.location.href = response.url;
					}
				},
				complete: function(){
					$this.html( $html );
				}
			});
		}
	});
	
	
	/* SUBSCRIBE */
	$('.subscribe').click( function(e){
		e.preventDefault();
		var $this = $(this);
		var $parent = $this.parents('.subscribe-form');		
		
		$.ajax({
			url: ajaxurl,
			method: "POST",
			data: {
				action: 'subscribe',
				email: $parent.find( '.email' ).val()
			},
			dataType: "JSON",
			success: function( response ){
				if( !response.error ){
					$parent.find('.sub_result').html( '<div class="alert alert-success" role="alert"><span class="fa fa-check-circle"></span> '+response.success+'</div>' );
				}
				else{
					$parent.find( '.sub_result' ).html( '<div class="alert alert-danger" role="alert"><span class="fa fa-times-circle"></span> '+response.error+'</div>' );
				}
			}
		})
	} );
	

	
	/* handle favourited*/
	$('.recipe-favourite').click(function(e){
		e.preventDefault();
		var $this = $(this);
		var recipe_id = $this.data('recipe_id');
		
		$.ajax({
			url: ajaxurl,
			method: "POST",
			dataType: "JSON",
			data: {
				action: 'favourite',
				recipe_id: recipe_id
			},
			success: function( response ){
				if( response.status == 'deleted' ){
					if( $this.find('.fa-heart').length > 0 ){
						$this.find('i').attr( 'class', 'fa fa-heart-o' );
						$this.parents('li').data( 'title', response.message );
						$this.parents('li').data("opentips")[0].setContent( response.message );
					}
					else{
						$this.parents('tr').fadeOut(function(){
							$('.table-striped').bootstrapTable('destroy');
							$('a[data-recipe_id="'+recipe_id+'"]').parents('tr').remove();
							$('[data-toggle="table"]').bootstrapTable();
							$('.fixed-table-toolbar input').attr('placeholder', 'Search for recipes...');
						});						
					}
				}
				else if( response.status == 'added' ){
					$this.find('i').attr( 'class', 'fa fa-heart' );
					$this.parents('li').data( 'title', response.message );
					$this.parents('li').data("opentips")[0].setContent( response.message );
				}
				else{
					alert( response.message );
				}
			}
		});
	});		
		
	/* contact script */
	$('.send-contact').click(function(e){
		e.preventDefault();
		var $this = $(this);
		var $html = $this.html();
		$this.append( ' <i class="fa fa-spin fa-spinner"></i>' );		
		$.ajax({
			url: ajaxurl,
			method: "POST",
			data: {
				action: 'contact',
				name: $('.name').val(),
				email: $('.email').val(),
				subject: $('.subject').val(),
				message: $('.message').val()
			},
			dataType: "JSON",
			success: function( response ){
				if( !response.error ){
					$('.send_result').html( '<div class="alert alert-success" role="alert"><span class="fa fa-check-circle"></span> '+response.success+'</div>' );
				}
				else{
					$('.send_result').html( '<div class="alert alert-danger" role="alert"><span class="fa fa-times-circle"></span> '+response.error+'</div>' );
				}
			},
			complete: function(){
				$this.html( $html );
			}
		})
	});
	
	/* MAGNIFIC POPUP FOR THE GALLERY */
	$('.gallery').each(function(){
		var $this = $(this);
		$this.magnificPopup({
			type:'image',
			delegate: 'a',
			gallery:{enabled:true},
		});
	});


	/* MAIN SLIDER */
	var main_images = $('.main-slider img').length;
	function main_slider_load(){
		main_images--
		if( main_images == 0 ){
			var slide_counter = 0;
			$('.slider-caption').each(function(){
				var $this = $(this);
				var $parent = $this.parents('.main-slider-item');
				var source = $parent.find( '.slide-item' );
				var canvasId = $parent.find( 'canvas' ).attr('id');
				$this.height( $this.find('.main-caption-content').outerHeight(true) );

				slide_counter++;
				source.attr('id', 'slide_item_'+slide_counter);
				stackBlurImage('slide_item_'+slide_counter, canvasId, 30, false );
				$parent.find( 'canvas' ).css('height', $('#slide_item_'+slide_counter).height()+'!important');
			});		
			$('.main-slider').owlCarousel({
				pagination: false,
				navigation: false,
				autoPlay: $('.main-slider').data('auto') !== '' ? $('.main-slider').data('auto') : false,
				items: 1,
				stopOnHover: true,
				singleItem: true,
				navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				addClassActive: true,
				afterInit: function(){
					$('.active .slider-caption').css('bottom', '0px');
					$('.active .slider-caption canvas').css('bottom', '0px');
				},
				afterMove: function(){
					$('.owl-item:not(.active) .slider-caption').css('bottom', '-400px');
					$('.owl-item:not(.active) .slider-caption canvas').css('bottom', '400px');				
					$('.active .slider-caption').css('bottom', '0px');
					$('.active .slider-caption canvas').css('bottom', '0px');
				}	
			});
		}
	}
	
	if( $('.main-slider').length > 0 ){
		$('.main-slider img').each(function(){
			if( this.complete ){
				main_slider_load.call(this);
			}
			else{
				$(this).one('load', main_slider_load);
			}
		});

		$(window).resize(function(){
			setTimeout(function(){
				$('.owl-item').each(function(){
					var $this = $(this);
					$this.find('.slider-caption').height( $this.find('.main-caption-content').outerHeight(true) );
					$this.find( 'canvas' ).css('height', $this.find('img[id^="slide_item"]').height()+'!important');
				});			
			}, 500);
		});
	}

	/* MAIN SEARCH */
	$(document).on( 'click', '.main-search' ,function(){
		var $main_search_input = $(this).parents('section').find('.main-search-input');
		if( !$main_search_input.hasClass('open') ){
			$main_search_input.show();
			$main_search_input.animate({
				width: 250,
				paddingLeft: 10,
				paddingRight: 10				
			}, 500, function(){
				$main_search_input.addClass('open')
			} );			
		}
		else{
			$main_search_input.animate({
				width: 0,
				paddingLeft: 0,
				paddingRight: 0
			}, 500, function(){
				$main_search_input.hide();
				$main_search_input.removeClass('open')
			} );
		}
	});

	/* LIKES */
	$('.post-like').click(function(e){
		e.preventDefault();
		var $this = $(this);
		var post_id = $this.data('post_id');
		
		$.ajax({
			url: ajaxurl,
			method: "POST",
			dataType: "JSON",
			data: {
				action: 'likes_views',
				meta: 'likes',
				post_id: post_id
			},
			success: function( response ){
				if( !response.error ){
					if( $this.find('.like-count').length > 0 ){
						$this.find('.like-count').text( response.count );
					}
					else{
						$this.parents('li').data('title', response.count);
						$this.parents('li').data("opentips")[0].setContent( response.count );					
					}
				}
				else{
					alert( response.error );
				}
			}
		});
	});	

	var $single_post = $('input[name="post-id"]');
	if( $single_post.length > 0 ){
		$.ajax({
			url: ajaxurl,
			method: "POST",
			data: {
				action: 'likes_views',
				meta: 'views',
				post_id: $single_post.val()
			},
		});
	}


	/* STICKY NAVIGATION */

	var $navigation_bar = $('.navigation-bar');
	var $sticky_nav = $navigation_bar.clone().addClass('sticky_nav');
	$('body').append( $sticky_nav );
	function sticky_nav(){
		var $admin = $('#wpadminbar');
		if( $admin.length > 0 && $admin.css( 'position' ) == 'fixed' ){
			$sticky_nav.css( 'top', $admin.height() );
		}
		else{
			$sticky_nav.css( 'top', '0' );
		}
	}

	$(window).on('scroll', function(){
		if( $(window).scrollTop() >= $navigation_bar.position().top && $(window).width() > 769 ){
			$sticky_nav.slideDown();
		}
		else{
			$sticky_nav.slideUp();
		}
	});	
	sticky_nav();
	handle_navigation();

	$(window).resize(function(){
		sticky_nav();
	});

	/* REMOVE RECIPE */
	$('.remove-recipe').click(function(){
		var $this = $(this);
		var $html = $this.html();
		var recipe_id = $this.data('recipe_id');
		$this.html( '<i class="fa fa-spin fa-spinner"></i>' );
		$.ajax({
			url: ajaxurl,
			method: "POST",
			data: {
				action: 'remove_recipe',
				recipe_id: recipe_id
			},
			success: function(){
				$this.parents('tr').fadeOut(function(){
					$('.table-striped').bootstrapTable('destroy');
					$('a[data-recipe_id="'+recipe_id+'"]').parents('tr').remove();
					$('[data-toggle="table"]').bootstrapTable();
					$('.fixed-table-toolbar input').attr('placeholder', 'Search for recipes...');

				});
			},
			error: function(){
				$this.html( $html );
			}
		})
	});


	/* FAKE CHECKBOXES */
	$('.fake-checkbox').each(function(){
		var $this = $(this);
		$this.parents('li').click(function(){
			$(this).toggleClass('checked');
		});
	});

	/* REVIEWS */
	$('.comment-review .icon').hover(
		function(){
			var pos = $(this).index();
			var $parent = $(this).parents('.bottom-ratings');
			for( var i=0; i<=pos; i++ ){
				$parent.find('.icon:eq('+i+')').css('color', '#FF8C00');
			}
		},
		function(){
			$(this).parents('.bottom-ratings').find('.icon').each(function(){
				if( !$(this).hasClass('clicked') ){
					$(this).css('color', '');
				}
			});
		}
	);

	$('.comment-review .icon').click(function(){
		var value = $(this).index();
		var $parent = $(this).parents('.bottom-ratings');
		$('#review').val( value + 1 );
		$parent.find('.icon').removeClass('clicked');
		for( var i=0; i<=value; i++ ){
			$parent.find('.icon:eq('+i+')').css('color', '#FF8C00').addClass('clicked');
		}
	});

	/* TOOLTIP */
	$('.tip').each(function(){
		new Opentip( $(this), $(this).data('title'), "", {
			background: '#454545',
			borderWidth: 0,
			shadow: 0
		});	
	});

	/* PRINT RECIPE */
	$('.print-recipe').click(function(){
		$('.print-container').remove();
		$('.sticky_nav').hide();
		var img = $('.featured-image').clone().addClass('print-image');
		var title = $('.post-title').clone().addClass('print-title');
		var details = $('.recipe-details').clone().addClass('print-details');
		$('body').append('<div class="container print-container"></div>');
		$('.print-container').append(img);
		$('.print-container').append(title);
		$('.print-container').append(details);
		window.print();
	});

});