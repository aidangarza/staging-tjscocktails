<?php

	/**********************************************************************
	***********************************************************************
	RECIPE FUNCTIONS
	**********************************************************************/


include( locate_template( 'includes/class-tgm-plugin-activation.php' ) );
include( locate_template( 'includes/widgets.php' ) );
include( locate_template( 'includes/fonts.php' ) );
include( locate_template( 'includes/shortcodes.php' ) );
include( locate_template( 'includes/font-icons.php' ) );
include( locate_template( 'includes/category-icons.php' ) );
include( locate_template( 'includes/menu-extender.php' ) );
include( locate_template( 'includes/gallery.php' ) );
include( locate_template( 'includes/recipe-cat-icon.php' ) );
include( locate_template( 'includes/theme-options.php' ) );

foreach ( glob( dirname(__FILE__).DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR ."shortcodes".DIRECTORY_SEPARATOR ."*.php" ) as $filename ){
	require_once $filename;
}



add_action( 'tgmpa_register', 'recipe_requred_plugins' );

function recipe_requred_plugins(){
	$plugins = array(
		array(
				'name'                 => 'Redux Options',
				'slug'                 => 'redux-framework',
				'source'               => get_stylesheet_directory() . '/lib/plugins/redux-framework.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),	
		array(
				'name'                 => 'Smeta',
				'slug'                 => 'smeta',
				'source'               => get_stylesheet_directory() . '/lib/plugins/smeta.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
		array(
				'name'                 => 'User Avatar',
				'slug'                 => 'wp-user-avatar',
				'source'               => get_stylesheet_directory() . '/lib/plugins/wp-user-avatar.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
		array(
				'name'                 => 'Social Connect',
				'slug'                 => 'social-connect',
				'source'               => get_stylesheet_directory() . '/lib/plugins/social-connect.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),		
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
			'domain'           => 'recipe',
			'default_path'     => '',
			'parent_menu_slug' => 'themes.php',
			'parent_url_slug'  => 'themes.php',
			'menu'             => 'install-required-plugins',
			'has_notices'      => true,
			'is_automatic'     => false,
			'message'          => '',
			'strings'          => array(
				'page_title'                      => __( 'Install Required Plugins', 'recipe' ),
				'menu_title'                      => __( 'Install Plugins', 'recipe' ),
				'installing'                      => __( 'Installing Plugin: %s', 'recipe' ),
				'oops'                            => __( 'Something went wrong with the plugin API.', 'recipe' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                          => __( 'Return to Required Plugins Installer', 'recipe' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'recipe' ),
				'complete'                        => __( 'All plugins installed and activated successfully. %s', 'recipe' ),
				'nag_type'                        => 'updated'
			)
	);

	tgmpa( $plugins, $config );
}

if (!isset($content_width))
	{
	$content_width = 1920;
	}

/* do shortcodes in the excerpt */
add_filter('the_excerpt', 'do_shortcode');
	
/* include custom made widgets */
function recipe_widgets_init(){

	register_sidebar(array(
		'name' => __('Blog Sidebar', 'recipe') ,
		'id' => 'blog',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the blog single page.', 'recipe')
	));	

	register_sidebar(array(
		'name' => __('Recipe Sidebar', 'recipe') ,
		'id' => 'recipe',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the recipe single pages.', 'recipe')
	));		

	register_sidebar(array(
		'name' => __('Page Left Sidebar', 'recipe') ,
		'id' => 'left',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the left side of the page.', 'recipe')
	));	
	
	register_sidebar(array(
		'name' => __('Page Right Sidebar', 'recipe') ,
		'id' => 'right',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the page.', 'recipe')
	));

	register_sidebar(array(
		'name' => __('Bottom Sidebar 1', 'recipe') ,
		'id' => 'bottom-1',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the page.', 'recipe')
	));	

	register_sidebar(array(
		'name' => __('Bottom Sidebar 2', 'recipe') ,
		'id' => 'bottom-2',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the page.', 'recipe')
	));	

	register_sidebar(array(
		'name' => __('Bottom Sidebar 3', 'recipe') ,
		'id' => 'bottom-3',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the page.', 'recipe')
	));	


	register_sidebar(array(
		'name' => __('Bottom Sidebar 4', 'recipe') ,
		'id' => 'bottom-4',
		'before_widget' => '<div class="widget white-block clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => __('Appears on the right side of the page.', 'recipe')
	));		
}

add_action('widgets_init', 'recipe_widgets_init');

function recipe_register_types(){
	register_post_type( 'recipe', array(
		'labels' => array(
			'name' => __( 'Recipes', 'recipe' ),
			'singular_name' => __( 'Recipe', 'recipe' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-book',
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'comments',
			'author'
		)
	));

	$taxonomies = array(
		array(
			'slug' => 'recipe-category',
			'plural' => __( 'Categories', 'recipe' ),
			'singular' => __( 'Category', 'recipe' ),
			'hierarchical' => true
		),
		array(
			'slug' => 'recipe-tag',
			'plural' => __( 'Tags', 'recipe' ),
			'singular' => __( 'Tag', 'recipe' ),
			'hierarchical' => false
		),
		array(
			'slug' => 'recipe-cuisine',
			'plural' => __( 'Cuisines', 'recipe' ),
			'singular' => __( 'Cuisine', 'recipe' ),
			'hierarchical' => true
		),
	);

	for( $i=0; $i<sizeof( $taxonomies ); $i++ ){
		$val = $taxonomies[$i];
		register_taxonomy( $val['slug'], array( 'recipe' ), array(
			'label' => $val['plural'],
			'hierarchical' => $val['hierarchical'],
			'labels' => array(
				'name' 							=> $val['plural'],
				'singular_name' 				=> $val['singular'],
				'menu_name' 					=> $val['singular'],
				'all_items'						=> __( 'All ', 'recipe' ).$val['plural'],
				'edit_item'						=> __( 'Edit ', 'recipe' ).$val['singular'],
				'view_item'						=> __( 'View ', 'recipe' ).$val['singular'],
				'update_item'					=> __( 'Update ', 'recipe' ).$val['singular'],
				'add_new_item'					=> __( 'Add New ', 'recipe' ).$val['singular'],
				'new_item_name'					=> __( 'New ', 'recipe').$val['singular'].__( ' Name', 'recipe' ),
				'parent_item'					=> __( 'Parent ', 'recipe' ).$val['singular'],
				'parent_item_colon'				=> __( 'Parent ', 'recipe').$val['singular'].__( ':', 'recipe' ),
				'search_items'					=> __( 'Search ', 'recipe' ).$val['plural'],
				'popular_items'					=> __( 'Popular ', 'recipe' ).$val['plural'],
				'separate_items_with_commas'	=> __( 'Separate ', 'recipe').strtolower( $val['plural'] ).__( ' with commas', 'recipe' ),
				'add_or_remove_items'			=> __( 'Add or remove ', 'recipe' ).strtolower( $val['plural'] ),
				'choose_from_most_used'			=> __( 'Choose from the most used ', 'recipe' ).strtolower( $val['plural'] ),
				'not_found'						=> __( 'No ', 'recipe' ).strtolower( $val['plural'] ).__( ' found', 'recipe' ),
			),
			'rewrite' => !empty( $val['rewrite'] ) ? $val['rewrite'] : $val['slug']
		
		) );
	}	
}

add_action( 'init', 'recipe_register_types' );
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');

/* total_defaults */
function recipe_defaults( $id ){	
	$defaults = array(
		'share_images' => 'yes',
		'show_top_bar' => 'no',
		'site_logo' => array( 'url' => '' ),
		'site_favicon' => array( 'url' => '' ),
		'cooking-levels' => '',
		'similar_recipes_num' => '3',
		'seo_keywords' => '',
		'seo_description' => '',
		'enable_share' => 'yes',
		'facebook_share' => 'yes',
		'twitter_share' => 'yes',
		'google_share' => 'yes',
		'linkedin_share' => 'yes',
		'tumblr_share' => 'yes',
		'mail_chimp_api' => '',
		'mail_chimp_list_id' => '',
		'inform_user' => 'yes',
		'registration_subject' => '',
		'registration_message' => '',
		'registration_sender_name' => '',
		'registration_sender_email' => '',
		'recover_subject' => '',
		'recover_message' => '',
		'recover_sender_name' => '',
		'recover_sender_email' => '',
		'review_subject' => '',
		'review_message_approved' => '',
		'review_message_declined' => '',
		'review_sender_name' => '',
		'review_sender_email' => '',
		'review_recive_email' => '',
		'top_bar_bg_color' => '#333',
		'top_bar_font' => '#ffffff',
		'navigation_bg_color' => '#ffffff',
		'navigation_font_color' => '#676767',
		'navigation_active_color' => '#6BA72B',
		'subnavigation_bg_color' => '#ffffff',
		'subnavigation_font_color' => '#676767',
		'subnavigation_active_color' => '#6BA72B',
		'subnavigation_border_color' => '#eeeeee',
		'navigation_font' => 'Lato',
		'navigation_font_size' => '14px',
		'text_font' => 'Lato',
		'14px' => '24px',
		'title_font' => 'Ubuntu',
		'h1_font_size' => '38px',
		'h1_line_height' => '1.25',
		'h2_font_size' => '32px',
		'h2_line_height' => '1.25',
		'h3_font_size' => '28px',
		'h3_line_height' => '1.25',
		'h4_font_size' => '22px',
		'h4_line_height' => '1.25',
		'h5_font_size' => '18px',
		'h5_line_height' => '1.25',
		'h6_font_size' => '13px',
		'h6_line_height' => '1.25',
		'body_bg_image' => array( 'url' => '' ),
		'body_bg_color' => '#f5f5f5',
		'main_color' => '#6BA72B',
		'maincolor_btn_font_clr' => '#ffffff',
		'secondary_color' => '#333',
		'secondarycolor_btn_font_clr' => '#ffffff',
		'copyrigths_bg_color' => '#333',
		'copyrigths_font_color' => '#ffffff',
	);
	
	if( isset( $defaults[$id] ) ){
		return $defaults[$id];
	}
	else{
		
		return '';
	}
}

/* get option from theme options */
function recipe_get_option($id){
	global $recipe_options;
	if( isset( $recipe_options[$id] ) ){
		$value = $recipe_options[$id];
		if( isset( $value ) ){
			return $value;
		}
		else{
			return '';
		}
	}
	else{
		return recipe_defaults( $id );
	}
}

	/* setup neccessary theme support, add image sizes */
function recipe_setup(){
	load_theme_textdomain('recipe', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support( "title-tag" );
	add_theme_support('html5', array(
		'comment-form',
		'comment-list'
	));
	register_nav_menu('top-navigation', __('Top Navigation', 'recipe'));
	
	add_theme_support('post-thumbnails',array( 'post', 'page', 'recipe', ));
	add_theme_support('post-formats',array( 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ));
	
	set_post_thumbnail_size( 848, 477, true );
	if (function_exists('add_image_size')){
		add_image_size( 'box-thumb', 400, 225, true );
	}

	add_theme_support('custom-header');
	add_theme_support('custom-background');
	add_editor_style();
}
add_action('after_setup_theme', 'recipe_setup');


/* setup neccessary styles and scripts */
function recipe_scripts_styles(){
	/* bootstrap */
	wp_enqueue_style( 'recipe-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_script('recipe-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', false, false, true);

	wp_enqueue_style( 'recipe-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'recipe-icons', get_template_directory_uri() . '/css/recipe.css' );
	
	$protocol = is_ssl() ? 'https' : 'http';
	/*load selected fonts*/
	$title_font = recipe_get_option( 'title_font' );
	if( !empty( $title_font ) ){
		wp_enqueue_style('recipe-title-font', $protocol.'://fonts.googleapis.com/css?family='.esc_attr( $title_font ).':400,300,700');
	}
	$navigation_font = recipe_get_option( 'navigation_font' );
	if( !empty( $navigation_font ) ){
		wp_enqueue_style('recipe-navigation-font', $protocol.'://fonts.googleapis.com/css?family='.recipe_get_option( 'navigation_font' ).':400,300,700');
	}
	$text_font = recipe_get_option( 'text_font' );
	if( !empty( $text_font ) ){
		wp_enqueue_style('recipe-text-font', $protocol.'://fonts.googleapis.com/css?family='.recipe_get_option( 'text_font' ).':400,300,700');
	}
	
	/* load style.css */
	wp_enqueue_style('recipe-style', get_stylesheet_uri() , array('dashicons'));
	wp_enqueue_style('dynamic-layout', admin_url('admin-ajax.php').'?action=dynamic_css', array());	
	
	if (is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('jquery');
		
	/* responsiveslides */
	wp_enqueue_script( 'recipe-responsiveslides',  get_template_directory_uri() . '/js/responsiveslides.min.js', false, false, true);
	wp_enqueue_script( 'recipe-modernizr',  get_template_directory_uri() . '/js/modernizr.js', false, false, true);

	/* OWL SLIDER */
	if( is_front_page() ){
		wp_enqueue_style( 'recipe-owl-css', get_template_directory_uri() . '/css/owl.carousel.css' );
		wp_enqueue_style( 'recipe-owl-theme-css', get_template_directory_uri() . '/css/owl.theme.css' );
		wp_enqueue_script('recipe-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', false, false, true);
		wp_enqueue_script('recipe-blur', get_template_directory_uri() . '/js/StackBlur.js', false, false, true);
	}

	/* custom */
	wp_enqueue_style( 'recipe-magnific-css', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_script('recipe-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', false, false, true);

	/* OPEN TPPLTIP */
	wp_enqueue_style( 'recipe-tooltip', get_template_directory_uri() . '/css/opentip.css' );
	wp_enqueue_script('recipe-tooltip', get_template_directory_uri() . '/js/opentip.js', false, false, true);
	wp_enqueue_script('recipe-tooltip-adapter', get_template_directory_uri() . '/js/adapter-jquery.js', false, false, true);

	/* bootstrap tables */
	if( is_author() || get_page_template_slug() == 'page-tpl_my_account.php' ){
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_style( 'recipe-bootstrap-table', get_template_directory_uri() . '/css/bootstrap-table.min.css' );
		wp_enqueue_script('recipe-bootstrap-table', get_template_directory_uri() . '/js/bootstrap-table.min.js', false, false, true);	
		wp_enqueue_media();
		wp_enqueue_script('recipe-front-uploader', get_template_directory_uri() . '/js/front-uploader.js', false, false, true);
	}
	
	wp_enqueue_script('recipe-custom', get_stylesheet_directory_uri() . '/js/custom.js', false, false, true);

}
add_action('wp_enqueue_scripts', 'recipe_scripts_styles');


function recipe_admin_scripts_styles(){
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'jquery-ui-dialog' );

	wp_enqueue_style( 'recipe-jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_style('recipe-shortcodes-style', get_template_directory_uri() . '/css/admin.css' );
	wp_enqueue_style('recipe-icons', get_template_directory_uri() . '/css/recipe.css' );
	wp_enqueue_script('recipe-menu', get_template_directory_uri() . '/js/admin.js', false, false, true);	

	if( strpos( $_SERVER['REQUEST_URI'], 'widget' ) !== false ){
		wp_enqueue_media();
		wp_enqueue_script('recipe-shortcodes', get_template_directory_uri() . '/js/shortcodes.js', false, false, true);
	}
}
add_action('admin_enqueue_scripts', 'recipe_admin_scripts_styles');


/* add main css dynamically so it can support changing collors */
function dynaminc_css() {
  require(get_template_directory().'/css/main-color.css.php');
  exit;
}
add_action('wp_ajax_dynamic_css', 'dynaminc_css');
add_action('wp_ajax_nopriv_dynamic_css', 'dynaminc_css');

/* add admin-ajax */
function recipe_custom_head(){
	echo '<script type="text/javascript">var ajaxurl = \'' . admin_url('admin-ajax.php') . '\';</script>';
}
add_action('wp_head', 'recipe_custom_head');

function recipe_smeta_images( $meta_key, $post_id, $default ){
	if(class_exists('SM_Frontend')){
		global $sm;
		return $result = $sm->sm_get_meta($meta_key, $post_id);
	}
	else{		
		return $default;
	}
}

/* check if smeta plugin is installed */
function recipe_get_smeta( $meta_key, $post_data = '', $default ){
	if( !empty( $post_data[$meta_key] ) ){
		return $post_data[$meta_key][0];
	}
	else{
		return $default;
	}
}	
/* add custom meta fields using smeta to post types. */
function recipe_custom_meta(){

	$post_meta_standard = array(
		array(
			'id' => 'iframe_standard',
			'name' => __( 'Input url to be embeded', 'recipe' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Standard Post Information', 'recipe' ),
		'pages' => 'post',
		'fields' => $post_meta_standard,
	);	
	
	$post_meta_gallery = array(
		array(
			'id' => 'gallery_images',
			'name' => __( 'Add images for the gallery', 'recipe' ),
			'type' => 'image',
			'repeatable' => 1
		)
	);

	$meta_boxes[] = array(
		'title' => __( 'Gallery Post Information', 'recipe' ),
		'pages' => 'post',
		'fields' => $post_meta_gallery,
	);	
	
	
	$post_meta_audio = array(
		array(
			'id' => 'iframe_audio',
			'name' => __( 'Input URL for the audio', 'recipe' ),
			'type' => 'text',
		),
		
		array(
			'id' => 'audio_type',
			'name' => __( 'Select type of the audio', 'recipe' ),
			'type' => 'select',
			'options' => array(
				'embed' => __( 'Embed', 'recipe' ),
				'direct' => __( 'Direct Link', 'recipe' )
			)
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Audio Post Information', 'recipe' ),
		'pages' => 'post',
		'fields' => $post_meta_audio,
	);
	
	$post_meta_video = array(
		array(
			'id' => 'video',
			'name' => __( 'Input video URL', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'video_type',
			'name' => __( 'Select video type', 'recipe' ),
			'type' => 'select',
			'options' => array(
				'self' => __( 'Self Hosted', 'recipe' ),
				'remote' => __( 'Embed', 'recipe' ),
			)
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Video Post Information', 'recipe' ),
		'pages' => 'post',
		'fields' => $post_meta_video,
	);
	
	$post_meta_quote = array(
		array(
			'id' => 'blockquote',
			'name' => __( 'Input the quotation', 'recipe' ),
			'type' => 'textarea',
		),
		array(
			'id' => 'cite',
			'name' => __( 'Input the quoted person\'s name', 'recipe' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Quote Post Information', 'recipe' ),
		'pages' => 'post',
		'fields' => $post_meta_quote,
	);	

	$post_meta_link = array(
		array(
			'id' => 'link',
			'name' => __( 'Input link', 'recipe' ),
			'type' => 'text',
		),
	);
	
	$meta_boxes[] = array(
		'title' => __( 'Link Post Information', 'recipe' ),
		'pages' => 'post',
		'fields' => $post_meta_link,
	);

	$recipe_meta = array(
		array(
			'id' => 'recipe_video',
			'name' => __( 'Input video URL', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'recipe_images',
			'name' => __( 'Add images', 'recipe' ),
			'type' => 'image',
			'repeatable' => 1
		),
		array(
			'id' => 'recipe_yield',
			'name' => __( 'Yield', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'recipe_servings',
			'name' => __( 'Servings', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'recipe_prep_time',
			'name' => __( 'Prep Time', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'recipe_cook_time',
			'name' => __( 'Cook Time', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'recipe_ready_in',
			'name' => __( 'Ready In', 'recipe' ),
			'type' => 'text',
		),
		array(
			'id' => 'recipe_ingredient',
			'name' => __( 'Ingredient', 'recipe' ),
			'desc' => __( 'Input ingredients one per line. To add a title use # tags for exmple ( #For Pudding# )', 'recipe' ),
			'type' => 'textarea',
		),
		array(
			'id' => 'recipe_nutritions',
			'name' => __( 'Nutritions', 'recipe' ),
			'desc' => __( 'Input nutritions one per line where title and value are separated with : ( Calories:3400ckal )', 'recipe' ),
			'type' => 'textarea',
		),
		array(
			'id' => 'recipe_steps',
			'name' => __( 'Steps', 'recipe' ),
			'desc' => __( 'Input steps and separate them with the duoble dash -- .', 'recipe' ),
			'type' => 'wysiwyg',
		),
		array(
			'id' => 'recipe_difficulty',
			'name' => __( 'Difficulty', 'recipe' ),
			'type' => 'select',
			'options' => array(
				'easy' => __( 'Easy', 'recipe' ),
				'medium' => __( 'Medium', 'recipe' ),
				'advanced' => __( 'Advanced', 'recipe' )
			)
		),
	);

	$meta_boxes[] = array(
		'title' => __( 'Recipe Details', 'recipe' ),
		'pages' => 'recipe',
		'fields' => $recipe_meta,
	);	

	$review_meta = array(
		array(
			'id' => 'review_score',
			'name' => __( 'Review Score', 'recipe' ),
			'type' => 'select',
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5'
			)
		),
		array(
			'id' => 'review_recipe',
			'name' => __( 'Review For', 'recipe' ),
			'type' => 'select',
			'options' => recipe_get_custom_list( 'recipe' )
		),		
	);	
	
	$meta_boxes[] = array(
		'title' => __( 'Review Score', 'recipe' ),
		'pages' => 'review',
		'fields' => $review_meta,
	);	

	return $meta_boxes;
}

add_filter('sm_meta_boxes', 'recipe_custom_meta');


function recipe_get_top_rated( $num ){
	global $wpdb;
	$results = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT postmeta2.meta_value AS recipe FROM {$wpdb->postmeta} AS postmeta1 LEFT JOIN {$wpdb->postmeta} AS postmeta2 ON postmeta1.post_id = postmeta2.post_id WHERE postmeta1.meta_key = 'review_score' AND postmeta2.meta_key = 'review_recipe' GROUP BY postmeta2.meta_key ORDER BY AVG(postmeta1.meta_value)",
			$num
		)
	);
	$result_array = array();
	foreach( $results as $result ){
		$result_array[] = $result->recipe;
	}

	return $result_array;
}

class recipe_walker extends Walker_Nav_Menu {
  
	/**
	* @see Walker::start_lvl()
	* @since 3.0.0
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param int $depth Depth of page. Used for padding.
	*/
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	* @see Walker::start_el()
	* @since 3.0.0
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param object $item Menu item data object.
	* @param int $depth Depth of menu item. Used for padding.
	* @param int $current_page Menu item ID.
	* @param object $args
	*/
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		* Dividers, Headers or Disabled
		* =============================
		* Determine whether the item is a Divider, Header, Disabled or regular
		* menu item. To prevent errors we use the strcasecmp() function to so a
		* comparison that is not case sensitive. The strcasecmp() function returns
		* a 0 if the strings are equal.
		*/
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} 
		else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} 
		else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} 
		else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} 
		else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
			if ( $args->has_children ){
				$class_names .= ' dropdown';
			}
			
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title'] = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel'] = ! empty( $item->xfn )	? $item->xfn	: '';

			// If item has_children add atts to a.
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			if ( $args->has_children ) {
				$atts['data-toggle']	= 'dropdown';
				$atts['class']	= 'dropdown-toggle';
				$atts['data-hover']	= 'dropdown';
				$atts['aria-haspopup']	= 'true';
			} 

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			* Glyphicons
			* ===========
			* Since the the menu item is NOT a Divider or Header we check the see
			* if there is a value in the attr_title property. If the attr_title
			* property is NOT null we apply it as the class name for the glyphicon.
			*/
			
			$icon = get_post_meta( $item->ID, 'recipe_icon', true );
			$item_output .= '<a'. $attributes .'>';

			if( !empty( $icon ) ){
				$item_output .= '<i class="menu-icon fa fa-'.esc_attr( $icon ).'"></i>';
			}	

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if( $args->has_children && 0 === $depth ){
				$item_output .= ' <i class="fa fa-angle-down"></i>';
			}
			$item_output .= '</a>';
			$item_output .= $args->after;
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	* Traverse elements to create list from elements.
	*
	* Display one element if the element doesn't have any children otherwise,
	* display the element and its children. Will only traverse up to the max
	* depth and no ignore elements under that depth.
	*
	* This method shouldn't be called directly, use the walk() method instead.
	*
	* @see Walker::start_el()
	* @since 2.5.0
	*
	* @param object $element Data object
	* @param array $children_elements List of elements to continue traversing.
	* @param int $max_depth Max depth to traverse.
	* @param int $depth Depth of current element.
	* @param array $args
	* @param string $output Passed by reference. Used to append additional content.
	* @return null Null on failure with no changes to parameters.
	*/
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		// Display this element.
		if ( is_object( $args[0] ) ){
		   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	* Menu Fallback
	* =============
	* If this function is assigned to the wp_nav_menu's fallback_cb variable
	* and a manu has not been assigned to the theme location in the WordPress
	* menu manager the function with display nothing to a non-logged in user,
	* and will add a link to the WordPress menu manager if logged in as an admin.
	*
	* @param array $args passed from the wp_nav_menu function.
	*
	*/
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id ){
					$fb_output .= ' id="' . $container_id . '"';
				}

				if ( $container_class ){
					$fb_output .= ' class="' . $container_class . '"';
				}

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id ){
				$fb_output .= ' id="' . $menu_id . '"';
			}

			if ( $menu_class ){
				$fb_output .= ' class="' . $menu_class . '"';
			}

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container ){
				$fb_output .= '</' . $container . '>';
			}

			echo $fb_output;
		}
	}
}

/*generate random password*/
function recipe_random_string( $length = 10 ) {
	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$random = '';
	for ($i = 0; $i < $length; $i++) {
		$random .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $random;
}

/* format wp_link_pages so it has the right css applied to it */
function recipe_link_pages( $post_pages ){
	/* format pages that are not current ones */
	$post_pages = str_replace( '<a', '<a class="btn btn-default "', $post_pages );
	$post_pages = str_replace( '</span></a>', '</a>', $post_pages );
	$post_pages = str_replace( '><span>', '>', $post_pages );
	
	/* format current page */
	$post_pages = str_replace( '<span>', '<a href="javascript:;" class="btn btn-default active">', $post_pages );
	$post_pages = str_replace( '</span>', '</a>', $post_pages );
	
	return $post_pages;
	
}
/* create tags list */
function recipe_the_tags(){
	$tags = get_the_tags();
	$list = array();
	if( !empty( $tags ) ){
		foreach( $tags as $tag ){
			$list[] = '<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'">'.$tag->name.'</a>';
		}
	}
	
	return join( ", ", $list );
}

function recipe_custom_tax( $tax, $post_id = '' ){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	$search = recipe_get_permalink_by_tpl( 'page-tpl_search' );
	$terms = get_the_terms( $post_id, $tax );
	$list = array();
	if( !empty( $terms ) ){
		foreach( $terms as $term ){
			$list[] = '<a href="'.esc_url( add_query_arg( array( $tax => $term->slug ), $search ) ).'">'.$term->name.'</a>';
		}
	}
	
	return join( ", ", $list );
}

function recipe_cloud_sizes($args) {
	$args['smallest'] = 14;
	$args['largest'] = 14;
	$args['unit'] = 'px';
	return $args; 
}
add_filter('widget_tag_cloud_args','recipe_cloud_sizes');

function recipe_the_category(){
	$list = '';
	$categories = get_the_category();
	if( !empty( $categories ) ){
		foreach( $categories as $category ){
			$list .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'">'.$category->name.'</a> ';
		}
	}
	
	return $list;
}

/* check if the blog has any media */
function recipe_has_media(){
	$post_format = get_post_format();
	switch( $post_format ){
		case 'aside' : 
			return has_post_thumbnail() ? true : false; break;
			
		case 'audio' :
			$post_meta = get_post_custom();
			$iframe_audio = recipe_get_smeta( 'iframe_audio', $post_meta, '' );
			if( !empty( $iframe_audio ) ){
				return true;
			}
			else if( has_post_thumbnail() ){
				return true;
			}
			else{
				return false;
			}
			break;
			
		case 'chat' : 
			return has_post_thumbnail() ? true : false; break;
		
		case 'gallery' :
			$post_meta = get_post_custom();
			$gallery_images = recipe_smeta_images( 'gallery_images', get_the_ID(), array() );		
			if( !empty( $gallery_images ) ){
				return true;
			}
			else if( has_post_thumbnail() ){
				return true;
			}			
			else{
				return false;
			}
			break;
			
		case 'image':
			return has_post_thumbnail() ? true : false; break;
			
		case 'link' :
			$post_meta = get_post_custom();
			$link = recipe_get_smeta( 'link', $post_meta, '' );
			if( !empty( $link ) ){
				return true;
			}
			else{
				return false;
			}
			break;
			
		case 'quote' :
			$post_meta = get_post_custom();
			$blockquote = recipe_get_smeta( 'blockquote', $post_meta, '' );
			$cite = recipe_get_smeta( 'cite', $post_meta, '' );
			if( !empty( $blockquote ) || !empty( $cite ) ){
				return true;
			}
			else if( has_post_thumbnail() ){
				return true;
			}
			else{
				return false;
			}
			break;
		
		case 'status' :
			return has_post_thumbnail() ? true : false; break;
	
		case 'video' :
			$post_meta = get_post_custom();
			$video_url = recipe_get_smeta( 'video', $post_meta, '' );
			if( !empty( $video_url ) ){
				return true;
			}
			else if( has_post_thumbnail() ){
				return true;
			}
			else{
				return false;
			}
			break;
			
		default: 
			$post_meta = get_post_custom();
			$iframe_standard = recipe_get_smeta( 'iframe_standard', $post_meta, '' );		
			if( !empty( $iframe_standard ) ){
				return true;
			}
			else if( has_post_thumbnail() ){
				return true;
			}
			else{
				return false;
			}
			break;
	}	
}

/* format pagination so it has correct style applied to it */
function recipe_format_pagination( $page_links ){
	$list = '';
	if( !empty( $page_links ) ){
		foreach( $page_links as $page_link ){
			$page_link = str_replace( "<span class='page-numbers current'>", '<a href="javascript:;" class="active">', $page_link );
			$page_link = str_replace( "<span class=\"page-numbers dots\">", '<a href="javascript:;">', $page_link );
			$page_link = str_replace( '</span>', '</a>', $page_link );
			$page_link = str_replace( array( 'class="', "class='" ), array( 'class="btn btn-default ', "class='btn btn-default " ), $page_link );
			$list .= $page_link." ";
		}
	}
	
	return $list;
}


/*======================CONTACT FUNCTIONS==============*/
function recipe_send_contact(){
	$errors = array();
	$name = esc_sql( $_POST['name'] );	
	$email = esc_sql( $_POST['email'] );
	$subject = esc_sql( $_POST['subject'] );
	$message = esc_sql( $_POST['message'] );
	if( empty( $name ) || empty( $subject ) || empty( $email ) || empty( $message ) ){
		$response = array(
			'error' => __( 'All fields are required.', 'recipe' ),
		);
	}
	else if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		$response = array(
			'error' => __( 'E-mail address is not valid.', 'recipe' ),
		);	
	}
	else{
		$email_to = recipe_get_option( 'contact_form_email' );
		$message = "
			".__( 'Name: ', 'recipe' )." {$name} \n			
			".__( 'Email: ', 'recipe' )." {$email} \n
			".__( 'Message: ', 'recipe' )."\n {$message} \n
		";
		
		$info = @wp_mail( $email_to, $subject, $message );
		if( $info ){
			$response = array(
				'success' => __( 'Your message was successfully submitted.', 'recipe' ),
			);
		}
		else{
			$response = array(
				'error' => __( 'Unexpected error while attempting to send e-mail.', 'recipe' ),
			);
		}
		
	}
	
	echo json_encode( $response );
	die();	
}
add_action('wp_ajax_contact', 'recipe_send_contact');
add_action('wp_ajax_nopriv_contact', 'recipe_send_contact');

/* =======================================================SUBSCRIPTION FUNCTIONS */
function recipe_send_subscription( $email = '' ){
	$email = !empty( $email ) ? $email : $_POST["email"];
	$response = array();	
	if( filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
		require_once( locate_template( 'includes/mailchimp.php' ) );
		$chimp_api = recipe_get_option("mail_chimp_api");
		$chimp_list_id = recipe_get_option("mail_chimp_list_id");
		if( !empty( $chimp_api ) && !empty( $chimp_list_id ) ){
			$mc = new MailChimp( $chimp_api );
			$result = $mc->call('lists/subscribe', array(
				'id'                => $chimp_list_id,
				'email'             => array( 'email' => $email )
			));
			
			if( $result === false) {
				$response['error'] = __( 'There was an error contacting the API, please try again.', 'recipe' );
			}
			else if( isset($result['status']) && $result['status'] == 'error' ){
				$response['error'] = json_encode($result);
			}
			else{
				$response['success'] = __( 'You have successuffly subscribed to the newsletter.', 'recipe' );
			}
			
		}
		else{
			$response['error'] = __( 'API data are not yet set.', 'recipe' );
		}
	}
	else{
		$response['error'] = __( 'Email is empty or invalid.', 'recipe' );
	}
	
	echo json_encode( $response );
	die();
}
add_action('wp_ajax_subscribe', 'recipe_send_subscription');
add_action('wp_ajax_nopriv_subscribe', 'recipe_send_subscription');

function recipe_hex2rgb( $hex ){
	$hex = str_replace("#", "", $hex);

	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	return $r.", ".$g.", ".$b; 
}

function recipe_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
	if( empty( $matches[1] ) ){
		preg_match("/src=\"(.*?)\"/i", $get_avatar, $matches);
	}
    return $matches[1];
}

function recipe_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$add_below = ''; 
	$current_user = wp_get_current_user();
	$author_email = $current_user->user_email;
	global $can_review;

	if( $author_email == $comment->comment_author_email && is_singular('recipe') ){
		$can_review = false;
	}
	?>
	<!-- comment -->
	<div class="row comment-row <?php echo $comment->comment_parent != '0' ? esc_attr( 'comment-margin-left' ) : ''; ?> " id="comment-<?php comment_ID() ?>">
		<!-- comment media -->
		<div class="col-sm-12">
			<div class="comment-avatar">
				<?php 
				$avatar = recipe_get_avatar_url( get_avatar( $comment, 150 ) );
				if( !empty( $avatar ) ): ?>
					<img src="<?php echo esc_url( $avatar ); ?>" class="img-responsive" title="" alt="">
				<?php endif; ?>
			</div>
			<div class="comment-content-wrap">
				<div class="comment-name">
					<div class="pull-left">
						<h5><?php comment_author(); ?></h5>					
						<p><?php comment_time( 'F j, Y '.__('@','recipe').' H:i' ); ?> </p>
					</div>
					<span class="pull-right">
					<?php if( is_singular( 'recipe' ) ): ?>
						<?php 
						$rate = get_comment_meta( $comment->comment_ID, 'review', true );
						$percentage = round( $rate / 5, 2 ) * 100;
						echo recipe_rating_display( $percentage, $rate, '' );
						?>
					<?php endif; ?>
					<?php
					if( !is_singular( 'recipe' ) || current_user_can( 'manage_options' ) ){
						comment_reply_link( 
							array_merge( 
								$args, 
								array( 
									'reply_text' => '<i class="fa fa-share"></i> <small>'.__( 'Reply', 'recipe' ).'</small>', 
									'add_below' => $add_below, 
									'depth' => $depth, 
									'max_depth' => $args['max_depth'] 
								) 
							) 
						); 
					}?>				
					</span>				
					<div class="clearfix"></div>
				</div>
				<?php 
				if ($comment->comment_approved != '0'){
				?>
					<?php comment_text(); ?>
				<?php 
				}
				else{ ?>
					<p><?php _e('Your comment is awaiting moderation.', 'recipe'); ?></p>				
				<?php
				}
				?>	
			</div>		
		</div><!-- .comment media -->
	</div><!-- .comment -->
	<?php  
}

function recipe_end_comments(){
	return "";
}

function recipe_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'recipe_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'recipe_embed_html' ); // Jetpack

function recipe_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<form class="protected-post-form" action="' . site_url() . '/wp-login.php?action=postpass" method="post">
				' . __( "This post is password protected. To view it please enter your password below:", "recipe" ) . '
				<label for="' . $label . '">' . __( "Password:", "recipe" ) . ' </label><div class="recipe-form"><input name="post_password" class="form-control" id="' . $label . '" type="password" /><a class="btn btn-default submit-live-form"><i class="fa fa-sign-in"></i></a></div>
			</form>
	';
	return $form;
}
add_filter( 'the_password_form', 'recipe_password_form' );

function recipe_shortcode_style( $style_css ){
 return '<script>jQuery(document).ready( function($){ $("head").append( \''.str_replace( array( "\n", "\r" ), " ", $style_css).'\' ); });</script>';
}

/* VIEWS AND LIKES */
/* add new column to the posts listing in the admin area*/
function recipe_set_extra_columns( $columns ){
	$columns = array_slice($columns, 0, count($columns) - 1, true) + array("views" => __( 'Views', 'recipe' )) + array_slice($columns, count($columns) - 1, count($columns) - 1, true) ;	
	$columns = array_slice($columns, 0, count($columns) - 1, true) + array("likes" => __( 'Likes', 'recipe' )) + array_slice($columns, count($columns) - 1, count($columns) - 1, true) ;	
	return $columns;
}
add_filter( 'manage_edit-post_columns', 'recipe_set_extra_columns' );

function recipe_extra_columns( $column, $post_id ){
	switch ( $column ) {
		case 'views' :
			$views = get_post_meta( $post_id, 'views' );
			if( !empty( $views ) ){
				echo array_shift( $views );
			}
			else{
				echo '0';
			}
			break;
		case 'likes' :
			$likes = get_post_meta( $post_id, 'likes' );
			if( !empty( $likes ) ){
				echo array_shift( $likes );
			}
			else{
				echo '0';
			}
			break;			
	}
}
add_action( 'manage_post_posts_custom_column' , 'recipe_extra_columns' , 10, 2 );

function recipe_sorting_by_extra( $columns ){
	$custom = array(
		'views'	=> 'views',
		'likes'	=> 'likes',
	);
	return wp_parse_args($custom, $columns);
}
add_filter( 'manage_edit-post_sortable_columns', 'recipe_sorting_by_extra' );

function recipe_sort_by_extra( $query ){
	if( ! is_admin() ){
		return;	
	}

	$orderby = $query->get( 'orderby');
	if( $orderby == 'views' ){
		$query->set( 'meta_key', $orderby );
		$query->set( 'orderby', 'meta_value_num' );
	}
	else if( $orderby == 'likes'  ){
		$query->set( 'meta_key', $orderby );
		$query->set( 'orderby', 'meta_value_num' );		
	}
}
add_action( 'pre_get_posts', 'recipe_sort_by_extra' );

/* get post views */
function recipe_get_post_extra( $meta_key, $post_id = '' ){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	
	$extra_count = get_post_meta( $post_id, $meta_key );
	if( !empty( $extra_count ) ){
		return $extra_count[0];
	}
	else{
		return 0;
	}
}
/* record post views */
function recipe_count_post_extra( $meta_key = '', $post_id = '' ){
	$can_increment = true;
	$echo = false;
	/* if it is ajax it means that it is likes */
	if( empty( $meta_key ) ){

	}
	else if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	if( $can_increment == true ){		
		$extra_count = get_post_meta( $post_id, $meta_key );
		if( !empty( $extra_count ) ){
			$extra_count = $extra_count[0] + 1;
		}
		else{
			$extra_count = 1;
		}
	
		update_post_meta( $post_id, $meta_key, $extra_count );
		
		if( $echo ){
			echo json_encode(array(
				"count" => $extra_count
			));
			die();
		}
		else{
			return $extra_count;
		}
	}
	else{

	}
}


function recipe_increase_views_likes(){
	$meta = $_POST['meta'];
	$post_id = $_POST['post_id'];
	if( $meta == 'views' ){
		$post_meta = get_post_meta( $post_id, 'views', true );
		$count = 1;
		if( !empty( $post_meta ) ){
			$count = $post_meta + 1;
		}
		
		update_post_meta( $post_id, 'views', $count );		
	}
	else{
		global $wpdb;
		$can_increment = true;
		$post_id = $_POST['post_id'];
		$meta_key = 'likes';
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$post_meta = get_post_meta( $post_id, 'ip_likes' );
		$query = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT * FROM {$wpdb->prefix}postmeta AS postmeta WHERE meta_value = %s AND post_id = %d",
				$ip_address,
				$post_id
			)
		);
		if( !empty( $query ) ){			
			$can_increment = false;
		}
		else{
			$echo = true;
			update_post_meta( $post_id, 'ip_likes', $ip_address );
		}
		if( $can_increment == true ){
			$post_meta = get_post_meta( $post_id, 'likes', true );
			$count = 1;
			if( !empty( $post_meta ) ){
				$count = $post_meta + 1;
			}
			
			update_post_meta( $post_id, 'likes', $count );	
			$response = array( 'count' => $count );
		}
		else{
			$response = array(
				"error" => __( 'You have already liked this post', 'recipe' ),
			);
		}

		echo json_encode( $response );
		die();
	}

}
add_action('wp_ajax_likes_views', 'recipe_increase_views_likes');
add_action('wp_ajax_nopriv_likes_views', 'recipe_increase_views_likes');


function recipe_prepare_step_title( $content ){
	$reg_exUrl = "/#[^#]*#/";
	if( preg_match_all( $reg_exUrl, $content, $matches ) ) {
		foreach( $matches[0] as $match ){
			$title = str_replace( '#', '', $match );
	    	$content =  str_replace( $match, '<h5>'.$title.'</h5>', $content );
	    }
	}

	return $content;
}

function recipe_get_custom_list( $post_type, $args = array() ){
	$post_array = array();
	$args = array( 'post_type' => $post_type, 'post_status' => 'publish', 'posts_per_page' => -1 ) + $args;
	$posts = get_posts( $args );
	
	foreach( $posts as $post ){
		$post_array[$post->ID] = $post->post_title;
	}
	
	return $post_array;
}

function recipe_get_taxonomy_list( $taxonomy, $direction = 'right' ){
	$terms = get_terms( $taxonomy );
	$terms_array = array();
	if( !empty( $terms ) ){
		foreach( $terms as $term ){
			if( $direction == 'right' ){
				$terms_array[$term->term_id] = $term->name;
			}
			else{
				$terms_array[$term->name] = $term->term_id;
			}
		}
	}

	return $terms_array;
}

function recipe_count_custom_post( $post_type, $args = array(), $post_status = 'publish' ){
	$post_array = array();
	$args = array( 'post_type' => $post_type, 'post_status' => $post_status, 'posts_per_page' => -1 ) + $args;
	$posts = get_posts( $args );
	
	return count( $posts );
}

/* get url by page template */
function recipe_get_permalink_by_tpl( $template_name ){
	$page = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name . '.php'
	));
	if(!empty($page)){
		return get_permalink( $page[0]->ID );
	}
	else{
		return "javascript:;";
	}
}

function recipe_icons_list( $value ){
	$icons_list = recipe_category_icons();
	
	$select_data = '';
	
	foreach( $icons_list as $key => $label){
		$select_data .= '<option value="'.esc_attr( $key ).'" '.( $value == $key ? 'selected="selected"' : '' ).'>'.$label.'</option>';
	}
	
	return $select_data;
}

function recipe_calculate_average_rating( $post_id ){
	global $wpdb;
	$result = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT AVG(commentmeta1.meta_value) AS rate, COUNT(commentmeta1.meta_value) AS counts FROM {$wpdb->commentmeta} AS commentmeta1 WHERE commentmeta1.meta_key = 'review' AND commentmeta1.comment_id IN ( SELECT comment_ID FROM {$wpdb->comments} WHERE comment_post_ID = %d )",
			$post_id
		)
	);	
	$result = array_shift( $result );
	update_post_meta( $post_id, 'average_review', round( $result->rate, 2 ) );
	update_post_meta( $post_id, 'count_review', $result->counts );
}

function recipe_calculate_average_user_rating( $user_ID ){
	$posts = get_posts(array(
		'post_type' => 'recipe',
		'post_status' => 'publish',
		'author' => $user_ID,
		'posts_per_page' => -1
	));	
	$average_review = 0;
	$count = 0;
	if( !empty( $posts ) ){
		foreach( $posts as $post ){
			$average_review += get_post_meta( $post->ID, 'average_review', true );
			$count++;
		}
	}
	if( $count > 0 ){
		$user_average = round( $average_review / $count, 2 );
	}
	else{
		$user_average = 0;
	}
	update_user_meta( $user_ID, 'average_rating', $user_average );
}

function recipe_calculate_ratings( $post_id = '' ){
	if( empty( $post_id ) )	{
		$post_id = get_the_ID();
	}
	$average = get_post_meta( $post_id, 'average_review', true );
	if( empty( $average ) ){
		$average = 0;
	}
	$percentage = ( $average / 5 ) * 100;
	recipe_rating_display( $percentage, $average );
}

function recipe_user_rating( $user_id ){
	$average = get_user_meta( $user_id, 'average_rating', true );
	if( empty( $average ) ){
		$average = 0;
	}
	$percentage = ( $average / 5 ) * 100;
	$ratings = recipe_rating_display( $percentage, $average, 'average' );
	return $ratings;
}

function recipe_rating_display( $percentage, $average, $title = 'average' ){
	if( $title == 'average' ){
		$title = __( 'Average Rate: ', 'recipe' );
	}
	else{
		$title = '';
	}

	$title = $title.$average.' / 5';

	$ratings = '';
	$ratings .= '<span class="bottom-ratings tip" data-title="'.esc_attr( $title ).'">';
		for( $i=1; $i<=5; $i++ ){
			$ratings .= '<i class="fa fa-glass"></i>';
		}
		$ratings .= '<span class="top-ratings" style="width: '.esc_attr( $percentage ).'%">';
		for( $i=1; $i<=5; $i++ ){
			$ratings .= '<i class="fa fa-glass"></i>';
		}
		$ratings .= '</span>';		
	$ratings .= '</span>';	

	echo $ratings;
}

/* --------------------------------------------------------DISABLE BAR---------------------------------------------------*/
function recipe_remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'recipe_remove_admin_bar');

/* REGISTER */
function coupon_captcha(){
	$num1 = rand( 1, 10 );
	$num2 = rand( 1, 10 );
	$total = $num1 + $num2;
	$_SESSION['total'] = $total;  

	return $num1.'+'.$num2.'=';
}


function recipe_register(){
	session_start();
	$response = array();

	if( wp_verify_nonce($_POST['register_field'], 'register') ){
		$username = isset( $_POST['username'] ) ? $_POST['username'] : '';
		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		$password = isset( $_POST['password'] ) ? $_POST['password'] : '';
		$repeat_password = isset( $_POST['repeat_password'] ) ? $_POST['repeat_password'] : '';		
		$captcha = isset( $_POST['captcha'] ) ? $_POST['captcha'] : '';		
		if( $captcha == $_SESSION['total'] ){
			if( !empty( $username ) ){
				if( !empty( $email ) && filter_var($email, FILTER_VALIDATE_EMAIL) ){
					if( !empty( $password ) && !empty( $repeat_password ) && $password == $repeat_password ){
						if( !username_exists( $username ) ){
							if( !email_exists( $email ) ){
		                        $user_id = wp_insert_user(array(
		                            'user_login'  => $username,
		                            'user_pass'   => $password,
		                            'user_email'  => $email
		                        ));
		                        if( !is_wp_error($user_id) ) {
		                            wp_update_user(array(
		                                'ID' => $user_id, 
		                                'role' => 'editor' 
		                            ));	                        	
		                        	$confirmation_hash = recipe_random_string(10);
		                            update_user_meta( $user_id, 'user_active_status', 'inactive' );
		                            update_user_meta( $user_id, 'confirmation_hash', $confirmation_hash );

		                            $confirmation_message = recipe_get_option( 'registration_message' );
		                            $confirmation_link = recipe_get_permalink_by_tpl( 'page-tpl_register_login' );
		                            $confirmation_link = esc_url( add_query_arg( array( 'username' => $username, 'confirmation_hash' => $confirmation_hash ), $confirmation_link ) );
		                            
		                            $confirmation_message = str_replace( '%LINK%', $confirmation_link, $confirmation_message );

		                            $registration_subject = recipe_get_option( 'registration_subject' );

		                            $email_sender = recipe_get_option( 'registration_sender_email' );
		                            $name_sender = recipe_get_option( 'registration_sender_name' );
		                            $headers   = array();
		                            $headers[] = "MIME-Version: 1.0";
		                            $headers[] = "Content-Type: text/html; charset=ISO-8859-1"; 
		                            $headers[] = "From: ".esc_attr( $name_sender )." <".esc_attr( $email_sender ).">";

		                            $info = @wp_mail( $email, $registration_subject, $confirmation_message, $headers );
		                            if( $info ){
		                            	$response['message'] = '<div class="alert alert-success">'.__( 'You have registered. Email with the confirmation link is sent on the email address you have provided.', 'recipe' ).'</div>';
		                            }
		                            else{
		                                $response['message'] = '<div class="alert alert-danger">'.__( 'There was an error trying to send confirmation link to you', 'recipe' ).'</div>';
		                            }                            

		                        }
		                        else{
		                        	$response['message'] = '<div class="alert alert-danger">'.__( 'There was an error trying to register you', 'recipe' ).'</div>';
		                        }
							}
							else{
								$response['message'] = '<div class="alert alert-danger">'.__( 'Email is already registered', 'recipe' ).'</div>';					
							}
						}
						else{
							$response['message'] = '<div class="alert alert-danger">'.__( 'Username is already taken', 'recipe' ).'</div>';			
						}
					}
					else{
						$response['message'] = '<div class="alert alert-danger">'.__( 'Passwords do not match', 'recipe' ).'</div>';		
					}
				}
				else{
					$response['message'] = '<div class="alert alert-danger">'.__( 'Email is invalid', 'recipe' ).'</div>';	
				}
			}
			else{
				$response['message'] = '<div class="alert alert-danger">'.__( 'Username is empty', 'recipe' ).'</div>';
			}
		}
		else{
			$response['message'] = '<div class="alert alert-danger">'.__( 'Captcha is wrong.', 'recipe' ).'</div>';
		}
	}
	else{
		$response['message'] = '<div class="alert alert-danger">'.__( 'You do not have permission for this action', 'recipe' ).'</div>';
	}
	$response['captcha'] = coupon_captcha();
	echo json_encode( $response );
	die();
}
add_action('wp_ajax_register', 'recipe_register');
add_action('wp_ajax_nopriv_register', 'recipe_register');

/* LOGIN */
function recipe_login(){
	$response = array();
	if( wp_verify_nonce($_POST['login_field'], 'login') ){
		$username = isset( $_POST['username'] ) ? $_POST['username'] : '';
		$password = isset( $_POST['password'] ) ? $_POST['password'] : '';
		if( !empty( $username ) && !empty( $password ) ){
	        $user = wp_signon( array(
	            'user_login' => $username,
	            'user_password' => $password,
	            'remember' => isset( $_POST['remember_me'] ) ? true : false
	        ), false );
	        
	        if ( is_wp_error( $user ) ){
	            switch( $user->get_error_code() ){
	                case 'invalid_username': 
	                    $message = __( 'Invalid username', 'recipe' ); 
	                    break;
	                case 'incorrect_password':
	                    $message = __( 'Invalid password', 'recipe' ); 
	                    break;          
	                default:
	                    $message = __( 'All fields are required', 'recipe' ); 
	                    break;                    
	            }
	            $response['message'] = '<div class="alert alert-danger">'.$message.'</div>';
	        }
	        else{
	        	$response['message'] = '<div class="alert alert-success">'.__( 'You have been logged in, now you will be redirected,', 'recipe' ).'</div>';
	            $response['url'] = home_url();
	        }
	    }
	    else{
	    	$response['message'] = '<div class="alert alert-danger">'.__( 'All fields are required', 'recipe' ).'</div>';
	    }
	}
	else{
		$response['message'] = '<div class="alert alert-danger">'.__( 'You do not have permission for this action', 'recipe' ).'</div>';
	}
	echo json_encode( $response );
	die();
}
add_action('wp_ajax_login', 'recipe_login');
add_action('wp_ajax_nopriv_login', 'recipe_login');

function recipe_recover(){
	$response = array();
	if( wp_verify_nonce($_POST['recover_field'], 'recover') ){
		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		if( !empty( $email ) && filter_var($email, FILTER_VALIDATE_EMAIL) ){
			if( email_exists( $email ) ){
                $user = get_user_by( 'email', $email );
                $new_password = recipe_random_string( 5 );
                $update_fields = array(
                    'ID'            => $user->ID,
                    'user_pass'     => $new_password,
                );
                $update_id = wp_update_user( $update_fields );
                $lost_password_message = recipe_get_option( 'recover_message' );
                $lost_password_message = str_replace( "%USERNAME%", $user->user_login, $lost_password_message );
                $lost_password_message = str_replace( "%PASSWORD%", $new_password, $lost_password_message );

                $email_sender = recipe_get_option( 'recover_sender_email' );
                $name_sender = recipe_get_option( 'recover_sender_name' );
                $headers   = array();
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-Type: text/html; charset=ISO-8859-1"; 
                $headers[] = "From: ".esc_attr( $name_sender )." <".esc_attr( $email_sender ).">";   

                $lost_password_subject = recipe_get_option( 'recover_subject' );

                $message_info = @wp_mail( $email, $lost_password_subject, $lost_password_message, $headers );
                if( $message_info ){
                    $message = '<div class="alert alert-danger">'.__( 'Email with the new password and your username is sent to the provided email address', 'recipe' ).'</div>';  
                }
                else{
                    $message = '<div class="alert alert-danger">'.__( 'There was an error trying to send an email', 'recipe' ).'</div>';  
                }
			}
			else{
				$response['message'] = '<div class="alert alert-danger">'.__( 'Email is not registered', 'recipe' ).'</div>';	
			}
		}
		else{
			$response['message'] = '<div class="alert alert-danger">'.__( 'Email is invalid', 'recipe' ).'</div>';
		}
	}
	else{
		$response['message'] = '<div class="alert alert-danger">'.__( 'You do not have permission for this action', 'recipe' ).'</div>';
	}

	echo json_encode( $response );
	die();
}
add_action('wp_ajax_recover', 'recipe_recover');
add_action('wp_ajax_nopriv_recover', 'recipe_recover');

function recipe_update_profile(){
	$response = array();
	if( wp_verify_nonce($_POST['profile_field'], 'profile') ){
		$user_id = isset( $_POST['user_id'] ) ? esc_sql( $_POST['user_id'] ) : '';
		$first_name = isset( $_POST['first_name'] ) ? esc_sql( $_POST['first_name'] ) : '';
		$last_name = isset( $_POST['last_name'] ) ? esc_sql( $_POST['last_name'] ) : '';
		$email = isset( $_POST['email'] ) ? esc_sql( $_POST['email'] ) : '';
		$password = isset( $_POST['password'] ) ? esc_sql( $_POST['password'] ) : '';
	    $repeat_password = isset( $_POST['repeat_password'] ) ? esc_sql( $_POST['repeat_password'] ) : '';
		$description = isset( $_POST['description'] ) ? esc_sql( $_POST['description'] ) : '';
		$facebook = isset( $_POST['facebook'] ) ? esc_sql( $_POST['facebook'] ) : '';
		$twitter = isset( $_POST['twitter'] ) ? esc_sql( $_POST['twitter'] ) : '';
		$google = isset( $_POST['google'] ) ? esc_sql( $_POST['google'] ) : '';
		$linkedin = isset( $_POST['linkedin'] ) ? esc_sql( $_POST['linkedin'] ) : '';
		if( !empty( $email ) && filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
			if( !empty( $password ) && !empty( $repeat_password ) ){
				if( $password == $repeat_password ){
					$pasword_changes = 'yes';
				}
				else{
					$response['message'] = '<div class="alert alert-danger">'.__( 'Provided passwords do not match', 'recipe' ).'</div>';
					$pasword_changes = 'no';
				}
			}

			$update_fields = array(
				'ID' 			=> $user_id,
				'user_email'	=> $email,
				'display_name'	=> $first_name.' '.$last_name
			);
			if( isset( $pasword_changes ) && $pasword_changes == 'yes' ){
				$update_fields['user_pass'] = $password;
			}
			$update_id = wp_update_user( $update_fields );

            update_user_meta( $user_id, 'first_name', $first_name );
			update_user_meta( $user_id, 'last_name', $last_name );
			$description = wp_unslash( $description ); 
			update_user_meta( $user_id, 'description', $description );
			update_user_meta( $user_id, 'facebook', $facebook );
			update_user_meta( $user_id, 'twitter', $twitter );
			update_user_meta( $user_id, 'google', $google );
			update_user_meta( $user_id, 'linkedin', $linkedin );

			$response['message'] = '<div class="alert alert-success">'.__( 'Your profile is updated.', 'recipe' ).'</div>';

		}
		else{
			$response['message'] = '<div class="alert alert-danger">'.__( 'Email address is not valid.', 'recipe' ).'</div>';
		}
	}
	else{
		$response['message'] = '<div class="alert alert-danger">'.__( 'You do not have permission for this action', 'recipe' ).'</div>';
	}

	echo json_encode( $response );
	die();
}

add_action('wp_ajax_update_profile', 'recipe_update_profile');
add_action('wp_ajax_nopriv_update_profile', 'recipe_update_profile');

/* AAJX AVATAR CHANGE */
function recipe_change_avatar(){
	global $wp_user_avatar;
	$user_id = get_current_user_id();
	$wp_user_avatar->wpua_action_process_option_update( $user_id );
	echo recipe_get_avatar_url( get_avatar( $user_id, 55 ) );
	die();
}
add_action('wp_ajax_change_avatar', 'recipe_change_avatar');
add_action('wp_ajax_nopriv_change_avatar', 'recipe_change_avatar');

/* AJAX CHANGE COVER IMAGE */
function recipe_change_cover(){
	$user_id = get_current_user_id();
	$cover = $_POST['cover'];
	update_user_meta( $user_id, 'cover', $cover );
	$image_data = wp_get_attachment_image_src( $cover, 'full' );
	echo $image_data[0];
	die();
}
add_action('wp_ajax_change_cover', 'recipe_change_cover');
add_action('wp_ajax_nopriv_change_cover', 'recipe_change_cover');

function recipe_save(){
	$response = array();
	if( wp_verify_nonce($_POST['recipe_field'], 'recipe') ){
		$title = isset( $_POST['title'] ) ? $_POST['title'] : '';
		$description = isset( $_POST['description'] ) ? $_POST['description'] : '';
		$featured_image = isset( $_POST['featured_image'] ) ? $_POST['featured_image'] : '';
		$excerpt = isset( $_POST['excerpt'] ) ? $_POST['excerpt'] : '';
		$recipe_video = isset( $_POST['recipe_video'] ) ? $_POST['recipe_video'] : '';
		$recipe_images = isset( $_POST['recipe_images'] ) ? $_POST['recipe_images'] : '';
		$recipe_yield = isset( $_POST['recipe_yield'] ) ? $_POST['recipe_yield'] : '';
		$recipe_servings = isset( $_POST['recipe_servings'] ) ? $_POST['recipe_servings'] : '';
		$recipe_prep_time = isset( $_POST['recipe_prep_time'] ) ? $_POST['recipe_prep_time'] : '';
		$recipe_cook_time = isset( $_POST['recipe_cook_time'] ) ? $_POST['recipe_cook_time'] : '';
		$recipe_ready_in = isset( $_POST['recipe_ready_in'] ) ? $_POST['recipe_ready_in'] : '';
		$recipe_ingredient = isset( $_POST['recipe_ingredient'] ) ? $_POST['recipe_ingredient'] : '';
		$recipe_nutritions = isset( $_POST['recipe_nutritions'] ) ? $_POST['recipe_nutritions'] : '';
		$recipe_steps = isset( $_POST['recipe_steps'] ) ? $_POST['recipe_steps'] : '';
		$recipe_category = isset( $_POST['recipe_category'] ) ? $_POST['recipe_category'] : '';
		$recipe_cuisine = isset( $_POST['recipe_cuisine'] ) ? $_POST['recipe_cuisine'] : '';
		$recipe_difficulty = isset( $_POST['recipe_difficulty'] ) ? $_POST['recipe_difficulty'] : '';
		$recipe_tags = isset( $_POST['recipe_tags'] ) ? explode( ",", $_POST['recipe_tags'] ) : '';
		$subaction = isset( $_POST['subaction'] ) ? $_POST['subaction'] : '';
		$recipe_id = isset( $_POST['recipe_id'] ) ? $_POST['recipe_id'] : '';

		if( !empty( $title ) ){
			if( !empty( $description ) ){
				if( !empty( $featured_image ) ){
					if( !empty( $excerpt ) ){
						if( !empty( $recipe_category ) ){
							if( !empty( $recipe_cuisine ) ){
								if( !empty( $recipe_yield ) ){
									if( !empty( $recipe_servings ) ){
										if( !empty( $recipe_prep_time ) ){
											if( !empty( $recipe_cook_time ) ){
												if( !empty( $recipe_ready_in ) ){
													if( !empty( $recipe_ingredient ) ){
														if( !empty( $recipe_steps ) ){
															if( !empty( $recipe_difficulty ) ){
																$args = array(
																	'post_title' => $title,
																	'post_type' => 'recipe',
																	'post_content' => $description,
																	'post_excerpt' => $excerpt,
																	'post_status' => 'draft',
																	'comment_status' => 'open'
																);


																if( $subaction == 'new' ){
																	$post_id = wp_insert_post( $args );
																}
																else{
																	$children = get_posts(array(
																		'post_type' => 'recipe',
																		'posts_per_page' => -1,
																		'post_status' => 'pending',
																		'post_parent' => $recipe_id
																	));
																	if( !empty( $children ) ){
																		foreach( $children as $child ){
																			wp_delete_post( $child->ID, true );
																		}
																	}
																	$args['post_parent'] = $recipe_id;
																	$args['post_status'] = 'pending';
																	$post_id = wp_insert_post( $args );
																}

																wp_set_object_terms( $post_id, $recipe_category, 'recipe-category' );
																wp_set_object_terms( $post_id, $recipe_cuisine, 'recipe-cuisine' );
																wp_set_object_terms( $post_id, $recipe_tags, 'recipe-tag' );

																set_post_thumbnail( $post_id, $featured_image );
																update_post_meta( $post_id, 'recipe_video', $recipe_video );
																update_post_meta( $post_id, 'recipe_yield', $recipe_yield );
																update_post_meta( $post_id, 'recipe_servings', $recipe_servings );
																update_post_meta( $post_id, 'recipe_prep_time', $recipe_prep_time );
																update_post_meta( $post_id, 'recipe_cook_time', $recipe_cook_time );
																update_post_meta( $post_id, 'recipe_ready_in', $recipe_ready_in );
																update_post_meta( $post_id, 'recipe_ingredient', $recipe_ingredient );
																update_post_meta( $post_id, 'recipe_nutritions', $recipe_nutritions );
																update_post_meta( $post_id, 'recipe_steps', $recipe_steps );

																if( !empty( $recipe_images ) ){
																	$recipe_images = explode( ",", $recipe_images );
																	$recipe_images_array = array();
																	$counter = 0;
																	foreach ( $recipe_images as $recipe_image ) {
																		$recipe_images_array['sm-field-'.$counter] = $recipe_image;
																		$counter++;
																	}
																	$recipe_images = array( serialize( $recipe_images_array ) );
																	update_post_meta( $post_id, 'recipe_images', implode( "", $recipe_images ) );
																}

																if( $subaction == 'new' ){
																	$response['message'] = '<div class="alert alert-success">'.__( 'Recipe has been submited and you will be informed when review is finished', 'recipe' ).'</div>';
																	$subject = __( 'New recipe is submitted', 'recipe' );
																	$message = __( 'New recipe has been submited. To review recipe follow this link ', 'recipe' ).get_edit_post_link( $post_id );
																}
																else{
																	$response['message'] = '<div class="alert alert-success">'.__( 'Your updates are sent and you will be informed about status after the review', 'recipe' ).'</div>';
																	$subject = __( 'Recipe update is submitted', 'recipe' );
																	$message = __( 'Update to the recipe has been submited. To review recipe follow this link ', 'recipe' ).get_edit_post_link( $post_id );
																}

									                            $review_recive_email = recipe_get_option( 'review_recive_email' );
									                            $headers   = array();
									                            $headers[] = "MIME-Version: 1.0";
									                            $headers[] = "Content-Type: text/html; charset=ISO-8859-1"; 

									                            @wp_mail( $review_recive_email, $subject, $message, $headers );
															}
															else{
																$response['message'] = '<div class="alert alert-danger">'.__( 'Recipe difficulty level is required', 'recipe' ).'</div>';
															}
														}
														else{
															$response['message'] = '<div class="alert alert-danger">'.__( 'Steps are required', 'recipe' ).'</div>';
														}
													}
													else{
														$response['message'] = '<div class="alert alert-danger">'.__( 'Ingredients are required', 'recipe' ).'</div>';
													}
												}
												else{
													$response['message'] = '<div class="alert alert-danger">'.__( 'Ready time is required', 'recipe' ).'</div>';
												}											
											}
											else{
												$response['message'] = '<div class="alert alert-danger">'.__( 'Cook time is required', 'recipe' ).'</div>';
											}										
										}
										else{
											$response['message'] = '<div class="alert alert-danger">'.__( 'Preparation time is required', 'recipe' ).'</div>';
										}									
									}
									else{
										$response['message'] = '<div class="alert alert-danger">'.__( 'Servings is required', 'recipe' ).'</div>';
									}								
								}						
								else{
									$response['message'] = '<div class="alert alert-danger">'.__( 'Yield is required', 'recipe' ).'</div>';
								}							

							}
							else{
								$response['message'] = '<div class="alert alert-danger">'.__( 'Cuisine is required', 'recipe' ).'</div>';
							}
						}
						else{
							$response['message'] = '<div class="alert alert-danger">'.__( 'Category is required', 'recipe' ).'</div>';
						}
					}
					else{
						$response['message'] = '<div class="alert alert-danger">'.__( 'Excerpt is required', 'recipe' ).'</div>';
					}						
				}
				else{
					$response['message'] = '<div class="alert alert-danger">'.__( 'Featured image is required', 'recipe' ).'</div>';
				}
			}
			else{
				$response['message'] = '<div class="alert alert-danger">'.__( 'Description is required', 'recipe' ).'</div>';
			}
		}
		else{
			$response['message'] = '<div class="alert alert-danger">'.__( 'Title is required', 'recipe' ).'</div>';
		}
	}
	else{
		$response['message'] = '<div class="alert alert-danger">'.__( 'You do not have permission for this action', 'recipe' ).'</div>';
	}

	echo json_encode( $response );
	die();	
}

add_action('wp_ajax_save_recipe', 'recipe_save');
add_action('wp_ajax_nopriv_save_recipe', 'recipe_save');

/* UPDATE PARENT */
function recipe_update_recipe_parent( $post_id, $post ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'recipe' == $_POST['post_type'] ) {
		if( $post->post_parent !== 0 ){
			$parent_id = $post->post_parent;
			$parent = get_post( $parent_id );
			$taxonomies = get_object_taxonomies( $parent );
			
			/* CLEAR OLD TAXONOMIES */
			if( !empty( $taxonomies ) ){
				foreach( $taxonomies as $taxonomy ){
					wp_delete_object_term_relationships( $parent_id, $taxonomy );
				}
			}
			/* CLEAR OLD METAS */
			global $wpdb;
			$wpdb->query( $wpdb->prepare(
				"DELETE FROM {$wpdb->postmeta} WHERE post_id = $d",
				$parent_id
			));

			$
			/* SET NEW TAXONOMIES */
			$taxonomies = get_object_taxonomies( $parent );
			if( !empty( $taxonomies ) ){
				foreach( $taxonomies as $taxonomy ){
					$terms = wp_get_post_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
					wp_set_object_terms( $parent_id, $terms, $taxonomy );
				}
			}
			/* SET NEW METAS */
			global $wpdb;
			$wpdb->query( $wpdb->prepare(
				"UPDATE  {$wpdb->postmeta} SET post_id = $d WHERE post_id = $d",
				$parent_id,
				$post_id
			));

			wp_update_post(array(
				'ID' => $parent_id,
				'post_title' => $post->post_title,
				'post_content' => $post->post_content,
				'post_excerpt' => $post->post_excerpt
			));

			wp_delete_post( $post_id, true );
			$edit_link = admin_url( 'post.php' );
			$edit_link = esc_url( add_query_arg( array( 'post' => $parent_id, 'action' => 'edit' ), $edit_link ) );
			set_transient( get_current_user_id()."_redirect", $edit_link );

			$review_message_approved = recipe_get_option( 'review_message_approved' );
			$review_message_approved = str_replace( array( '%NAME%', '%LINK%' ), array( $parent->post_title, get_permalink( $parent_id ) ), $review_message_approved );
			$userdata = get_userdata( $parent->post_author );
			recipe_review_report( $review_message_approved, $userdata->user_email );
		}
		else{
			$review_message_approved = recipe_get_option( 'review_message_approved' );
			$review_message_approved = str_replace( array( '%NAME%', '%LINK%' ), array( $post->post_title, get_permalink( $post->ID ) ), $review_message_approved );
			$userdata = get_userdata( $post->post_author );
			recipe_review_report( $review_message_approved, $userdata->user_email );
		}
	} 

}
add_action( 'save_post', 'recipe_update_recipe_parent', 10, 2 );

global $recipe_delete_post_user;
function recipe_decline_recipe( $post_id ){
	$post = get_post( $post_id );
	if( $post->post_type == 'recipe' ){
		global $recipe_delete_post_user; 
		$recipe_delete_post_user = $post->post_author;
		$review_message_declined = recipe_get_option( 'review_message_declined' );
		$review_message_declined = str_replace( '%NAME%', $post->post_title, $review_message_declined );
		$userdata = get_userdata( $post->post_author );
		recipe_review_report( $review_message_declined, $userdata->user_email );
	}
}
add_action( 'delete_post', 'recipe_decline_recipe', 10 );

function recipe_declined_recipe( $post_id ){
	global $recipe_delete_post_user;
	recipe_calculate_average_rating( $post_id );
	recipe_calculate_average_user_rating( $recipe_delete_post_user );	
}
add_action( 'deleted_post', 'recipe_declined_recipe', 10 );

function recipe_review_report( $message, $to ){
	$inform_user = recipe_get_option( 'inform_user' );
	if( $inform_user == 'yes' ){
	    $review_subject = recipe_get_option( 'review_subject' );

	    $email_sender = recipe_get_option( 'review_sender_name' );
	    $name_sender = recipe_get_option( 'review_sender_email' );
	    $headers   = array();
	    $headers[] = "MIME-Version: 1.0";
	    $headers[] = "Content-Type: text/html; charset=ISO-8859-1"; 
	    $headers[] = "From: ".esc_attr( $name_sender )." <".esc_attr( $email_sender ).">";

	    $info = @wp_mail( $to, $review_subject, $message, $headers );
	}
}

function recipe_redirect_after_update(){
	$redirect = get_transient( get_current_user_id()."_redirect" );
	if( !empty( $redirect ) ){
		delete_transient( get_current_user_id()."_redirect" );
		exit( wp_redirect( $redirect ) );
	}
}
add_action( 'admin_menu', 'recipe_redirect_after_update' );


function recipe_remove(){
	$recipe_id = $_POST['recipe_id'];
	wp_delete_post( $recipe_id, true );
}
add_action('wp_ajax_remove_recipe', 'recipe_remove');
add_action('wp_ajax_nopriv_remove_recipe', 'recipe_remove');

/* USER META */
function recipe_add_social_meta( $user ){
    ?>
        <h3><?php _e( 'Social Links', 'recipe' ); ?></h3>

        <table class="form-table">
            <tr>
                <th><label for="facebook"><?php _e( 'Facebook Profile', 'recipe' ); ?></label></th>
                <td><input type="text" name="facebook" value="<?php echo esc_attr(get_the_author_meta( 'facebook', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="twitter"><?php _e( 'Twitter Profile', 'recipe' ); ?></label></th>
                <td><input type="text" name="twitter" value="<?php echo esc_attr(get_the_author_meta( 'twitter', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="google"><?php _e( 'Google+ Profile', 'recipe' ); ?></label></th>
                <td><input type="text" name="google" value="<?php echo esc_attr(get_the_author_meta( 'google', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="linkedin"><?php _e( 'Linkedin Profile', 'recipe' ); ?></label></th>
                <td><input type="text" name="linkedin" value="<?php echo esc_attr(get_the_author_meta( 'linkedin', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>

        <h3><?php _e( 'User Status', 'recipe' ) ?></h3>
        <?php $user_active_status = get_user_meta( $user->ID, 'user_active_status', true ); ?>
        <table class="form-table">
            <tr>
                <th><label for="user_active_status"><?php _e( 'User Status', 'recipe' ); ?></label></th>
                <td>
                	<select name="user_active_status">
                		<option <?php echo $user_active_status == 'inactive' ? 'selected="selected"' : '' ?> value="inactive"><?php _e( 'Inactive', 'recipe' ) ?></option>
                		<option <?php echo empty( $user_active_status ) || $user_active_status == 'active' ? 'selected="selected"' : '' ?> value="active"><?php _e( 'Active', 'recipe' ) ?></option>
                	</select>
                </td>
            </tr>
        </table>        
    <?php
}
add_action( 'show_user_profile', 'recipe_add_social_meta' );
add_action( 'edit_user_profile', 'recipe_add_social_meta' );


function recipe_save_user_meta( $user_id ){
    update_user_meta( $user_id,'facebook', sanitize_text_field( $_POST['facebook'] ) );
    update_user_meta( $user_id,'twitter', sanitize_text_field( $_POST['twitter'] ) );
    update_user_meta( $user_id,'google', sanitize_text_field( $_POST['google'] ) );
    update_user_meta( $user_id,'linkedin', sanitize_text_field( $_POST['linkedin'] ) );
    update_user_meta( $user_id,'user_active_status', sanitize_text_field( $_POST['user_active_status'] ) );
}
add_action( 'personal_options_update', 'recipe_save_user_meta' );
add_action( 'edit_user_profile_update', 'recipe_save_user_meta' );

/* --------------------------------------------------------USER COLUMNS---------------------------------------------------*/
/* add user activation user status to the columns */
function recipe_active_column($columns) {
    $columns['active'] = __( 'Activation Status', 'recipe' );
    return $columns;
}
add_filter('manage_users_columns', 'recipe_active_column');
 
/* add user activation user status data to the columns */
function recipe_active_column_content( $value, $column_name, $user_id ){
	if ( 'active' == $column_name ){
		$usermeta = get_user_meta( $user_id, 'user_active_status', true );
		if( empty( $usermeta ) ||  $usermeta == "active" ){
			return __( 'Activated', 'recipe' );
		}
		else{
			return __( 'Need Confirmation', 'recipe' );
		}
	}
    return $value;
}
add_action('manage_users_custom_column',  'recipe_active_column_content', 10, 3);


function recipe_cooking_level( $author_id, $recipes ){
	$cooking_levels = explode( "\n", recipe_get_option( 'cooking-levels' ) );
	if( !empty( $cooking_levels ) ){
		foreach( $cooking_levels as $level ){
			$temp = explode( ":", $level );
			$temp2 = explode( "-", $temp[1] );
			if( $recipes >= $temp2[0] && $recipes <= $temp2[1] ){
				return esc_html( $temp[0] );
				break;
			}
		}
	}

}

function recipe_difficulty_level( $post_id = '' ){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	$recipe_difficulty = get_post_meta( $post_id, 'recipe_difficulty', true );
	$difficulty_title = '';
	switch( $recipe_difficulty ){
		case 'easy' : $difficulty_title = __( 'Easy', 'recipe' ); break;
		case 'medium' : $difficulty_title = __( 'Medium', 'recipe' ); break;
		case 'advanced' : $difficulty_title = __( 'Advanced', 'recipe' ); break;
	}
	?>
	<span class="tip level <?php echo esc_attr( $recipe_difficulty ) ?>" data-title="<?php esc_attr_e( 'Difficulty: ', 'recipe' ); echo esc_attr( $difficulty_title ) ?>">
		<span class="level-bar-1"></span>
		<span class="level-bar-2"></span>
		<span class="level-bar-3"></span>
	</span>
	<?php
}

add_filter( 'ajax_query_attachments_args', 'recipe_filter_images', 10, 1 );
function recipe_filter_images($query = array()) {
	$share_images = recipe_get_option( 'share_images' );
	if( $share_images == 'no' ){
    	$query['author'] = get_current_user_id();
    }
    return $query;
}


add_action( 'admin_init', 'recipe_non_admin_users' );
function recipe_non_admin_users() {
	if ( ! current_user_can( 'manage_options' ) && !stristr( $_SERVER['PHP_SELF'], 'admin-ajax.php' ) && !stristr( $_SERVER['PHP_SELF'], 'async-upload.php' ) ) {
		wp_redirect( home_url() );
		exit;
	}
}

function recipe_parse_video_url( $url ){
	if( stristr( $url, 'tube' ) ){
		$temp = explode( '?v=', $url );
		$url = 'http://www.youtube.com/embed/'.$temp[1].'?rel=0';
	}
	else if( stristr( $url, 'daily' ) ){
		$temp = explode( '/', $url );
		$url = 'http://player.vimeo.com/video/'.$temp[1];
	}
	return $url;
}

function recipe_count_user_favourites( $author_id ){
	global $wpdb;
	$results = $wpdb->get_results( $wpdb->prepare(
		"SELECT COUNT(*) as favourites FROM {$wpdb->postmeta} WHERE meta_key = 'favourite_for' AND meta_value = %d" ,
		$author_id
		)
	);
	$results = array_shift( $results );
	return $results->favourites;	
}

/* COMMENTS REVIEWS  */
function recipe_verify_comment_meta_data( $commentdata ) {
	global $post;
   	if ( empty( $_POST['review'] ) && $post->post_type == 'recipe' ){
        wp_die( __( 'Error: please fill the required field (review).', 'recipe' ) );
    }
	return $commentdata;
}
add_filter( 'preprocess_comment', 'recipe_verify_comment_meta_data' );

function recipe_save_comment_meta_data( $comment_id ) {
	global $post;
	if( $post->post_type == 'recipe' && isset( $_POST[ 'review' ] ) && $_POST[ 'review' ] !== '-1' ){
		add_comment_meta( $comment_id, 'review', $_POST[ 'review' ] );
		recipe_calculate_average_rating( $post->ID );
		recipe_calculate_average_user_rating( $post->post_author );
	}
}
add_action( 'comment_post', 'recipe_save_comment_meta_data' );


function recipe_delete_comment( $comment_id ) {
	delete_comment_meta( $comment_id, 'review' );
	$comment = get_comment( $comment_id );
	recipe_calculate_average_rating( $comment->comment_post_ID );
	$recipe = get_post( $comment->comment_post_ID );
	recipe_calculate_average_user_rating( $recipe->post_author );	
}
add_action( 'delete_comment', 'recipe_delete_comment' );

function recipe_is_user_liked( $post_id = '' ){
	if( empty( $post_id ) ){
		$post_id = get_the_ID();
	}
	if( is_user_logged_in() ){
		global $wpdb;
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT COUNT(*) AS count FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = 'favourite_for' AND meta_value = %d" ,
				$post_id,
				get_current_user_id()
			)
		);
		$result = array_shift( $result );
		if( $result->count > 0 ){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}
function recipe_mark_favourite(){
	$post_id = esc_sql( $_POST['recipe_id'] );
	if( is_user_logged_in() ){
		if( recipe_is_user_liked( $post_id ) ){
			delete_post_meta( $post_id, 'favourite_for', get_current_user_id() );
			$favourited = get_post_meta( $post_id, 'favourited', true );
			$favourited -= 1;
			if( $favourited < 0 ){
				$favourited = 0;
			}
			update_post_meta( $post_id, 'favourited', $favourited );
			$status = 'deleted';
			$message = $favourited;
		}
		else{
			update_post_meta( $post_id, 'favourite_for', get_current_user_id() );
			$favourited = get_post_meta( $post_id, 'favourited', true );
			$favourited += 1;
			update_post_meta( $post_id, 'favourited', $favourited );
			$status = 'added';
			$message = $favourited;
		}
	}
	else{
		$status = 'error';
		$message = __( 'Please log in to add to favourites', 'recipe' );
	}
	echo json_encode(array(
		'status' => $status,
		'message' => $message
	));
	die();
}
add_action('wp_ajax_favourite', 'recipe_mark_favourite');
add_action('wp_ajax_nopriv_favourite', 'recipe_mark_favourite');
?>