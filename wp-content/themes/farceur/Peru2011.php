<?php
/**
 * Template Name: Peru2011

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<?php get_header(); ?><img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" />

<div id="peru2011posts">

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
   'cat'=>4,
   'posts_per_page'=>10,
   'ignore_sticky_posts'=>1,
   'paged'=>$paged,
   );
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

	<?php farceur_post_meta(); ?>	
	<br />
	
</div>
<div class="clear"></div> 

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.','farceur'); ?></p>
<?php endif; ?>

	<?php next_posts_link( __( '&laquo; Older posts', 'farceur' ) ); ?>
	<?php previous_posts_link( __( '| Newer posts &raquo;', 'farceur' ) ); ?>

</div>

<?php get_footer(); ?>

