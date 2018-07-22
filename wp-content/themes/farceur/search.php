<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.3.0
 */

get_header(); ?>
<div id="searchedwrap">
<div id="searched">
<?php if ( have_posts() ) : ?>
				<h1><?php printf( __( 'Search Results for: %s', 'farceur' ), '' . get_search_query() . '' ); ?></h1><br /><br />
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
					<h2><?php _e( 'Nothing Found', 'farceur' ); ?></h2>
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'farceur' ); ?></p>
<?php endif; ?>
</div><!--enddiv-->
<?php get_sidebar(); ?>
</div> <!--searchwrap -->
<?php get_footer(); ?>
