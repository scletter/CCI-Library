<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */

get_header(); ?>
<div id="tagwrap">
<div id="tagcontent">

				<h1><?php
					printf( __( 'Tag Archives: %s', 'farceur' ), '' . single_tag_title( '', false ) . '' );
				?></h1><br /><br />

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>
</div>
<?php get_sidebar(); ?>
</div> <!-- tagwrap -->
<?php get_footer(); ?>