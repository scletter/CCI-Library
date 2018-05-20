<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<div id="news_sidebar">
	
    <div class="specialblog">
    	<div class="specialblogtitle"></div>
        <div class="specialblogmain">
        	<ul>
            <li><a href="/our-clowns-support-medical-mission-in-peru/">Supporting a Medical Mission in Peru - Jan 2018</a></li>
            <li><a href="/clowns-return-from-10-day-medical-mission-in-lima-peru/">Our Clowns Return from 10-Day Mission in Peru - Jan 2017</a></li>
            <li><a href="/back-to-peru-with-komedyplast/">Back to Peru with Komedyplast - Jan 2016</a></li>
            <li><a href="/vietnam/">Visiting Vietnam: <br /> A Clown & his Sidekick - May 2013</a></li>
            <li><a href="/peru/">Perspectives: <br />One Clown's Journey to Peru - Mar 2013</a></li>
            <li><a href="/joyful-connections/">Impressions in Ethiopia and Uganda - Oct 2012</a></li>
            <li><a href="/peru-2011/">Trip to Peru - Feb 2011</a></li>
            </ul>
        </div><div class="specialblogbottom"></div>
    </div>
             
    <div class="duffysadsidebar">
    	<div class="duffysadtitle"></div>
        <div class="duffysadmain">
        	<ul>
				<li><a href="/duffys-adventure/">Title Page</a> </li>
				<li><a href="/duffys-adventure/table-of-contents/">Table of Contents </a></li>
				<li><a href="/foreward/"> Start Reading </a></li>
			</ul>
        </div><div class="duffysadbottom"></div>
    </div>
    
    <div class="archives">
    	<div class="archivestitle"></div>
        <div class="archivesmain"> <ul> <?php wp_get_archives( array ('type'=>'yearly' ) ) ?> </ul></div>
        <div class="archivesbottom"></div>  
    </div>
    
    <div class="otherstuff">
    	<div class="otherstufftitle"></div>
        <div class="otherstuffmain">
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
        </div>
        <div class="otherstuffbottom"></div>
    </div>
                
</div>




