<?php

/**
 * Module: Products Grid
 */

// Section ID and Classes
$id = get_sub_field('section_id');
$class = get_sub_field('section_class');
$section_id = ($id) ? $id : null;
$section_class = ($class) ? $class : null;

// Section Data
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$number_of_products = get_sub_field('number_of_products');
$product_post_ids = get_sub_field('product_posts');
?>

<section id="<?php echo $section_id; ?>" class="products-grid animate <?php echo $section_class; ?>">

    <div class="container is-flex">

        <?php if ($title) : ?>
            <h2 class="products-grid__title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if ($subtitle) : ?>
            <div class="products-grid__subtitle"><?php echo $subtitle; ?></div>
        <?php endif; ?>


        <?php
        /**
         * Products
         */
        $args = [
            'post_type' => 'product',
            'posts_per_page' => $number_of_products,
            'no_found_rows' => true, // useful when pagination is not needed.
        ];

        if (!empty($product_post_ids)) :
            $args['post__in'] = $product_post_ids;
        endif;
        ?>

        <?php $product_posts = new WP_Query($args); ?>
        <?php if ($product_posts->have_posts()) : ?>

            <?php $i = 1; ?>
            <?php while ($product_posts->have_posts()) : $product_posts->the_post(); ?>

                <?php
                /**
                 * Card Layout
                 */
                //$card_layout = ( in_array($i, $wide_posts) ) ? 'wide' : 'standard';
                ?>

                <?php get_template_part('partials/components/product', 'card'); ?>

            <?php $i++;
            endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div><!-- .container -->

</section><!-- .products-grid -->