<?php
/*=============================
	DEFAULT BLOG LISTING PAGE
=============================*/
get_header();
get_template_part( 'includes/title' );
global $wp_query;

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page
$page_links_total =  $wp_query->max_num_pages;
$page_links = paginate_links( 
	array(
		'base' => esc_url( add_query_arg( 'paged', '%#%' ) ),
		'prev_next' => true,
		'end_size' => 2,
		'mid_size' => 2,
		'total' => $page_links_total,
		'current' => $cur_page,	
		'prev_next' => false,
		'type' => 'array'
	)
);	
$pagination = recipe_format_pagination( $page_links );


?>
<section>
	<div class="container">
			<?php if ( is_category() || is_tag() || is_author() || is_archive() || is_search() || is_home() ): ?>
			<div class="section-title">
				<h3 class="text-center">
					<i class="fa fa-leanpub"></i>
					<?php 
						if ( is_category() ){
							echo __('Category: ', 'recipe');
							single_cat_title();
						}
						else if( is_tag() ){
							echo __('Search by tag: ', 'recipe'). get_query_var('tag'); 
						}
						else if( is_author() ){
							echo __('Posts written by ', 'recipe'). get_the_author_meta( 'display_name' ); 
						}
						else if( is_archive() ){
							echo __('Archive for ', 'recipe'). single_month_title(' ',false); 
						}
						else if( is_search() ){ 
							echo __('Search results for: ', 'recipe').' '. get_search_query();
						}
						else if( is_home() ){
							bloginfo( 'name' );
							echo ' - ';
							bloginfo( 'description', 'display' );;
						}
						else{
							echo get_the_title( get_option( 'page_for_posts' ) );
						}
					?>
				</h3>
			</div>
		<?php endif;?>
		<div class="row">
			<div class="col-md-<?php echo is_active_sidebar( 'blog' ) ? '9' : '12' ?>">
			<?php
				if( have_posts() ){
					$counter = 0;
					while( have_posts() ){
						the_post(); 
						$post_format = get_post_format();
						$has_media = recipe_has_media();
						?>
						<div <?php post_class( 'blog-item white-block' ) ?>>

							<?php if( recipe_has_media() ): ?>
								<div class="blog-media">
									<?php include( locate_template( 'media/media'.( !empty( $post_format ) ? '-'.$post_format : '' ).'.php' ) ); ?>
								</div>
							<?php endif; ?>

							<?php if( is_sticky() ): ?>
								<div class="sticky-wrap">
									<i class="fa fa-thumb-tack sticky-pin"></i>
								</div>
							<?php endif; ?>							

							<div class="content-inner">

								<div class="blog-title-wrap">
									<?php
									$extra_class = '';
									$words = explode( " ", get_the_title() );
									foreach( $words as $word ){
										if( strlen( $word ) > 25 ){
											$extra_class = 'break-word';
										}
									}
									?>
									<a href="<?php the_permalink(); ?>" class="blog-title <?php echo esc_attr( $extra_class ); ?>">
										<h4><?php the_title(); ?></h4>
									</a>
									<p class="post-meta clearfix">
										<span><?php the_time( 'F j, Y' ); ?></span>
										<?php _e( ' By ', 'recipe' ); ?>
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
											<?php echo get_the_author_meta('display_name') ?>
										</a>
										<?php _e( ' in ', 'recipe' ) ?>
										<?php echo recipe_the_category(); ?>
									</p>						
								</div>

								<?php the_excerpt() ?>

								<div class="clearfix">
									<a href="<?php the_permalink(); ?>" class="btn pull-left">
										<?php _e( 'Continue reading', 'recipe' ) ?>
									</a>

									<div class="pull-right">
										<?php get_template_part( 'includes/share' ); ?>		
									</div>
								</div>

							</div>
						</div>
						<?php
					}
				}
				else{
					?>
					<!-- 404 -->
					<div class="widget white-block">
						<div class="widget-title-wrap">
							<h5 class="widget-title">
								<?php _e( 'Nothing Found', 'recipe' ) ?>
							</h5>
						</div>							
						<p><?php _e( 'Sorry but we could not find anything which resembles you search criteria. Try again.', 'recipe' ) ?></p>
						<?php get_search_form(); ?>
					</div>
					<!--.404 -->
					<?php
				}
				?>
				<?php
					if( !empty( $pagination ) ): ?>
						<div class="pagination">
							<?php echo $pagination; ?>
						</div>	
					<?php
					endif;
				?>				
			</div>	
			<?php if( is_active_sidebar( 'blog' ) ): ?>
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>				
		</div>		
	</div>
</section>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>