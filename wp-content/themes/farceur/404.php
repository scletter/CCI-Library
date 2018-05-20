<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */

get_header(); ?>
 <img src="/Images/PageTitle_NotFound.jpg" class="pagetitle" /> 


				<h1><?php _e( 'Not Found', 'starkers' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'starkers' ); ?></p>
				<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>