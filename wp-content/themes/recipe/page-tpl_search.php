<?php
/*
	Template Name: Search Page
*/
get_header();
the_post();

$recipe_category = isset( $_GET['recipe-category'] ) ? esc_sql( $_GET['recipe-category'] ) : '';
$recipe_cuisine = isset( $_GET['recipe-cuisine'] ) ? esc_sql( $_GET['recipe-cuisine'] ) : '';
$recipe_tag = isset( $_GET['recipe-tag'] ) ? esc_sql( $_GET['recipe-tag'] ) : '';
$recipe_ingrediants = isset( $_GET['ingrediants'] ) ? esc_sql( $_GET['ingrediants'] ) : '';
$keyword = isset( $_GET['keyword'] ) ? esc_sql( $_GET['keyword'] ) : '';
$sort = isset( $_GET['sort'] ) ? esc_sql( $_GET['sort'] ) : '';

$args = array(
	'post_type' => 'recipe',
	'post_status' => 'publish',
	'tax_query' => array(
		'relation' => 'AND'
	),
	'meta_query' => array(
		'relation' => 'OR'
	)
);

if( !empty( $recipe_category ) ){
	$args['tax_query'][] = array(
		'taxonomy' => 'recipe-category',
		'field'    => 'slug',
		'terms'    => $recipe_category,
	);
}

if( !empty( $recipe_cuisin ) ){
	$args['tax_query'][] = array(
		'taxonomy' => 'recipe-cuisin',
		'field'    => 'slug',
		'terms'    => $recipe_cuisin,
	);
}

if( !empty( $recipe_tag ) ){
	$args['tax_query'][] = array(
		'taxonomy' => 'recipe-tag',
		'field'    => 'slug',
		'terms'    => $recipe_tag,
	);
}

if( !empty( $recipe_ingrediants ) ){
	$ingrediants = explode( " ", $recipe_ingrediants );
	foreach( $ingrediants as $ingrediant ){
		$args['meta_query'][] = array(
			'key' => 'recipe_ingrediant',
			'value' => $ingrediant,
			'compare' => 'LIKE'
		);
	}
}

if( !empty( $keyword ) ){
	$args['s'] = $keyword;
}

if( !empty( $sort ) ){
	$sort_array = explode( "-", $sort );
	$args['order'] = $sort_array[1];
	$args['order'] = $sort_array[1];
	if( $sort_array[0] == 'title' ){
		$args['orderby'] = 'title';
	}
	else if( $sort_array[0] == 'ratings' ){
		$args['orderby'] = 'meta_value_num';
		$args['meta_key'] = 'average_review';
	}
}

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page
$args['paged'] = $cur_page;
$recipes = new WP_Query( $args );
$page_links_total =  $recipes->max_num_pages;
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

<section class="search-filter">
	<div class="container">
		<form method="get" action="<?php echo esc_url( recipe_get_permalink_by_tpl( 'page-tpl_search' ) ); ?>">
			<div class="white-block">
				<div class="content-inner">
					<div class="row">
						<div class="col-sm-4">
				            <div class="form-group">
				                <label for="recipe-category"><?php _e( 'Recipe Category', 'recipe' );?> </label>
				                <select name="recipe-category" id="recipe-category" class="form-control">
									<option value=""><?php _e( '- Select -', 'recipe' ) ?></option>
									<?php
									$terms = get_terms( 'recipe-category' );
									if( !empty( $terms ) ){
										foreach( $terms as $term ){
											echo '<option value="'.esc_attr( $term->slug ).'" '.( $term->slug == $recipe_category ? 'selected="selected"' : '' ).'>'.$term->name.'</option>';
										}
									}
									?>
				                </select>
				            </div>
						</div>
						<div class="col-sm-4">
				            <div class="form-group">
				                <label for="recipe-cuisine"><?php _e( 'Recipe Cuisine', 'recipe' );?> </label>
				                <select name="recipe-cuisine" id="recipe-cuisine" class="form-control">
				                	<option value=""><?php _e( '- Select -', 'recipe' ) ?></option>
									<?php
									$terms = get_terms( 'recipe-cuisine' );
									if( !empty( $terms ) ){
										foreach( $terms as $term ){
											echo '<option value="'.esc_attr( $term->slug ).'" '.( $term->slug == $recipe_cuisine ? 'selected="selected"' : '' ).'>'.$term->name.'</option>';
										}
									}
									?>
				                </select>
				            </div>
						</div>
						<div class="col-sm-4">
				            <div class="form-group">
				                <label for="sort"><?php _e( 'Sort Recipes', 'recipe' );?> </label>
				                <select name="sort" id="sort" class="form-control">
				                	<option value=""><?php _e( '- Select -', 'recipe' ) ?></option>
				                	<option value="ratings-desc" <?php echo $sort == 'ratings-desc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Ratings (highest first)', 'recipe' ) ?></option>
				                	<option value="ratings-asc" <?php echo $sort == 'ratings-asc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Ratings (lowest first)', 'recipe' ) ?></option>
				                	<option value="date-desc" <?php echo $sort == 'date-desc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Date (newest first)', 'recipe' ) ?></option>
				                	<option value="date-asc" <?php echo $sort == 'date-asc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Date (oldest first)', 'recipe' ) ?></option>
				                	<option value="title-desc" <?php echo $sort == 'title-desc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Title (descending)', 'recipe' ) ?></option>
				                	<option value="title-asc" <?php echo $sort == 'title-asc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Title (ascending)', 'recipe' ) ?></option>
				                	<option value="likes-desc" <?php echo $sort == 'likes-desc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Likes (most liked first)', 'recipe' ) ?></option>
				                	<option value="likes-asc" <?php echo $sort == 'likes-asc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Likes (most liked last)', 'recipe' ) ?></option>
				                	<option value="views-desc" <?php echo $sort == 'views-desc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Views (most viewed first)', 'recipe' ) ?></option>
				                	<option value="views-asc" <?php echo $sort == 'views-asc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Views (most viewed last)', 'recipe' ) ?></option>
				                	<option value="favourited-desc" <?php echo $sort == 'favourited-desc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Favourites (most favourited first)', 'recipe' ) ?></option>
				                	<option value="favourited-asc" <?php echo $sort == 'favourited-asc' ? esc_attr( 'selected="selected"' ) : '' ?>><?php _e( 'Favourites (most favourited last)', 'recipe' ) ?></option>				                	
				                </select>
				            </div>
						</div>							
					</div>
					<div class="row">
						<div class="col-sm-4">
				            <div class="form-group">
				                <label for="ingrediants"><?php _e( 'Ingredients', 'recipe' );?> </label>
				                <input type="text" name="ingrediants" id="ingrediants" class="form-control" value="<?php echo esc_attr( $recipe_ingrediants ) ?>" />
				            </div>
						</div>
						<div class="col-sm-4">
				            <div class="form-group">
				                <label for="keyword"><?php _e( 'Keyword', 'recipe' );?> </label>
				                <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo esc_attr( $keyword ) ?>" />
				            </div>
						</div>
						<div class="col-sm-4">
							<label>&nbsp;</label>
							<a href="javascript:;" class="btn submit-live-form"><?php _e( 'Search For Recipes', 'recipe' ) ?></a>	
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<?php if( $recipes->have_posts() ): ?>
	<section>
		<div class="container">
			<div class="row">
				<?php
				$counter = 0;
				while( $recipes->have_posts() ){
					$recipes->the_post();
					if( $counter == 3 ){
						echo '</div><div class="row">';
						$counter = 0;
					}
					$counter++;
					echo '<div class="col-sm-4">';
						 include( locate_template( 'includes/recipe-box.php' ) );
					echo '</div>';
				}
				?>
			</div>
			<?php if( !empty( $pagination ) ): ?>
				<div class="pagination">
					<?php echo $pagination; ?>
				</div>	
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>