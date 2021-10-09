<div class="search-module">
	<a href="#" class="close">Close <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></a>
	<div class="container">

		<div class="form-wrap is-flex">

			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

				<div class="icon">
					<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Yes', 'submit button' ) ?>" />
				</div><!-- .icon -->

		        <input type="search" class="search-field"
		            placeholder="<?php echo esc_attr_x( 'What are you looking for?', 'placeholder' ) ?>"
		            value="<?php echo get_search_query() ?>" name="s"
		            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

			</form><!-- form -->

		</div><!-- .form-wrap -->

	</div>
</div>