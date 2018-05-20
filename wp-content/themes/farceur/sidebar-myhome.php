<?php
/**
 * The Sidebar for the front page 
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>
<div id="frontpage-sidebar" class="frontpage-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #frontpage-sidebar -->
