<?php
/**
 * Template Name: Perusidebar

 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<div id="PeruSidebar">
   <img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Blog_PenpalPic.png'?>" />
   <div style="background-color:#fcf3aa; padding: 0px 10px; font-size:12px; padding-bottom:10px;">
    Hey everyone, Penpal here!  My journey with Caring Clowns International and Komedyplast begins here.  Please join me on this amazing adventure! 
   </div>
   <div style="background-color:#fcf3aa; font-size:12px; border-top: 2px solid white;border-bottom: 2px solid white; padding:10px 0px;">
   Find out more about the organizations involved! 
   <a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Peru_CCI.png'?>" /></a><br/>
   <a href="http://www.komedyplast.org/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Peru_Komedyplast.png'?>" /></a><br/>
   </div>
   <div style="background-color:#fcf3aa; padding: 0px 10px; font-size:12px; padding-top:10px; ">
   <ul>
		<li><a href="<?php echo esc_url( home_url( '/peru/' ) ); ?>" style="color:#CC0000;">Back to Perspectives Blog </a></li>
		<li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" style="color:#CC0000;">Back to News </a></li>
	</ul>
	</div>
   <div class="PeruSidebarBottom"></div>
</div>