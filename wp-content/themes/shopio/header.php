<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<?php
	/**
	 * Functions hooked in to wp_head action
	 *
	 * @see shopio_pingback_header - 1
	 */
	wp_head();
	?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/popup.css?v=<?= time()?>" />
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action('shopio_before_site'); ?>

<div id="page" class="hfeed site">
	<?php
	/**
	 * Functions hooked in to shopio_before_header action
	 *
	 */
	do_action('shopio_before_header');
    if (shopio_is_elementor_activated() && function_exists('hfe_init') && hfe_header_enabled()) {
        do_action('hfe_header');
    } else {
        get_template_part('template-parts/header/header-1');
    }

	/**
	 * Functions hooked in to shopio_before_content action
	 *
	 */
	do_action('shopio_before_content');
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

<?php
/**
 * Functions hooked in to shopio_content_top action
 *
 * @see shopio_shop_messages - 10 - woo
 *
 */
do_action('shopio_content_top');

