<?php
/**
 * Template Name: Peru

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.1.0
 */
?>

<?php get_header(); ?><a href="<?php echo esc_url( home_url( '/peru/') ); ?>"><img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" /></a>
<div id="peruwrap">
<div id="peruposts">

	<?php 
	// set the "paged" parameter (use 'page' if the query is on a static front page)
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	?>
		
	<?php
	// Query the loop for Peru (Category 7) for the current page and include all posts
	$args = array (
		'cat' => 7,
		'posts_per_page' => -1,
 	    'ignore_sticky_posts'=>1,
		'paged'=> $paged,
	)
	?>
	
	<?php
	// Query the loop for Peru (Category 7) for the current page
	$my_query = new WP_Query( $args );
	?>

	<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

	<div class="perupost" id="post-<?php the_ID(); ?>">

		<div class="posttitle">
				<div id="posttitlecontent">   		
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
				</div>      
					
		</div>  
		<div id="perucontent"><?php the_content('&raquo;&raquo; Read More'); ?></div>
		
		<div class="postinfo perupostinfo">
			<span class="posthighlight"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/heartbullet.png'?>" class="postheart"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> 
			<span class="posthighlight">by </span><?php the_author_posts_link(); ?> <br />
			<span class="responses"> <a href="<?php the_permalink() ?>#commentswrap">This post currently has <?php comments_number('no responses','one response','% responses'); ?></a> | <a href="<?php the_permalink() ?>#respond"> Leave a Comment </a></span>
		</div><br />
	</div>
	<div class="clear"></div>
  

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.','farceur'); ?></p>
<?php endif; ?>

	<?php next_posts_link( __( '&laquo; Older posts', 'farceur' ) ); ?>
	<?php previous_posts_link( __( '| Newer posts &raquo;', 'farceur' ) ); ?>

</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

