// TAXONOMY BUILDING TYPE
register_taxonomy(  
'buildings-type', 'property',  
array(  
	'hierarchical' => true,  
	'labels' => array(
		'name' => __( 'Buildings', 'realto' ),
		'singular_name' => __( 'Buildings', 'realto' ),
		'search_items' => __( 'Search Buildings', 'realto' ),
		'popular_items' => __( 'Popular Buildings', 'realto' ),
		'all_items' => __( 'All Buildings', 'realto' ),
		'edit_item' => __( 'Edit Building Type', 'realto' ),
		'update_item' => __( 'Update Building', 'realto' ),
		'add_new_item' => __( 'Add New Building', 'realto' ),
		'new_item_name' => __( 'New Building Type Name', 'realto' ),
		'separate_items_with_commas' => __( 'Separate Building Types With Commas', 'realto' ),
		'add_or_remove_items' => __( 'Add or Remove Building Types', 'realto' ),
		'choose_from_most_used' => __( 'Choose From Most Used Buildings', 'realto' ),  
		'parent' => __( 'Parent Location', 'realto' )      	
		),
	'query_var' => true,  
	'rewrite' => true  
	)  
);

function buildingltype() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'buildings-type', '', ', ', '' ) );
	echo $terms_as_text;
}


