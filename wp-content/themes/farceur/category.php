<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */

get_header(); ?>
<div id="catwrap">
<div id="catcontent">

				<h1><?php
					printf( __( 'Category Archives: %s', 'farceur' ), '' . single_cat_title( '', false ) . '' );
				?></h1><br /><br />
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>
</div>
<?php get_sidebar(); ?>
</div> <!-- catwrap -->
<?php get_footer(); ?>