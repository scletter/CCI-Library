<?php
/**
 * Template Name: Table of Contents

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<?php get_header(); ?><img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" />

<span class="duffytitle">TABLE OF CONTENTS</span>

<?php $my_query = new WP_Query('&order=asc&posts_per_page=50'); ?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if (in_category('3')){?>
  			<p><a href="/duffys-adventure/verses/#post<?php the_ID(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </p>
        
  
        <?php } ?>
<?php endwhile; ?>


<?php get_footer(); ?>

