<?php
/**
 * Template Name: About Us

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

												
<img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" />
<div id="localnav"><a href="/about-us">Our Story </a>| <a href="/about-us/our-mission">Our Mission</a> | <a href="/about-us/directors">Directors</a> | <a href="/about-us/our-friends">Our Friends</a> | <a href="/about-us/privacy-policy">Privacy Policy</a></div>
<div id="localnavline"></div>
              

<?php the_content(); ?>
						

<?php endwhile; ?>


<?php get_footer(); ?>

