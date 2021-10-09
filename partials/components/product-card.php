<?php

/**
 * Product Card
 */
global $wp_post_types;
$obj = $wp_post_types['product'];

$product = get_post_type_object('product');
$slug = basename(get_permalink());

$data_item_id = get_field('data_item_id');
$data_item_price = get_field('data_item_price');
$data_item_url = get_field('data_item_url');
$data_item_description = get_field('data_item_description');
?>


<div class="product-card product-card--<?php echo $layout; ?> is-flex">

    <div class="product-card__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
        <?php endif; ?>
    </div><!-- .product-card__image -->

    <div class="product-card__content">

        <div class="product-card__meta is-flex">
            <h3 class="product-card__title"><?php the_title(); ?></h3>
            <div class="product-card__price">$<?php echo $data_item_price ?></div><!-- .product-card__price -->
        </div><!-- .product-card__meta -->


        <div class="product-card__actions is-flex">
            <button class="snipcart-add-item product-card__add-to-cart button" data-item-id="<?php echo $slug ?>" data-item-price="<?php echo $data_item_price ?>" data-item-url="<?php the_permalink(); ?>" data-item-description="<?php echo the_content(); ?>" data-item-image="<?php the_post_thumbnail_url('medium'); ?>" data-item-name="<?php echo the_title(); ?>">
                Add to cart
            </button>
            <a href="<?php the_permalink(); ?>" class="product-card__view-details button button--wide button--color-b">View Details</a>
        </div>


    </div><!-- .product-card__content -->

</div><!-- .product-card -->