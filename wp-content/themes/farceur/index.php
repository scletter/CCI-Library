<?php
/**
 * Template Name: News

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.3.0
 */
?>

<?php get_header(); ?>

<img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/PageTitle_News.jpg'?>" class="pagetitle"/>

<div id="newswrap">
	<div id="newsmain">

		<?php
		// set the "paged" parameter (use 'page' if the query is on a static front page)
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		?>

		<?php
		// Query the loop for News (Category 1) for the current page
		$my_query = new WP_Query('cat=1&paged='. $paged );
		?>
		<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

		
			<div id="post-<?php the_ID(); ?>">
			
				<div class="posttitle">
					 <div id="posttitlecontent">   		
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
					</div>      
				</div>  
			
				<div class="newscontent">
					<?php the_content('&raquo;&raquo; Read More'); ?>
					<br />
				</div>
				<?php farceur_post_meta(); ?>	

			</div>

		<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.','farceur'); ?></p>
		<?php endif; ?>
		
		<?php
		// Previous/next page navigation.
			the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page', 'farceur' ),
					'next_text'          => __( 'Next page', 'farceur' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'farceur' ) . ' </span>',
				)
			);
		?>

	</div>

<?php get_sidebar(); ?>
</div> <!-- Newswrap -->
<?php get_footer(); ?>
