<?php
/**
 * Template Name: MyHome Template

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.1.0
 */
?>

<?php get_header(); ?>

	<div id="mainimgout">
		<div id="mainimgbox">
			<div id="mainimg">
					   
					   <div id="home-slideshow">
					   <img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/MainImgSpacer.png'?>" class="spacer" alt="spacer"/>
					   <img src="/Images/MainImg1.jpg" class="wacky" style="display:none;" alt="MainImg1.jpg"/>
					   <img src="/Images/MainImg2.jpg" class="wacky" style="display:none;" alt="MainImg2.jpg"/>
					   <img src="/Images/MainImg3.jpg" class="wacky" style="display:none;" alt="MainImg3.jpg"/>    
					   <img src="/Images/MainImg4.jpg" class="wacky" style="display:none;" alt="MainImg4.jpg"/> 
					   <img src="/Images/MainImg5.jpg" class="wacky" style="display:none;" alt="MainImg5.jpg"/>
					   <img src="/Images/MainImg6.jpg" class="wacky" style="display:none;" alt="MainImg6.jpg"/> 
					   <img src="/Images/MainImg7.jpg" class="wacky" style="display:none;" alt="MainImg7.jpg"/> 
					   <img src="/Images/MainImg8.jpg" class="wacky" style="display:none;" alt="MainImg8.jpg"/> 
					   <img src="/Images/MainImg9.jpg" class="wacky" style="display:none;" alt="MainImg8.jpg"/>                                
					   </div>  <!--End Slideshow -->  
					   <div class="motto">
					   <h1> We clown to free the "inner kid" in children and adults alike. <br/> As humanitarians, we fund life changing improvements for children in need. </h1></div>
			</div><!--end mainimg div-->
		</div>
	</div>

	
	<div id="eventnewswrapper">            
		<div id="homesidebar" class="columnborder">    
						
			<div class="eventscontent">
					<table id="eventstable">
						<?php get_sidebar('myhome'); ?>
					</table>
			</div> 
			
			<div id="amazonad">
				<a href="https://smile.amazon.com/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/AmazonSmileCCI.png'?>" class="wacky" style="width: 90%; margin-top: 20px;" alt="AmazonSmileCCI.png"/></a>        
			</div>

				
		</div>
		<div id="homeprimary">
		<div id="news"  class="columnborder">    
			<div class="eventstopwrap">
				<div class="eventstop"></div>
			</div>
						
			<div class="eventscontent">
				<div class="titlewrap"><h3> <a href="/news">NEWS </a></h3></div>
								
				<!-- Use WP Query Class to get posts with category 1 (News)and display first 6 posts -->
				<?php $my_query = new WP_Query('&cat=1&posts_per_page=6'); ?>
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
								
				<ul class="lastul"> 
					<li> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </li>
					<li class="posted"> <span class="posthighlight"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/heartbullet.png'?>" class="postheart" alt="heartbullet.png"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> </li>
				</ul><?php endwhile; ?>                                  
			</div>                 
		</div>
		<div class="eventstop"></div>
	
		<div id="inspirewrap" class="columnborder">
		<div id="pointswrap">
				<div id="pointsbg">
				
				   <div id="points">
					<div id ="WhoWeAre"> We are a passionately committed all-volunteer nonprofit, clowning globally to heal and expand the human spirit. 
					</div>
					
					<div id="WhatWeDo"> We connect with people, uplifting spirits, beyond language and cultures, and we fund projects to help children.  
					</div>
					
					<div id="WhatYouDo"> Help us to help kids, join-us, donate or hire us.
		  
					</div>
					<div class="clear"></div>
					</div><!--End Points Div -->
					
				</div> <!--end pointsbg div-->
		</div> <!-- end points wrap -->
		</div>
		<div class="eventstop"></div>
		</div>
		
		<div class="clear"></div>
	</div>
	

        
<?php get_footer(); ?>

