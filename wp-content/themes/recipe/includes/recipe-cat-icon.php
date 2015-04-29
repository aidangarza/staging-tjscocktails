<?php

/* Custom Meta For Taxonomies */


/* Adding New */
/* icon meta */
function recipe_category_icon_add() {
	echo '
	<div class="form-field">
		<label for="term_meta[category_icon]">'.__( 'Icon:', 'pippin' ).'</label>
		<div class="category-icon-prev" style="font-size: 50px;"></div>
		<select class="recipe-cat-icon" name="term_meta[category_icon]" id="term_meta[category_icon]"> 
			'.recipe_icons_list( '' ).'
		</select>
		<p class="description">'.__( 'Select icon for the code category','pippin' ).'</p>
	</div>';
}
add_action( 'recipe-category_add_form_fields', 'recipe_category_icon_add', 10, 2 );

/* Editing */
function recipe_category_icon_edit( $term ) {
	$t_id = $term->term_id;
	$term_meta = get_option( "taxonomy_$t_id" );
	
	$value = !empty( $term_meta['category_icon'] ) ? $term_meta['category_icon'] : '';
	?>
	<table class="form-table">
		<tbody>
			<tr class="form-field form-required">
				<th scope="row"><label for="term_meta[category_icon]"><?php _e( 'Icon', 'recipe' ); ?></label></th>
				<td>
					<div class="category-icon-prev"><span class="icon <?php echo esc_attr( $value ) ?>" style="font-size: 50px;"></span></div>
					<select class="recipe-cat-icon" name="term_meta[category_icon]" id="term_meta[category_icon]"> 
						<?php echo recipe_icons_list( $value ); ?>
					</select>
				<p class="description"><?php _e( 'Select icon for the code category', 'recipe' ); ?></p></td>
			</tr>
		</tbody>
	</table>
	<?php
}
add_action( 'recipe-category_edit_form_fields', 'recipe_category_icon_edit', 10, 2 );

/* Save It */
function recipe_category_icon_save( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_recipe-category', 'recipe_category_icon_save', 10, 2 );  
add_action( 'create_recipe-category', 'recipe_category_icon_save', 10, 2 );

/* Delete meta */
function recipe_category_icon_delete( $term_id ) {
	delete_option( "taxonomy_$term_id" );
}  
add_action( 'delete_recipe-category', 'recipe_category_icon_delete', 10, 2 );

/* Add icon column */
function recipe_category_column( $columns ) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Name', 'recipe'),
		'description' => __('Description', 'recipe'),
        'slug' => __( 'Slug', 'recipe' ),
        'posts' => __( 'Codes', 'recipe' ),
		'icon' => __( 'Icon', 'recipe' )
        );
    return $new_columns;
}
add_filter("manage_edit-recipe-category_columns", 'recipe_category_column'); 

function recipe_populate_category_column( $out, $column_name, $label_id ){
    switch ( $column_name ) {
        case 'icon': 
			$term_meta = get_option( "taxonomy_$label_id" );
			$value = !empty( $term_meta['category_icon'] ) ? $term_meta['category_icon'] : '';

            $out .= '<div style="width: 20px; height: 20px;"><span class="icon '.esc_attr( $value ).'"></span></div>';
            break;
 
        default:
            break;
    }
    return $out; 
}

add_filter("manage_recipe-category_custom_column", 'recipe_populate_category_column', 10, 3);
?>