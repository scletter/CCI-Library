<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
  ?>
<?php get_header(); ?>
<?php 
	if (is_page("calendar")){?> 
	<img src="/Images/PageTitle_Calendar.jpg" class="pagetitle"/>
	<?php }?>
	



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php 
if (!is_page("calendar")){?> 												
<img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" />
	<?php }?>
    
    
<?php the_content(); ?>
<div class="clear"></div>
						

<?php endwhile; ?>


<?php get_footer(); ?>

