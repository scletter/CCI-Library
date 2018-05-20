<?php
/**
 * Template Name: Loginsidebar
 *
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
 */
?>

<div id="loginSidebar">
   <img src="/Images/Duffylogin.png" />
   <div style="background-color:#fcf3aa; padding: 10px 20px; font-size:12px; padding-bottom:10px;">
	Welcome from Duffy, our President and Executive Director
   </div>
	<div style="background-color:#fcf3aa; font-size:12px; padding:10px 0px;">
		<div id="userlogin">
			<?php
			farceur_login_form();
			?>
			<?php
			if ( is_user_logged_in() ) {
				?><div class="bold"><?php
				$current_user =  wp_get_current_user();
				echo 'Logged In: '. $current_user->display_name . PHP_EOL;
				?></div><?php
				?><br/><?php
				$url = wp_logout_url(get_permalink());
				$anchor = "Logout";
				$button = '<a href="'.$url.'" class="logout-button">'.$anchor.'</a>';
				echo $button;
			}	
			?>
		</div>	
	</div>
	<div class="loginSidebarBottom"></div>
</div>