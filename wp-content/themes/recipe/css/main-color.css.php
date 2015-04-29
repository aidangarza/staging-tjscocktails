<?php header('Content-type: text/css'); 
	
	/* HEADER */
	$top_bar_bg_color = recipe_get_option( 'top_bar_bg_color' );
	$top_bar_font = recipe_get_option( 'top_bar_font' );

	/* NAVIGATION */
	$navigation_bg_color = recipe_get_option( 'navigation_bg_color' );
	$navigation_font_color = recipe_get_option( 'navigation_font_color' );
	$navigation_active_color = recipe_get_option( 'navigation_active_color' );
	$subnavigation_bg_color = recipe_get_option( 'subnavigation_bg_color' );
	$subnavigation_font_color = recipe_get_option( 'subnavigation_font_color' );
	$subnavigation_active_color = recipe_get_option( 'subnavigation_active_color' );
	$subnavigation_border_color = recipe_get_option( 'subnavigation_border_color' );
	$navigation_font = recipe_get_option( 'navigation_font' );
	$navigation_font_size = recipe_get_option( 'navigation_font_size' );

	/* TEXT */
	$text_font = recipe_get_option( 'text_font' );
	$text_font_size = recipe_get_option( 'text_font_size' );
	$text_line_height = recipe_get_option( 'text_line_height' );

	$title_font = recipe_get_option( 'title_font' );
	$h1_font_size = recipe_get_option( 'h1_font_size' );
	$h1_line_height = recipe_get_option( 'h1_line_height' );
	$h2_font_size = recipe_get_option( 'h2_font_size' );
	$h2_line_height = recipe_get_option( 'h2_line_height' );
	$h3_font_size = recipe_get_option( 'h3_font_size' );
	$h3_line_height = recipe_get_option( 'h3_line_height' );
	$h4_font_size = recipe_get_option( 'h4_font_size' );
	$h4_line_height = recipe_get_option( 'h4_line_height' );
	$h5_font_size = recipe_get_option( 'h5_font_size' );
	$h5_line_height = recipe_get_option( 'h5_line_height' );
	$h6_font_size = recipe_get_option( 'h6_font_size' );
	$h6_line_height = recipe_get_option( 'h6_line_height' );

	/* BODY */
	$body_bg_image = recipe_get_option( 'body_bg_image' );
	$body_bg_image = $body_bg_image['url'];
	$body_bg_color = recipe_get_option( 'body_bg_color' );

	/* MAIN COLORS */
	$main_color = recipe_get_option( 'main_color' );
	$maincolor_btn_font_clr = recipe_get_option( 'maincolor_btn_font_clr' );
	$secondary_color = recipe_get_option( 'secondary_color' );
	$secondarycolor_btn_font_clr = recipe_get_option( 'secondarycolor_btn_font_clr' );

	/* COPYRIGHTS */
	$copyrigths_bg_color = recipe_get_option( 'copyrigths_bg_color' );
	$copyrigths_font_color = recipe_get_option( 'copyrigths_font_color' );

?>
/* HEADER */
.top-bar{
	background: <?php echo $top_bar_bg_color; ?>;	
}

.account-action .btn{
	color: <?php echo $top_bar_font; ?>
}

.account-action .btn:hover{
	background: transparent;
	color: <?php echo $top_bar_font; ?>
}

/* NAVIGATION */
.nav.navbar-nav li a{
	font-family: "<?php echo str_replace( '+', " ", $navigation_font ) ?>", sans-serif;
	font-size: <?php echo $navigation_font_size ?>;
}

.nav.navbar-nav > li li{
	border-color: <?php echo $subnavigation_border_color; ?>;
}

.navigation-bar{
	background: <?php echo $navigation_bg_color ?>;	
}

.nav.navbar-nav li a{
	color: <?php echo $navigation_font_color ?>;
}

.navbar-toggle,
#navigation .nav.navbar-nav li.open > a,
#navigation .nav.navbar-nav li > a:hover,
#navigation .nav.navbar-nav li > a:focus ,
#navigation .nav.navbar-nav li > a:active,
#navigation .nav.navbar-nav li.current > a,
#navigation .navbar-nav li.current-menu-parent > a, 
#navigation .navbar-nav li.current-menu-ancestor > a, 
#navigation .navbar-nav > li.current-menu-item  > a{
	color: <?php echo $navigation_active_color ?>;
	background: <?php echo $navigation_bg_color ?>;
}

.nav.navbar-nav li li a{
	color: <?php echo $subnavigation_font_color ?>;
	background: <?php echo $subnavigation_bg_color ?>;
}

#navigation .nav.navbar-nav li > a.main-search:hover, 
#navigation .nav.navbar-nav li > a.main-search:focus,
#navigation .nav.navbar-nav li > a.main-search:active{
	background: transparent;
}

#navigation .nav.navbar-nav li li a:hover,
#navigation .nav.navbar-nav li li a:active,
#navigation .nav.navbar-nav li li a:focus,
#navigation .nav.navbar-nav li.current > a,
#navigation .navbar-nav li li.current-menu-parent > a, 
#navigation .navbar-nav li li.current-menu-ancestor > a, 
#navigation .navbar-nav li li.current-menu-item  > a{
	color: <?php echo $subnavigation_active_color ?>;
	background: <?php echo $subnavigation_bg_color ?>;
}

/* BODY */
body{
	background-color: <?php echo $body_bg_color ?>;
	background-image: url( <?php echo $body_bg_image ?> );
	font-family: "<?php echo str_replace( '+', " ", $text_font ) ?>", sans-serif;
	font-size: <?php echo $text_font_size ?>;
	line-height: <?php echo $text_line_height ?>;
}

h1,h2,h3,h4,h5,h6{
	font-family: "<?php echo str_replace( '+', " ", $title_font ) ?>", sans-serif;
}

h1{
	font-size: <?php echo $h1_font_size ?>;
	line-height: <?php echo $h1_line_height ?>;
}

h2{
	font-size: <?php echo $h2_font_size ?>;
	line-height: <?php echo $h2_line_height ?>;
}

h3{
	font-size: <?php echo $h3_font_size ?>;
	line-height: <?php echo $h3_line_height ?>;
}

h4{
	font-size: <?php echo $h4_font_size ?>;
	line-height: <?php echo $h4_line_height ?>;
}

h5{
	font-size: <?php echo $h5_font_size ?>;
	line-height: <?php echo $h5_line_height ?>;
}

h6{
	font-size: <?php echo $h6_font_size ?>;
	line-height: <?php echo $h6_line_height ?>;
}

/* MAIN COLOR */
a, a:hover, a:focus, a:active, a:visited,
a.grey:hover,
.section-title i,
.blog-title:hover h4, .blog-title:hover h5,
.next-prev a:hover .fa,
.blog-read a, .blog-read a:hover, .blog-read a:active, .blog-read a:visited, .blog-read a:focus, .blog-read a:visited:hover,
.fake-thumb-holder .post-format,
.comment-reply-link:hover,
.category-list .icon,
.widget .category-list li:hover .icon,
.my-menu li.active a, .my-menu li:hover a,
.recipe-actions li:hover, .recipe-actions li:hover a
{
	color: <?php echo $main_color ?>;
}

.user-block-overlay{
	background: rgba( <?php echo recipe_hex2rgb( $main_color ) ?>, 0.2 );	
}

.link-overlay{
	background: rgba( <?php echo recipe_hex2rgb( $main_color ) ?>, 0.8 );	
}

.my-menu li.active, .my-menu li:hover,
.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th{
	background: rgba( <?php echo recipe_hex2rgb( $main_color ) ?>, 0.06 );	
}

.single-recipe:not(.author) .nav-tabs li.active:before{
	border-color: <?php echo $main_color; ?> transparent;
}

blockquote,
.widget-title:after,
.next-prev a:hover .fa
{
	border-color: <?php echo $main_color; ?>;
}

.my-menu li.active, .my-menu li:hover{
	border-left-color: <?php echo $main_color; ?>;
}

table th,
.tagcloud a, .btn, a.btn,
.rslides_nav,
.form-submit #submit,
.nav-tabs > li > a:hover,
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus,
.panel-default > .panel-heading a:not(.collapsed),
.category-list li:hover .icon,
.dashboard-item .badge,
.ingredients-list li:hover .fake-checkbox, .ingredients-list li.checked .fake-checkbox,
.sticky-wrap
{
	color: <?php echo $maincolor_btn_font_clr ?>;
	background-color: <?php echo $main_color; ?>;
}

.tagcloud a:hover, .tagcloud a:focus, .tagcloud a:active,
.btn:hover, .btn:focus, .btn:active,
.form-submit #submit:hover, .form-submit #submit:focus, .form-submit #submit:active,
.pagination a.active
{
	color: <?php echo $secondarycolor_btn_font_clr; ?>;
	background-color: <?php echo $secondary_color; ?>;
}

.blog-read a, .blog-read a:hover, .blog-read a:active, .blog-read a:visited, .blog-read a:focus, .blog-read a:visited:hover{
	background: #ffffff;
	color: <?php echo $main_color ?>;
}

.copyrights{
	background: <?php echo $copyrigths_bg_color; ?>;
	color: <?php echo $copyrigths_font_color; ?>;
}

.copyrights-share, .copyrights-share:visited{
	background: <?php echo $copyrigths_font_color; ?>;	
	color: <?php echo $copyrigths_bg_color; ?>;
}