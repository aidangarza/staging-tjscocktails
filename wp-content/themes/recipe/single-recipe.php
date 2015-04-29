<?php
/*=============================
	DEFAULT SINGLE
=============================*/
get_header();
the_post();

$post_pages = wp_link_pages( 
	array(
		'before' => '',
		'after' => '',
		'link_before'      => '<span>',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'nextpagelink'     => __( '&raquo;', 'recipe' ),
		'previouspagelink' => __( '&laquo;', 'recipe' ),			
		'separator'        => ' ',
		'echo'			   => 0
	) 
);

$recipe_video = get_post_meta( get_the_ID(), 'recipe_video', true );
$recipe_video = recipe_parse_video_url( $recipe_video );
$recipe_images = recipe_smeta_images( 'recipe_images', get_the_ID(), array() );
$permalink = recipe_get_permalink_by_tpl( 'page-tpl_search' );
$active_tab_set = false;
$active_tab_link_set = false;

$review_count = get_post_meta( get_the_ID(), 'count_review', true );
if( empty( $review_count ) ){
	$review_count = 0;
}

$average_review = get_post_meta( get_the_ID(), 'average_review', true );
if( empty( $average_review ) ){
	$average_review = 0.0;
}

$featured_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
?>
<div class="hidden" itemscope itemtype="http://schema.org/Recipe">
    <h1 itemprop="name"><?php the_title(); ?></h1>
    <img itemprop="image" src="<?php echo !empty( $featured_image_data[0] ) ? esc_url( $featured_image_data[0] ) : ''; ?>" alt=""/>
    By <span itemprop="author" itemscope itemtype="http://schema.org/Person">
    <span itemprop="name"><?php echo get_the_author_meta('display_name'); ?></span></span>
    <?php _e( 'Published: ', 'recipe' ) ?><time datetime="<?php the_time( 'Y-m-d' ) ?>" itemprop="datePublished"><?php the_time( 'F j, Y' ) ?></time>
    <span itemprop="description"><?php echo get_the_excerpt(); ?></span>
    <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <meta itemprop="worstRating" content="0" />
    <span itemprop="ratingValue"><?php echo $average_review; ?></span><?php _e( ' out of ', 'recipe' ) ?>
    <span itemprop="bestRating">5</span>
	 <?php _e( 'stars based on', 'recipe' ) ?>
    <span itemprop="reviewCount"><?php echo $review_count; ?></span> <?php _e( 'reviews', 'recipe' ) ?> </span>
    <?php _e( 'Yield: ', 'recipe' ) ?><span itemprop="recipeYield"><?php echo get_post_meta( get_the_ID(), 'recipe_yield', true );?></span>
</div>
<section class="single-blog">
	<input type="hidden" name="post-id" value="<?php the_ID() ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="white-block single-item">
					<div class="blog-media">			
						<div class="tab-content">

							<?php if( has_post_thumbnail() ): ?>
								<div role="tabpanel" class="tab-pane fade <?php if( $active_tab_set == false ) { echo 'in active'; $active_tab_set = true; } ?>" id="tab_featured">
									<div class="embed-responsive embed-responsive-16by9">
										<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'embed-responsive-item featured-image' ) ) ?>
									</div>									
								</div>
								<?php
								$class = '';
								if( $active_tab_link_set == false ) { 
									$class = 'active'; 
									$active_tab_link_set = true;
								}
								$available_media[] = '<li role="presentation" class="'.esc_attr( $class ).' WIDTH-CLASS"><a href="#tab_featured" role="tab" data-toggle="tab">'. __( 'IMAGE', 'recipe' ) .'</a></li>';
								?>
							<?php endif; ?>

							<?php if( !empty( $recipe_images ) ): ?>
								<div role="tabpanel" class="tab-pane fade <?php if( $active_tab_set == false ) { echo 'in active'; $active_tab_set = true; } ?>" id="tab_gallery">
									<div class="embed-responsive embed-responsive-16by9">
										<ul class="list-unstyled post-slider embed-responsive-item">
											<?php
											foreach( $recipe_images as $recipe_image ){
												$image_data = wp_get_attachment_image_src( $recipe_image, 'post-thumbnail' );
												if( !empty( $image_data ) ){
													echo '<li><img src="'.esc_url( $image_data[0] ).'" class="embed-responsive-item" alt=""/></li>';
												}
											}
											?>
										</ul>
									</div>
								</div>
								<?php
								$class = '';
								if( $active_tab_link_set == false ) { 
									$class = 'active'; 
									$active_tab_link_set = true;
								}
								$available_media[] = '<li role="presentation" class="'.esc_attr( $class ).' WIDTH-CLASS"><a href="#tab_gallery" role="tab" data-toggle="tab">'. __( 'GALLERY', 'recipe' ) .'</a></li>';
								?>
							<?php endif; ?>

							<?php if( !empty( $recipe_video ) ): ?>
								<div role="tabpanel" class="tab-pane fade <?php if( $active_tab_set == false ) { echo 'in active'; $active_tab_set = true; } ?>" id="tab_video">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe src="<?php echo esc_url( $recipe_video ); ?>" class="embed-responsive-item"></iframe>
									</div>
								</div>
								<?php
								$class = '';
								if( $active_tab_link_set == false ) { 
									$class = 'active'; 
									$active_tab_link_set = true;
								}
								$available_media[] = '<li role="presentation" class="'.esc_attr( $class ).' WIDTH-CLASS"><a href="#tab_video" role="tab" data-toggle="tab">'. __( 'VIDEO', 'recipe' ) .'</a></li>';
								?>
							<?php endif; ?>

						</div>

						<?php if( sizeof( $available_media ) > 0 ): ?>
							<ul class="nav nav-tabs" role="tablist">
								<?php 
								foreach( $available_media as $tab_link ){
									echo str_replace( 'WIDTH-CLASS', 'recipe-tab-'.sizeof( $available_media ), $tab_link );
								}
								?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="content-inner">

						<h3 class="post-title"><?php the_title() ?></h3>
						
						<div class="post-content clearfix">
							<?php the_content(); ?>							
						</div>


						<?php
						$recipe_ingredient = get_post_meta( get_the_ID(), 'recipe_ingredient', true );
						$recipe_steps = get_post_meta( get_the_ID(), 'recipe_steps', true );
						if( !empty( $recipe_ingredient ) && !empty( $recipe_steps ) ):
						?>
							<hr />
							<div class="row recipe-details">
								<div class="col-sm-6">
									<h4 class="section-title"><i class="fa fa-eyedropper"></i><?php _e( 'Ingredients', 'recipe' ); ?></h4>
									<ul class="list-unstyled ingredients-list">
										<?php 
										$recipe_ingredients = explode( "\n", $recipe_ingredient );
										if( !empty( $recipe_ingredients ) ){
											foreach( $recipe_ingredients as $ingredient ){
												if( !empty( $ingredient ) ){
													echo '<li>';
														if( $ingredient[0] !== '#' ){
															echo '<a href="javascript:;" class="fake-checkbox"><i class="fa fa-check"></i></a>';
															echo $ingredient;
														}
														else{
															echo '<h5>'.str_replace( "#", "", $ingredient ).'</h5>';
														}
													echo '</li>';
												}
											}
										}
										?>
									</ul>
								</div>
								<div class="col-sm-6">
									<h4 class="section-title ingredients"><i class="fa fa-sort-numeric-asc"></i><?php _e( 'Steps', 'recipe' ); ?></h4>
									<ul class="list-unstyled ingredients-list steps-list">
										<?php 
										$recipe_steps = explode( "--", $recipe_steps );
										$counter = 1;
										if( !empty( $recipe_steps ) ){
											foreach( $recipe_steps as $step ){
												if( !empty( $step ) ){
													echo '<li>';
														echo '<a href="javascript:;" class="fake-checkbox"><i class="fa fa-check"></i></a> '.__( 'Step', 'recipe' ).$counter;
														echo '<div class="step-content">';
															echo apply_filters( 'the_content', $step );
														echo '</div>';
													echo '</li>';
													$counter++;
												}
											}
										}
										?>
									</ul>
								</div>
							</div>
						<?php endif; ?>
						
						<hr />
						<?php get_template_part( 'includes/share' ) ?>
					</div>
				</div>

				<?php 
				$tags = recipe_custom_tax( 'recipe-tag' );
				if( !empty( $tags ) ):
				?>
					<div class="post-tags white-block">
						<div class="content-inner">
							<?php _e( '<i class="fa fa-tags"></i>'.__( 'Recipe tags: ', 'recipe' ), 'recipe' ); echo $tags; ?>
						</div>
					</div>
				<?php
				endif;
				?>				
						
				<?php comments_template( '', true ) ?>

			</div>
			<div class="col-md-3">
				<div class="widget white-block clearfix">
					<ul class="list-unstyled single-nutritions">
						<li class="recipe-avatar">
							<?php
							$avatar_url = recipe_get_avatar_url( get_avatar( get_the_author_meta('ID'), 150 ) );
							if( !empty( $avatar_url ) ):
							?>
								<img src="<?php echo esc_url( $avatar_url ) ?>" class="img-responsive" alt="author"/>
							<?php
							endif;
							?>						
							<?php _e( 'By ', 'recipe' ) ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php echo get_the_author_meta('display_name'); ?></a>
						</li>
						<li>
							<?php _e( 'Preparation Time:', 'recipe' ) ?> <span class="value"><?php echo get_post_meta( get_the_ID(), 'recipe_prep_time', true );?></span>
						</li>
						<li>
							<?php _e( 'Cook Time:', 'recipe' ) ?> <span class="value"><?php echo get_post_meta( get_the_ID(), 'recipe_cook_time', true );?></span>
						</li>
						<li>
							<?php _e( 'Ready Time:', 'recipe' ) ?> <span class="value"><?php echo get_post_meta( get_the_ID(), 'recipe_ready_in', true );?></span>
						</li>
						<li>
							<?php _e( 'Yield:', 'recipe' ) ?> <span class="value"><?php echo get_post_meta( get_the_ID(), 'recipe_yield', true );?></span>
						</li>						
						<li>
							<?php _e( 'Servings:', 'recipe' ) ?> <span class="value"><?php echo get_post_meta( get_the_ID(), 'recipe_servings', true );?></span>
						</li>
						<li>
							<?php
						    $recipe_cuisine = get_the_terms( get_the_ID(), 'recipe-cuisine' );
						    if( !empty( $recipe_cuisine ) ){
						    	$recipe_cuisine = array_shift( $recipe_cuisine );
						    }
							?>
							<?php _e( 'Cuisine:', 'recipe' ) ?> 
							<span class="value">
								<a href="<?php echo esc_url( add_query_arg( array( 'recipe-cuisine' => $recipe_cuisine->slug ), $permalink ) ) ?>"><?php echo $recipe_cuisine->name;?></a>
							</span>
						</li>
						<li>
							<?php
						    $recipe_categories = get_the_terms( get_the_ID(), 'recipe-category' );
						    $categories_list = array();
						    if( !empty( $recipe_categories ) ){
						    	foreach( $recipe_categories as $recipe_category ){
						    		$categories_list[] = '<a href="'.esc_url( add_query_arg( array( 'recipe-category' => $recipe_category->slug ), $permalink ) ) .'">'.$recipe_category->name.'</a>';
						    	}
						    }
							?>
							<?php _e( 'Category:', 'recipe' ) ?>
							<span class="value"><?php echo join( ', ', $categories_list ); ?></span>
						</li>
						<li>
							<?php _e( 'Difficulty Level:', 'recipe' ) ?>
							<span class="value"><?php recipe_difficulty_level() ?></span>
						</li>
						<li>
							<?php _e( 'Ratings:', 'recipe' ) ?>
							<span class="value"><?php echo recipe_calculate_ratings(); ?></span>
						</li>
						<li>
							<?php _e( 'Created:', 'recipe' ) ?>
							<span class="value"><?php the_time( 'F j, Y' ) ?></span>
						</li>						
					</ul>
				</div>

				<?php
				$recipe_nutritions = get_post_meta( get_the_ID(), 'recipe_nutritions', true );
				if( !empty( $recipe_nutritions ) ):
				?>
					<div class="widget white-block clearfix">
						<div class="widget-title-wrap">
							<h5 class="widget-title">
								<?php _e( 'Nutrition Facts', 'recipe' ) ?>
							</h5>
						</div>
						<ul class="list-unstyled single-nutritions">
							<?php
							$recipe_nutritions = explode( "\n", $recipe_nutritions );
							foreach( $recipe_nutritions as $nutrition ){
								$temp = explode( ":", $nutrition );
								echo '<li>'.$temp[0].':<span class="value">'.$temp[1].'</span></li>';
							}
							?>
						</ul>
					</div>
				<?php
				endif;
				?>

				<div class="widget white-block clearfix">
					<ul class="list-unstyled recipe-actions list-inline">
						<li class="tip animation" data-title="<?php echo esc_attr( recipe_get_post_extra( 'likes' ) );?>">
							<a href="javascript:;" class="post-like" data-post_id="<?php the_ID(); ?>">
								<i class="fa fa-thumbs-o-up fa-fw"></i>
							</a>
						</li>
						<li class="tip animation" data-title="<?php echo recipe_get_post_extra( 'views' ); ?>">
							<i class="fa fa-eye fa-fw"></i> 
						</li>
						<?php 
						$favourited = get_post_meta( get_the_ID(), 'favourited', true );
						if( empty( $favourited ) ){
							$favourited = 0;
						}
						?>
						<li class="tip animation" data-title="<?php echo esc_attr( $favourited );?>">
							<a href="javascript:;" class="recipe-favourite" data-recipe_id="<?php the_ID(); ?>">
								<?php if( recipe_is_user_liked() ): ?>
									<i class="fa fa-heart fa-fw"></i> 
								<?php else: ?>
									<i class="fa fa-heart-o fa-fw"></i> 
								<?php endif; ?>
							</a>
						</li>
						<li class="tip animation" data-title="<?php esc_attr_e( 'Print recipe', 'recipe' ) ?>">
							<a href="javascript:;" class="print-recipe">
								<i class="fa fa-print fa-fw"></i>
							</a>
						</li>						
					</ul>
				</div>

				<?php
				$similar_recipes_num = recipe_get_option( 'similar_recipes_num' );
				if( !empty( $similar_recipes_num ) && $similar_recipes_num > 0 ):
					$similar = new WP_Query(array(
						'post_type' => 'recipe',
						'posts_per_page' => $similar_recipes_num,
						'post__not_in' => array( get_the_ID() ),
						'post_status' => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'recipe-category',
								'field' => 'slug',
								'terms' => array( $recipe_category->slug )
							)
						)
					));
					if( $similar->have_posts() ):
					?>
						<div class="widget white-block clearfix">
							<div class="widget-title-wrap">
								<h5 class="widget-title">
									<?php _e( 'Similar Recipes', 'recipe' ) ?>
								</h5>
							</div>
							<ul class="list-unstyled similar-recipes">
								<?php
								while( $similar->have_posts() ){
									$similar->the_post();
									?>
									<li>
										<a href="<?php the_permalink() ?>" class="no-margin">
											<div class="embed-responsive embed-responsive-16by9">
												<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'embed-responsive-item' ) ); ?>
											</div>
										</a>
										<a href="<?php the_permalink() ?>">
											<?php the_title(); ?>
										</a>									
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					<?php endif; 
				endif;
				?>

				<?php get_sidebar( 'recipe' ); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>