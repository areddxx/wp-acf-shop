<?php

use PostTypes\PostType;
use PostTypes\Taxonomy;
use PostTypes\Columns;

$names = [
    'name'         => 'product',
    'singular'     => __('Product', 'wpst'),
    'plural'     => __('Products', 'wpst'),
    'slug'         => 'product'
];

$options = [
    'capability_type'   => 'post',
    'has_archive'       => false,
    'hierarchical'      => false,
    'menu_position'     => 40,
    'rewrite'             => array('with_front' => 0),
    'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes'),
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

$products = new PostType($names, $options);
// $products = new PostType($names, $options, $labels);

// Attach a taxonomy.
//$products->taxonomy('genre');

// Assign an icon.
$products->icon('dashicons-cart');

/**
 * Post Type Columns
 */
// Add Columns
// $products->columns()->add([
//     'new_column' => __('New Column')
// ]);

// Remove Columns
//$products->columns()->hide(['author', 'comments']);

// Populate Columns
// $products->columns()->populate('new_column', function ($column, $post_id) {
//     echo 'Value';
// });

// Order Columns
// $products->columns()->order([
//     'new_column' => 2,
//     'genre' => 4,
//     'date' => 10,
// ]);

// Set Columns.
// $products->columns()->set([
//     'cb' => '<input type="checkbox" />',
//     'title' => __("Title"),
//     'new_column' => __("New Column"),
//     'genre' => __("Genres"),
//     'date' => __("Date")
// ]);

// Make sortable columns. [meta_key, numerical]
// $products->columns()->sortable([
//     'new_column' => ['price', false],
// ]);

// Set Filters
//$products->filters(['genre']);

// Register the post type.
$products->register();




/**
 * Taxonomy: Product
 */
// $product_names = [
//     'name'      => 'product',
//     'singular'  => 'Product',
//     'plural'    => 'Product',
//     'slug'      => 'product'
// ];
// $product = new Taxonomy($product_names);
// $product->posttype('product');

// $product->columns()->add([
//     'taxonomy_column' => __('Taxonomy Column')
// ]);

// // Populate Taxonomy columns.
// $product->columns()->populate('taxonomy_column', function($column, $post_id) {
//     echo 'Value';
// });

// $product->register();
