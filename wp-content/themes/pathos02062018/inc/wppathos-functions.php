<?php 

add_action( 'init', 'path_theme_product_init' );
function path_theme_product_init() 
{
	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'codopoliz' ),
		'singular_name'      => _x( 'Products', 'post type singular name', 'codopoliz' ),
		'menu_name'          => _x( 'Product (Foods)', 'admin menu', 'codopoliz' ),
		'name_admin_bar'     => _x( 'Pathos Product', 'add new on admin bar', 'codopoliz' ),
		'add_new'            => _x( 'Add New', 'Product', 'codopoliz' ),
		'add_new_item'       => __( 'Add New Product', 'codopoliz' ),
		'new_item'           => __( 'New Product', 'codopoliz' ),
		'edit_item'          => __( 'Edit Product', 'codopoliz' ),
		'view_item'          => __( 'View Product', 'codopoliz' ),
		'all_items'          => __( 'All Products', 'codopoliz' ),
		'search_items'       => __( 'Search Products', 'codopoliz' ),
		'parent_item_colon'  => __( 'ParentProducts:', 'codopoliz' ),
		'not_found'          => __( 'No Products found.', 'codopoliz' ),
		'not_found_in_trash' => __( 'No Products found in Trash.', 'codopoliz' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'codopoliz' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'pathosproduct' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'     	 => 'dashicons-products',
		'supports'           => array( 'title','editor','thumbnail')
	);

	register_post_type( 'pathosproduct', $args );
}



add_action( 'init', 'pathoproduct_taxonomies', 0 );

function pathoproduct_taxonomies() 
{
	$labels = array(
		'name'                       => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Categories' ),
		'popular_items'              => __( 'Popular Categories' ),
		'all_items'                  => __( 'All Categories' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'add_new_item'               => __( 'Add New Category' ),
		'new_item_name'              => __( 'New Category Name' ),
		'add_or_remove_items'        => __( 'Add or remove Categories' ),
		'not_found'                  => __( 'No Categories found.' ),
		'menu_name'                  => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'product_category' ),
	);

	register_taxonomy( 'product_category', 'pathosproduct', $args );
}





function get_qTrans_TitleText($text) {
 	$language = qtrans_getLanguage();
	/*preg_match('/<!--:'.$language.'-->(.*?)<!--:-->/', $text, $matches);
	return strip_tags($matches[0]);
 */
	$content = qtrans_use($language, $text,false); 
	return 	$content;
 }

?>