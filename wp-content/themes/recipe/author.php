<?php
get_header();
get_template_part( 'includes/title' );
$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
$permalink = get_author_posts_url( $author->ID );

$recipes = recipe_count_custom_post( 'recipe', array(
	'author' => $author->ID
));
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="white-block">
					<div class="my-sidebar">
						<?php include( locate_template( 'includes/profile-pages/sidebar-avatar.php' ) ) ?>					
						<ul class="list-unstyled my-menu">
							<li>
								<a href="javascript:;" class="clearfix">
									<i class="fa fa-cutlery"></i> <?php _e( 'Cooking Level:', 'recipe' ) ?>
									<span class="right-value">
										<?php
										echo recipe_cooking_level( $author->ID, $recipes );
										?>
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" class="clearfix">
									<i class="fa fa-book"></i> <?php _e( 'Recipes:', 'recipe' ) ?>
									<span class="right-value">
										<?php echo $recipes ?>
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" class="clearfix">
									<i class="fa fa-heart"></i> <?php _e( 'Favourite Recipes:', 'recipe' ) ?>
									<span class="right-value">
										<?php 
										echo recipe_count_user_favourites( $author->ID );
										?>
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" class="clearfix">
									<i class="fa fa-star"></i> <?php _e( 'User Ratings:', 'recipe' ) ?>
									<span class="right-value">
										<?php
										recipe_user_rating( $author->ID );
										?>
									</span>
								</a>
							</li>							
						</ul>
					</div>
				</div>				
			</div>
			<div class="col-sm-9 single-recipe author">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#tab_about" role="tab" data-toggle="tab"><?php _e( 'About Author', 'recipe' ) ?></a>
					</li>
					<li role="presentation" class="">
						<a href="#tab_recipes" role="tab" data-toggle="tab"><?php _e( 'Author Recipes', 'recipe' ) ?></a>
					</li>
					<li role="presentation" class="">
						<a href="#tab_fav_recipes" role="tab" data-toggle="tab"><?php _e( 'Favourite Recipes', 'recipe' ) ?></a>
					</li>							
				</ul>			
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="tab_about">
						<div class="white-block">
							<div class="content-inner">
								<?php
								$description = get_user_meta ($author->ID, 'description', true );
								echo apply_filters( 'the_content',  $description );
								?>
							</div>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="tab_recipes">
						<div class="white-block">
							<div class="content-inner">
								<h4 class="no-top-margin"><?php echo $nice_name.'\'s '; _e( 'recipes', 'recipe' ) ?></h4>
								<hr />
								<p class="pretable-loading"><?php _e( 'Loading...', 'recipe' ) ?></p>
								<div class="bt-table">
									<table data-toggle="table" data-search-align="left" data-search="true" data-classes="table table-striped">
										<thead>
										    <tr>
										        <th data-field="image">
										        	<?php _e( 'Image', 'recipe' ); ?>
										        </th>
										        <th data-field="name" data-sortable="true">
										            <?php _e( 'Name', 'recipe' ); ?>
										        </th>
										        <th data-field="ratings">
										            <?php _e( 'Ratings', 'recipe' ); ?>
										        </th>
										        <th data-field="difficulty">
										            <?php _e( 'Difficulty', 'recipe' ); ?>
										        </th>										        
										    </tr>
										</thead>
										<?php
										$recipes = new WP_Query(array(
											'post_type' => 'recipe',
											'posts_per_page' => '-1',
											'post_status' => 'publish',
											'author' => $author->ID
										));										
										if( $recipes->have_posts() ){
											?>
											<tbody>
											<?php
											while( $recipes->have_posts() ){
												$recipes->the_post();
												?>
												<tr>
													<td>
														<?php
														if( has_post_thumbnail() ){
															the_post_thumbnail( 'thumbnail' );
														}
														?>
													</td>
													<td>
														<a href="<?php the_permalink(); ?>" target="_blank">
															<?php the_title(); ?>
														</a>
													</td>
													<td>
														<?php echo recipe_calculate_ratings(); ?>
													</td>
													<td>
														<?php echo recipe_difficulty_level(); ?>
													</td>													
												</tr>
												<?php
											}
											?>
											</tbody>
											<?php		
										}
										wp_reset_query();
										?>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="tab_fav_recipes">
						<div class="white-block">
							<div class="content-inner">
								<h4 class="no-top-margin"><?php echo $nice_name.'\'s '; _e( 'favourited recipes', 'recipe' ) ?></h4>
								<hr />
								<p class="pretable-loading"><?php _e( 'Loading...', 'recipe' ) ?></p>
								<div class="bt-table">
									<table data-toggle="table" data-search-align="left" data-search="true" data-classes="table table-striped">
										<thead>
										    <tr>
										        <th data-field="image">
										        	<?php _e( 'Image', 'recipe' ); ?>
										        </th>
										        <th data-field="name" data-sortable="true">
										            <?php _e( 'Name', 'recipe' ); ?>
										        </th>
										        <th data-field="ratings">
										            <?php _e( 'Ratings', 'recipe' ); ?>
										        </th>
										        <th data-field="difficulty">
										            <?php _e( 'Difficulty', 'recipe' ); ?>
										        </th>										        
										    </tr>
										</thead>
										<?php
										$recipes = new WP_Query(array(
											'post_type' => 'recipe',
											'posts_per_page' => '-1',
											'post_status' => 'publish',
											'meta_query' => array(
												array(
													'key' => 'favourite_for',
													'value' => $author->ID,
													'compare' => '='
												)
											)
										));										
										if( $recipes->have_posts() ){
											?>
											<tbody>
											<?php
											while( $recipes->have_posts() ){
												$recipes->the_post();
												?>
												<tr>
													<td>
														<?php
														if( has_post_thumbnail() ){
															the_post_thumbnail( 'thumbnail' );
														}
														?>
													</td>
													<td>
														<a href="<?php the_permalink(); ?>" target="_blank">
															<?php the_title(); ?>
														</a>
													</td>
													<td>
														<?php echo recipe_calculate_ratings(); ?>
													</td>
													<td>
														<?php echo recipe_difficulty_level(); ?>
													</td>													
												</tr>
												<?php
											}
											?>
											</tbody>
											<?php		
										}
										wp_reset_query();
										?>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>