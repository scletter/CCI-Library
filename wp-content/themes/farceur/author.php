<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.2.2
 */

get_header(); ?>
<div id="authorwrap">
<div id="authorcontent">
<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>
				<h1><?php printf( __( 'Author Archives: %s', 'farceur' ), '' . get_the_author() ); ?></h1>
				<br /><br />

				
<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>

							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'farceur_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( __( 'About %s', 'farceur' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>

<?php endif; ?>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'author' );
?>
</div>
<?php get_sidebar(); ?>
</div> <!-- authorwrap -->
<?php get_footer(); ?>