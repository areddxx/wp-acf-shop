<?php
/**
 * Module: Galleries
 */

// Section ID and Classes
$id = get_sub_field('section_id');
$class = get_sub_field('section_class');
$section_id = ($id) ? $id : null;
$section_class = ($class) ? $class : null;

$galleries_navigation = [];
$galleries_images = [];
?>

<section id="<?php echo $section_id; ?>" class="galleries <?php echo $section_class; ?>">

	<div class="container">

		<?php if( have_rows('gallery') ): ?>
		    <?php while ( have_rows('gallery') ) : the_row(); ?>
		        <?php if( get_row_layout() == 'gallery' ): ?>

		            <?php
			        /**
			         * Gallery Row data is sorted into 2 arrays
			         * $galleries_navigation = Navigation items
			         * $galleries_images = Images with associated category (title)
			         */
		            $title = get_sub_field('title');
		            $images = get_sub_field('images');

		            $galleries_navigation[] = $title;

		            if( $images ) :
		            	foreach( $images as $image_id ) :
		            		$galleries_images[] = [
		            			'id' => $image_id,
		            			'category' => ['all', sanitize_title($title)],
		            		];
		            	endforeach;
		            endif;
		            ?>

		        <?php endif; ?>
		    <?php endwhile; ?>
		<?php endif; ?>

		<nav class="galleries__nav">
			<ul class="is-flex">
				<li class="galleries__nav-item is-active" data-group="all"><button>All</button></li>
				<?php foreach ($galleries_navigation as $nav_item) : ?>
					<li class="galleries__nav-item" data-group="<?php echo sanitize_title($nav_item); ?>"><button><?php echo $nav_item; ?></button></li>
				<?php endforeach; ?>
			</ul>
		</nav><!-- .galleries__nav -->

		<div id="galleries-images" class="galleries__images is-flex">

			<?php
			/**
			 * Optionally shuffle the image order for
			 * a randomized ordering on each page load.
			 */
			// shuffle($galleries_images);
			?>

			<?php foreach( $galleries_images as $image ) : ?>

				<?php
				/**
				 * Image meta data
				 */
				$image_class = null;
				$fancybox_type = null;
				$embed_url = get_field('embed_url', $image['id']);
				$fancybox_src = wp_get_attachment_url( $image['id'], 'large');
				$background = ( $image['id'] ) ? 'style="background-image: url(' . wp_get_attachment_image_src( $image['id'], 'medium' )[0] . ');"' : null;

				/**
				 * If the attachment has a value for
				 * "embed_url", then modify the fancybox
				 * attributes to trigger a video or iframe player
				 */
				if( $embed_url ) :
					$fancybox_src = $embed_url;
					if( strpos($embed_url, 'youtube') == false && strpos($embed_url, 'vimeo') == false)
						$fancybox_type = 'iframe';
				endif;
				?>

				<div class="galleries__image is-visible"
					data-groups='<?php echo json_encode($image['category']); ?>'
					data-fancybox="gallery"
					data-type="<?php echo $fancybox_type; ?>"
					data-src="<?php echo $fancybox_src ?>"
				>

					<div class="galleries__image-background" <?php echo $background; ?>></div>

					<?php if ( $embed_url ) : ?>
						<div class="galleries__image-overlay"></div>
						<button class="play"><img src="<?php echo THEME_URL; ?>/assets/img/icon-play.svg" alt="Play Button" /></button>
					<?php endif; ?>

				</div><!-- .galleries__image -->

			<?php endforeach; ?>

		</div><!-- .galleries__images -->

	</div><!-- .container -->

</section><!-- .galleries -->