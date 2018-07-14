<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.2.2
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<?php next_posts_link( __( '&laquo; Older posts', 'farceur' ) ); ?>
		<?php previous_posts_link( __( '| Newer posts &raquo;', 'farceur' ) ); ?>
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'farceur' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'farceur' ); ?></p>

<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In farceur we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php /*----------------------------------------------------- How to display posts in the Gallery category. ----------------------------------------------------------------*/ ?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'farceur') ) ) : ?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'farceur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php farceur_posted_on(); ?>

			<?php if ( post_password_required() ) : ?>	
							<?php the_content(); ?>
			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					$total_images = count( $images );
					$image = array_shift( $images );
					$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>

					<p><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'farceur' ),
							'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'farceur' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
							$total_images
							); ?>
					</p>

					<?php the_excerpt(); ?>
			<?php endif; ?>

			<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'farceur'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'farceur' ); ?>"><?php _e( 'More Galleries', 'farceur' ); ?></a>
				|
			<?php comments_popup_link( __( 'Leave a comment', 'farceur' ), __( '1 Comment', 'farceur' ), __( '% Comments', 'farceur' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'farceur' ), '|', '' ); ?>


<?php /*----------------------------------------------------- How to display posts in the asides category ---------------------------------------------------------------------*/ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'farceur') ) ) : ?>

			<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
				<?php the_excerpt(); ?>
			<?php else : ?>
				<?php the_content( __( 'Continue reading &raquo;', 'farceur' ) ); ?>
			<?php endif; ?>

			<?php farceur_posted_on(); ?>
			|
			<?php comments_popup_link( __( 'Leave a comment', 'farceur' ), __( '1 Comment', 'farceur' ), __( '% Comments', 'farceur' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'farceur' ), '| ', '' ); ?>

<?php /*----------------------------------------------------- How to display all other posts. ----------------------------------------------------------------------*/ ?>

	<?php else : ?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'farceur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <div id="postedon">
			<?php farceur_posted_on(); ?>
			<?php printf("DEBUG: loop");?>
            </div>

			<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
					<?php the_excerpt(); ?>
			<?php else : ?>
					<?php the_content( __( 'Continue reading &raquo;', 'farceur' ) ); ?>
					<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'farceur' ), 'after' => '' ) ); ?>
			<?php endif; ?>
			<div id="postinfo">
			
			<?php if ( count( get_the_category() ) ) : ?>
                -
					<?php printf( __( 'Posted in %2$s', 'farceur' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					|
			<?php endif; ?>
			<?php
				$tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ):
			?>
				<?php printf( __( 'Tagged %2$s', 'farceur' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					|
				<?php endif; ?>
				<?php comments_popup_link( __( 'Leave a comment', 'farceur' ), __( '1 Comment', 'farceur' ), __( '% Comments', 'farceur' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'farceur' ), '| ', '' ); ?>
                </div>

				<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<br /><br />
				<?php next_posts_link( __( '&laquo; Older posts', 'farceur' ) ); ?>
				<?php previous_posts_link( __( '| Newer posts &raquo;', 'farceur' ) ); ?>
<?php endif; ?>