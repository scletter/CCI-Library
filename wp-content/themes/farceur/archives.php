<?php
/**
 * Template Name: Archives

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
 get_header(); 
?>
<img src="/Images/PageTitle_Archives.jpg" class="pagetitle"/>
<div id="archivespage"> <ul> <?php wp_get_archives( 'type=monthly' ); ?> </ul></div>
<?php get_footer(); ?>