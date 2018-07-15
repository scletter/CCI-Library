<?php
/**
 * The template for displaying Attachment pages.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.3.0
 */

get_header(); ?>
<div id="attachmentwrap">
	<div id="attachmentcontent">

		<h1><?php printf( __( 'Attachment: %s', 'farceur' ), '' . single_cat_title( '', false ) . '' . get_the_title( $post->post_parent ) );	?></h1>
		<br /><br />

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


		<h2><?php the_title(); ?></h2>

			<div id="postedon">
			<?php
				printf(__('By %2$s', 'farceur'),
					'meta-prep meta-prep-author',
					sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
						get_author_posts_url( get_the_author_meta( 'ID' ) ),
						sprintf( esc_attr__( 'View all posts by %s', 'farceur' ), get_the_author() ),
						get_the_author()
					)
				);
			?>

			<span>|</span>
			<?php
				printf( __('Published %2$s', 'farceur'),
					'meta-prep meta-prep-entry-date',
					sprintf( '<abbr title="%1$s">%2$s</abbr>',
						esc_attr( get_the_time() ),
						get_the_date()
					)
				);
				if ( wp_attachment_is_image() ) {
					echo ' | ';
					$metadata = wp_get_attachment_metadata();
					printf( __( 'Full size is %s pixels', 'farceur'),
						sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
							wp_get_attachment_url(),
							esc_attr( __('Link to full-size image', 'farceur') ),
							$metadata['width'],
							$metadata['height']
						)
					);
				}
			?>
			</div>

		<?php if ( wp_attachment_is_image() ) :
					$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
					foreach ( $attachments as $k => $attachment ) {
						if ( $attachment->ID == $post->ID )
							break;
					}
					$k++;
					
					// If there is more than 1 image attachment in a gallery
					if ( count( $attachments ) > 1 ) {
						if ( isset( $attachments[ $k ] ) )
							// get the URL of the next image attachment
							$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
						else
							// or get the URL of the first image attachment
							$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
					}
					else {
					// or, if there's only 1 image attachment, get the URL of the image
						$next_attachment_url = wp_get_attachment_url();
					}
				?>
					<p><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
						$attachment_size = apply_filters( 'farceur_attachment_size', 900 );
						echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
					?></a>
					</p>

					<nav id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'farceur' ) ); ?></div><div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'farceur' ) ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- .image-navigation -->
					
 
		<?php
		// Attachment is not an image
		else :
		?>
			<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
		<?php 
		endif; ?>
			
		<?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?>

		<?php the_content( __( 'Continue reading &raquo;', 'farceur' ) ); ?>

		<?php
			$defaults = array(
				'before'           => '<p>' . __( 'Pages:', 'farceur' ),
				'after'            => '</p>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => __( 'Next page', 'farceur'),
				'previouspagelink' => __( 'Previous page', 'farceur' ),
				'pagelink'         => '%',
				'echo'             => 1
			);
 
			wp_link_pages( $defaults );

		?>
		
		<br/>
		<?php // farceur_posted_in(); ?>
		
		<?php comments_template(); ?>

<?php endwhile; ?>
				
				
	</div>
	<?php get_sidebar(); ?>
	
</div> <!-- catwrap -->
<?php get_footer(); ?>