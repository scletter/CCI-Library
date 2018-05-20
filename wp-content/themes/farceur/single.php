<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */

get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
    <?php if (in_category('Other')){?>												
         <img src="<?php $key="PageTitleImage"; echo get_post_meta($post->ID, $key, true); ?>" class="pagetitle" />
    	 
                <?php the_content(); ?>
             
	<?php } 

	else if (in_category('Duffys-Adventures')){?>
    		<div id="duffyadventure">
            <div class="duffypost" id="post-<?php the_ID(); ?>">
            
            <div id="duffyheader">
                   <div id="duffytopwrap">
                    <div id="duffytop">
                    </div></div>
                        <div id="duffyheaderinfo">
                        <div id="duffyprev"><?php previous_post_link('%link', '&laquo; %title', TRUE); ?>  </div>
                      
                      <a href="/duffys-adventure/table-of-contents">Table of Contents </a>
                      
                         <div id="duffynext"><?php next_post_link('%link', '%title &raquo; ', TRUE); ?> </div>
                        <div class="clear"></div>
                        </div>
                    <div id="duffybottomwrap">
                    <div id="duffybottom">
                    </div></div>
                    
          			 </div>
              
				  <?php
                global $more;
                $more = 0;
                ?>
            
            	<div id="duffyimgwrap">
                <?php 
                $key="Duffy_Img"; 
                $duffyimgs=get_post_meta($post->ID, $key, false);
                foreach ($duffyimgs as &$value) {
                    echo "<img src=\"$value\" class=\"duffyimg\" />";
           		 }
                ?>
                </div>
                <div id="duffymain">
                <span class="duffytitle"><?php the_title(); ?></span> <br />
                           <span class="duffysub"><?php $key="Duffy_Loc"; echo get_post_meta($post->ID, $key, true);?> <?php $key="Duffy_Date"; echo get_post_meta($post->ID, $key, true); ?></span>
                <?php the_content(); ?>
				<span class="colorlink"><?php next_post_link('%link', 'Next &raquo; ', TRUE); ?></span>
                </div> </div><div class="clear"></div></div>
                
                <?php } 

	else if (in_category('Peru')){?>
			<a href="http://www.caringclownsinternational.org/peru/"><img src="/Images/PageTitle_PeruBlog.jpg" class="pagetitle" /></a>
    		<div id="singlepagewrap">
				<div id="singlepages">
				 
                 <div class="clear"></div>

						<div id="singletitleR"><div id="singletitleRB"><div id="singletitleLB"><div id="singletitleL"><h1><?php the_title(); ?></h1></div></div></div></div>
						<div id="singlepostmainstuff">
									<?php the_content(); ?>
									<div class="postinfo"><span class="posthighlight"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/heartbullet.png'?>" class="postheart"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> <span class="posthighlight">by </span><?php the_author_posts_link(); ?>  </div>
									
									<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'farceur' ), 'after' => '' ) ); ?>

									<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'farceur_author_bio_avatar_size', 60 ) ); ?>
									<h2><?php printf( esc_attr__( 'About %s', 'farceur' ), get_the_author() ); ?></h2>
									<?php the_author_meta( 'description' ); ?>
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s &raquo;', 'farceur' ), get_the_author() ); ?>
									</a>
									<?php endif; ?>
									<br />
									<span class="singleedit"><?php edit_post_link( __( 'EDIT POST NOW', 'farceur' ), '', '' ); ?></span><br /><br />
						</div>

						<span class="previous"><?php previous_post_link( '%link', '' . _x( '&laquo;', 'Previous post link', 'farceur' ) . ' Previous: %title' ); ?></span>
						<span class="next"><?php next_post_link( '%link', ' Next: %title ' . _x( '&raquo;', 'Next post link', 'farceur' ) . '' ); ?></span>
						<div class="clear"></div>

						<div id="commentswrap"><div id="localnavline"><div id="localnavlineinside"></div></div><?php comments_template( '', true ); ?></div>
                
               
                
                </div>
				<?php get_template_part('perusidebar'); ?>
				
			</div>
    
    <?php } 
	else {	
	?>
    			<img src="/Images/PageTitle_News.jpg" class="pagetitle" />
    			<div id="singlepagewrap">
					<div id="singlepages">
				 
					<div class="clear"></div>

					<div id="singletitleR"><div id="singletitleRB"><div id="singletitleLB"><div id="singletitleL"><h1><?php the_title(); ?></h1></div></div></div></div>
					<div id="singlepostmainstuff">
								<?php the_content(); ?>
								<div class="postinfo"><span class="posthighlight"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/heartbullet.png'?>" class="postheart"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> <span class="posthighlight">by </span><?php the_author_posts_link(); ?>  </div>
								
								<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'farceur' ), 'after' => '' ) ); ?>

								<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'farceur_author_bio_avatar_size', 60 ) ); ?>
								<h2><?php printf( esc_attr__( 'About %s', 'farceur' ), get_the_author() ); ?></h2>
								<?php the_author_meta( 'description' ); ?>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &raquo;', 'farceur' ), get_the_author() ); ?>
								</a>
								<?php endif; ?>
								<br />
								<span class="singleedit"><?php edit_post_link( __( 'EDIT POST NOW', 'farceur' ), '', '' ); ?></span><br /><br />
					</div>

					<span class="previous"><?php previous_post_link( '%link', '' . _x( '&laquo;', 'Previous post link', 'farceur' ) . ' Previous: %title' ); ?></span>
					 <span class="next"><?php next_post_link( '%link', ' Next: %title ' . _x( '&raquo;', 'Next post link', 'farceur' ) . '' ); ?></span>
					 <div class="clear"></div>

					<div id="commentswrap"><div id="localnavline"><div id="localnavlineinside"></div></div><?php comments_template( '', true ); ?></div>
					
				   
					
					</div>
					 <?php get_sidebar(); ?>
				</div> <!-- singlepagewrap -->
      <?php } 	?>

<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>