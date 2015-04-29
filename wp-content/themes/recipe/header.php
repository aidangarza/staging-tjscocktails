<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="keywords" content="<?php echo esc_attr( recipe_get_option( 'seo_keywords' ) ) ?>"/>
    <meta name="description" content="<?php echo esc_attr( recipe_get_option( 'seo_description' ) ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Favicon -->
	<?php 
		$favicon = recipe_get_option( 'site_favicon' );
		if( !empty( $favicon['url'] ) ):
	?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( $favicon['url'] ); ?>">
	<?php
		endif;
	?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- ==================================================================================================================================
TOP BAR
======================================================================================================================================= -->

<?php
$show_top_bar = recipe_get_option( 'show_top_bar' );
if( $show_top_bar == 'yes' ):
?>
<section class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<?php
				$site_logo = recipe_get_option( 'site_logo' );
				if( !empty( $site_logo['url'] ) ):
				?>			
					<a href="<?php echo esc_url( home_url() ) ?>" class="logo">
						<img class="img-responsve" src="<?php echo esc_url( $site_logo['url'] ) ?>" alt="" height="<?php echo esc_url( $site_logo['height'] ) ?>" width="<?php echo esc_url( $site_logo['width'] ) ?>"/>
					</a>
				<?php
				endif;
				?>
			</div>		
			<div class="col-sm-6">
				<p class="account-action text-right">
					<?php
					if( is_user_logged_in() ){
						?>
						<a href="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_my_account' ) ?>" class="btn">
							<i class="fa fa-user animation"></i>
							<?php _e( 'My Account', 'recipe' ) ?>
						</a>
						<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'new_recipe' ), recipe_get_permalink_by_tpl( 'page-tpl_my_account' ) ) ); ?>" class="btn">
							<i class="fa fa-book animation"></i>
							<?php _e( 'Submit Recipe', 'recipe' ) ?>
						</a>
						<a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn">
							<i class="fa fa-sign-out animation"></i>
							<?php _e( 'Log Out', 'recipe' ) ?>
						</a>						
						<?php
					}
					else{
						?>
						<a href="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_register_login' ) ?>" class="btn">
							<i class="fa fa-user animation"></i>
							<?php _e( 'Register', 'recipe' ) ?>
						</a>
						<a href="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_register_login' ) ?>" class="btn">
							<i class="fa fa-sign-in animation"></i>
							<?php _e( 'Log In', 'recipe' ) ?>
						</a>						
						<a href="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_register_login' ) ?>" class="btn">
							<i class="fa fa-user animation"></i>
							<?php _e( 'Submit Recipe', 'recipe' ) ?>
						</a>						
						<?php
					}
					?>
				</p>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
$featured_recipes = recipe_get_option( 'featured_recipes' );
if( !empty( $featured_recipes ) && is_front_page() ){
	?>
	<section class="main-slider" data-auto="<?php echo esc_attr( recipe_get_option( 'featured_slider_rotate' ) ); ?>">
		<?php
		$counter = 0;
		foreach( $featured_recipes as $recipe_slide ){
			$counter++;
			$recipe = get_post( $recipe_slide );
			?>
			<div class="main-slider-item">
				<?php echo get_the_post_thumbnail( $recipe_slide, 'full', array( 'class' => 'slide-item img-responsive' ) ); ?>
				<div class="slider-caption">
					<canvas id="canvas_<?php echo esc_attr( $counter ); ?>"></canvas>
					<div class="slider-caption-overlay"></div>
					<div class="main-caption-content">
						<a href="<?php echo get_permalink( $recipe_slide ); ?>">
							<h1 class="animation"><?php echo $recipe->post_title ?></h1>							
						</a>
						<p class="slider-excerpt">
							<?php echo $recipe->post_excerpt; ?>
						</p>
						<ul class="list-unstyled list-inline recipe-meta clearfix">
							<li>
								<div class="avatar">
									<?php
									$avatar_url = recipe_get_avatar_url( get_avatar( $recipe->post_author, 150 ) );
									if( !empty( $avatar_url ) ):
									?>
										<img src="<?php echo esc_url( $avatar_url ) ?>" alt="author" width="40" height="40"/>
									<?php endif; ?>	

									<?php _e( 'By ', 'recipe' ); ?>
									<a href="<?php echo esc_url( get_author_posts_url( $recipe->post_author ) ) ?>">
										<?php echo get_the_author_meta( 'display_name', $recipe->post_author ); ?>						
									</a>
								</div>								
							</li>
							<li>
								<?php recipe_difficulty_level( $recipe_slide ); ?>
							</li>
							<?php
							$recipe_yield = get_post_meta( $recipe_slide, 'recipe_yield', true );
							if( !empty( $recipe_yield ) ):
							?>
								<li class="tip" data-title="<?php esc_attr_e( 'Yield', 'recipe' ) ?>">
									<i class="fa fa-table"></i>
									<?php echo $recipe_yield; ?>
								</li>
							<?php endif; ?>

							<?php
							$recipe_servings = get_post_meta( $recipe_slide, 'recipe_servings', true );
							if( !empty( $recipe_servings ) ):
							?>
								<li class="tip" data-title="<?php esc_attr_e( 'Servings', 'recipe' ) ?>">
									<i class="fa fa-users"></i>
									<?php echo $recipe_servings; ?>
								</li>
							<?php endif; ?>

							<?php
							$recipe_cook_time = get_post_meta( $recipe_slide, 'recipe_cook_time', true );
							if( !empty( $recipe_cook_time ) ):
							?>
								<li class="tip" data-title="<?php esc_attr_e( 'Cook Time', 'recipe' ) ?>">
									<i class="fa fa-clock-o"></i>
									<?php echo $recipe_cook_time; ?>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</section>
	<?php
}
?>

<section class="navigation-bar white-block">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="navigation">
					<button class="navbar-toggle button-white menu" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'recipe' ) ?></span>
						<i class="fa fa-bars fa-3x"></i>
					</button>
					<div class="navbar navbar-default" role="navigation">
						<div class="collapse navbar-collapse">
							<?php
							if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'top-navigation' ] ) ) {
								wp_nav_menu( array(
									'theme_location'  	=> 'top-navigation',
									'menu_class'        => 'nav navbar-nav',
									'container'			=> false,
									'echo'          	=> true,
									'items_wrap'        => '<ul class="%2$s">%3$s
															<li>
																<form method="get" action="'.esc_url( home_url() ).'">
																	<input type="text" placeholder="'.esc_attr__( 'Type term and hit enter...', 'recipe' ).'" name="s" class="main-search-input"/>
																</form>
																<a href="javascript:;" class="main-search">
																	<i class="fa fa-search"></i>
																</a>
															</li></ul>',
									'walker' 			=> new recipe_walker
								) );
							}
							?>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</section>