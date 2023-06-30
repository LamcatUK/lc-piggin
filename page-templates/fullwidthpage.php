<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$modal = 0;
?>
<main id="main" style="padding-top:130px">
	<div class="container-xl">
		<?php the_post();
the_content(); ?>
	</div>
</main>
<?php
get_footer();
?>