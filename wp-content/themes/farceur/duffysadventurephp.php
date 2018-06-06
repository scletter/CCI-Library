<?php
/**
 * Template Name: Duffys Adventure

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.1.0
 */
?>

<?php get_header(); ?><img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" />

<div id="duffyadventure">

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
   'cat'=>3,
   'posts_per_page'=>50,
   'ignore_sticky_posts'=>1,
   'paged'=>$paged,
   'order'=>'ASC',
   );
?>
    <div id="duffyheader">
		<div id="duffyheaderinfo">
			<a href="/duffys-adventure/table-of-contents">Table of Contents </a>
			<div class="clear"></div>
		</div>

		<?php
		// Query the loop for Peru (Category 7) for the current page
		$my_query = new WP_Query( $args );
		?>		
					
		<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

		<div class="duffypost" id="post-<?php the_ID(); ?>"><a name="post<?php the_ID(); ?>"></a>
				
			
			<div id="duffyimgwrap">
				<?php 
				$key="Duffy_Img"; 
				$duffyimgs=get_post_meta($post->ID, $key, false);
				foreach ($duffyimgs as &$value) {
					echo "<img src=\"$value\" class=\"duffyimg\" />";
				}
				?>
			</div>
				
			<span class="duffytitle"><?php the_title(); ?></span> <br />
			<span class="duffysub"><?php $key="Duffy_Loc"; echo get_post_meta($post->ID, $key, true);?> <?php $key="Duffy_Date"; echo get_post_meta($post->ID, $key, true); ?></span>
				<?php the_content(); ?> 
			<div class="clear"></div>
		</div>
		<br />
		  
			 <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.','farceur'); ?></p>
		<?php endif; ?>
			<?php next_posts_link( __( '&laquo; Older posts', 'farceur' ) ); ?>
			<?php previous_posts_link( __( '| Newer posts &raquo;', 'farceur' ) ); ?>

	</div>
</div>


<?php get_footer(); ?>

