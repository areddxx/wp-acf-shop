<?php
use PostTypes\PostType;
use PostTypes\Taxonomy;
use PostTypes\Columns;

$names = [
    'name' 		=> 'example',
    'singular' 	=> __('Example', 'wpst'),
    'plural' 	=> __('Examples', 'wpst'),
    'slug' 		=> 'example'
];

$options = [
	'capability_type'   => 'post',
	'has_archive'       => false,
	'hierarchical'      => false,
	'menu_position'     => 40,
	'rewrite' 			=> array( 'with_front' => 0 ),
	'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
];

$labels = [
	'name' => '',
	'singular_name' => '',
	'add_new' => '',
	'add_new_item' => '',
	'edit_item' => '',
	'new_item' => '',
	'view_item' => '',
	'view_items' => '',
	'search_items' => '',
	'not_found' => '',
	'not_found_in_trash' => '',
	'parent_item_colon' => '',
	'all_items' => '',
	'archives' => '',
	'attributes' => '',
	'insert_into_item' => '',
	'uploaded_to_this_item' => '',
	'featured_image' => '',
	'set_featured_image' => '',
	'remove_featured_image' => '',
	'use_featured_image' => '',
	'menu_name' => '',
	'filter_items_list' => '',
	'items_list_navigation' => '',
	'items_list' => '',
	'name_admin_bar' => '',
];

$examples = new PostType($names, $options);
// $examples = new PostType($names, $options, $labels);

// Attach a taxonomy.
$examples->taxonomy('genre');

// Assign an icon.
$examples->icon('dashicons-book-alt');

/**
 * Post Type Columns
 */
// Add Columns
$examples->columns()->add([
    'new_column' => __('New Column')
]);

// Remove Columns
$examples->columns()->hide(['author', 'comments']);

// Populate Columns
$examples->columns()->populate('new_column', function($column, $post_id) {
    echo 'Value';
});

// Order Columns
$examples->columns()->order([
    'new_column' => 2,
    'genre' => 4,
    'date' => 10,
]);

// Set Columns.
// $examples->columns()->set([
//     'cb' => '<input type="checkbox" />',
//     'title' => __("Title"),
//     'new_column' => __("New Column"),
//     'genre' => __("Genres"),
//     'date' => __("Date")
// ]);

// Make sortable columns. [meta_key, numerical]
$examples->columns()->sortable([
    'new_column' => ['price', false],
]);

// Set Filters
$examples->filters(['genre']);

// Register the post type.
$examples->register();




/**
 * Taxonomy: Example
 */
$example_names = [
    'name'      => 'example',
    'singular'  => 'Example',
    'plural'    => 'Example',
    'slug'      => 'example'
];
$example = new Taxonomy($example_names);
$example->posttype('example');

$example->columns()->add([
    'taxonomy_column' => __('Taxonomy Column')
]);

// Populate Taxonomy columns.
$example->columns()->populate('taxonomy_column', function($column, $post_id) {
    echo 'Value';
});

$example->register();
