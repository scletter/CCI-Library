<?php
/**
 * Template Name: MyHome Template

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<?php get_header(); ?>

	
            		<div id="mainimgout">
           				 <div id="mainimgbox">
          					  <div id="mainimgin">
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
                                   <img src="/Images/MainImg10.jpg" class="wacky" style="display:none;" alt="MainImg10.jpg"/>
                                   <img src="/Images/MainImg11.jpg" class="wacky" style="display:none;" alt="MainImg11.jpg"/> 
                                   <img src="/Images/MainImg12.jpg" class="wacky" style="display:none;" alt="MainImg12.jpg"/> 
                                   <img src="/Images/MainImg13.jpg" class="wacky" style="display:none;" alt="MainImg13.jpg"/>
                                   <img src="/Images/MainImg14.jpg" class="wacky" style="display:none;" alt="MainImg14.jpg"/>  
                                   <img src="/Images/MainImg15.jpg" class="wacky" style="display:none;" alt="MainImg15.jpg"/>
                                   <img src="/Images/MainImg16.jpg" class="wacky" style="display:none;" alt="MainImg16.jpg"/> 
                                   <img src="/Images/MainImg17.jpg" class="wacky" style="display:none;" alt="MainImg17.jpg"/> 
                                   <img src="/Images/MainImg18.jpg" class="wacky" style="display:none;" alt="MainImg18.jpg"/>
                                   <img src="/Images/MainImg19.jpg" class="wacky" style="display:none;" alt="MainImg19.jpg"/> 
                     			   <img src="/Images/MainImg20.jpg" class="wacky" style="display:none;" alt="MainImg20.jpg"/>    
                                   <img src="/Images/MainImg21.jpg" class="wacky" style="display:none;" alt="MainImg21.jpg"/>
                                   <img src="/Images/MainImg22.jpg" class="wacky" style="display:none;" alt="MainImg22.jpg"/> 
                                   <img src="/Images/MainImg23.jpg" class="wacky" style="display:none;" alt="MainImg23.jpg"/>  
                                   <img src="/Images/MainImg24.jpg" class="wacky" style="display:none;" alt="MainImg24.jpg"/> 
                                   <img src="/Images/MainImg25.jpg" class="wacky" style="display:none;" alt="MainImg25.jpg"/>                                
                   				   </div>  <!--End Slideshow -->  
                    			   <div class="motto">
                    			   <h1> We clown to free the "inner kid" in children and adults alike. <br/> As humanitarians, we fund life changing improvements for children in need. </h1></div>
               					  </div><!--end mainimg div-->
                           </div></div>
					</div><!--End mainimgin, mainimgbox, mainimgout -->
                <div id="pointswrap">
					<div id="pointsbg">
					
               		   <div id="points">
                        <div id ="WhoWeAre"> We are a passionately committed all-volunteer nonprofit, clowning globally to heal and expand the human spirit. 
                        <ul><li><a href="/about-us?panel=0#aboutus">Learn More</a></li></ul>            
                        </div>
                        
                        <div id="WhatWeDo"> We connect with people, uplifting spirits, beyond language and cultures, and we fund projects to help children. 
                        <ul>
							<li><a href="about-us?panel=2#aboutus">Learn More</a></li>     
						</ul>    
                        </div>
                        
                        <div id="WhatYouDo"> Help us to help kids.
                             <ul>
                             <li><a href="/join-us">Join Us</a></li>
                             <li><a href="/donate">Donate</a></li>
                             <li><a href="/hire-us">Hire Us</a></li>
                             </ul>    
                        </div>
                        <div class="clear"></div>
						</div><!--End Points Div -->
                        
					</div> <!--end pointsbg div-->
                </div> <!-- end points wrap -->
        
        <div id="eventnewswrapper">            
            <div id="events">    
                <div class="eventstopwrap">
					<div class="eventstop"></div>
				</div>
                    		
                <div class="eventscontent">
						<table id="eventstable">
							<?php get_sidebar('myhome'); ?>
						</table>
				</div>       
                <div class="eventsbottomwrap">
					<div class="eventsbottom"></div>
				</div>
					
			</div>
			
			<div id="news">    
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
                        <li class="posted"> <span class="posthighlight"><img src="/Images/heartbullet.png" class="postheart" alt="heartbullet.png"/> POSTED </span><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> </li>
                    </ul><?php endwhile; ?>                                  
				</div>                 
                <div class="eventsbottomwrap">
					<div class="eventsbottom"></div>
				</div>
				<div id="amazonad">
					<a href="https://smile.amazon.com/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/AmazonSmileCCI.png'?>" class="wacky" style="width: 90%; margin-top: 20px;" alt="AmazonSmileCCI.png"/></a>        
				</div>

			</div>
			
            <div class="clear"></div>
   		</div>
        
<?php get_footer(); ?>

