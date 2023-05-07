<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to shopio_page action
	 *
	 * @see shopio_page_header          - 10
	 * @see shopio_page_content         - 20
	 *
	 */
	do_action( 'shopio_page' );
	?>
</article><!-- #post-## -->
