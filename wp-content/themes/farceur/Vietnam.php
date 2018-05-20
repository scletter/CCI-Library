<?php
/**
 * Template Name: Vietnam

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<?php get_header(); ?><a href="<?php echo esc_url( home_url( '/vietnam/' ) ); ?>"><img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" /></a>
<div id="vietnamwrap">
<div id="vietnamposts">

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
   'cat'=>8,
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

  		<div class="vietnampost" id="post-<?php the_ID(); ?>">

     <div class="posttitle">
                <div id="newstitletopwrap">
                <div id="newstitletop">
                </div></div>
                 <div id="posttitlecontent">   		
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
                          </div>      
 
                <div id="newstitlebottomwrap">
                <div id="newstitlebottom">
                </div></div>
                
     </div>  
       <div id="vietnamcontent"><?php the_content('&raquo;&raquo; Read More'); ?></div>
    
        <div class="postinfo vietnampostinfo"><span class="posthighlight"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/heartbullet.png'?>" class="postheart"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> <span class="posthighlight">by </span><?php the_author_posts_link(); ?> <br /> <span class="responses"> <a href="<?php the_permalink() ?>#commentswrap">This post currently has <?php comments_number('no responses','one response','% responses'); ?></a> | <a href="<?php the_permalink() ?>#respond"> Leave a Comment </a></span></div><br />
</div><div class="clear"></div>
  

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.','farceur'); ?></p>
<?php endif; ?>

	<?php next_posts_link( __( '&laquo; Older posts', 'farceur' ) ); ?>
	<?php previous_posts_link( __( '| Newer posts &raquo;', 'farceur' ) ); ?>

</div>

<div id="VietnamSidebar">
   <img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Blog_SidekickPic.png'?>" />
   <div style="background-color:#fcf3aa; padding: 0px 10px; font-size:12px; padding-bottom:10px;">
    Sidekick here! Over the next few weeks I'll be documenting Sox's and my adventures whilst travelling across Vietnam! From embracing the culture to seeing the sights, we'll be volunteering in two orphanages, a blind school and visiting parts of the country where 'the essentials of life' aren't taken for granted!    
   </div>
   <div style="background-color:#fcf3aa; font-size:12px; border-top: 2px solid white; padding:0px 0px;">
   
   </div>
   <div style="background-color:#fcf3aa; padding: 0px 10px; font-size:12px; padding-top:0px; ">
   <ul><li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" style="color:#CC0000; text-align:center;">Back to News </a></li></ul>
	</div>
   <div class="VietnamSidebarBottom"></div>
</div>
</div>
<?php get_footer(); ?>

