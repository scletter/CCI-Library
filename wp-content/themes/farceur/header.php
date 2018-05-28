<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.1.0
 */
?>
  
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="Shortcut Icon" href="/CCIfave.ico"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="description" content="We clown to free the inner kid in children and adults alike. As humanitarians, we fund life changing improvements for children in need." />
	<meta name="keywords" content="caring, clowns, clown, clowning, international, children, non-profit" />
	<title><?php wp_title(); ?></title>

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

<!-- Google Analytics -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-18626854-1', 'auto');
	ga('send', 'pageview');
</script>

<script>
// Add active class to the current button (highlight it)
// var x = document.getElementById("myNavbar");
// var navbtns = x.getElementsByClassName("navbtn");
// for (var i = 0; i < navbtns.length; i++) {
//   navbtns[i].addEventListener("click", function() {
// 	var current = document.getElementsByClassName("active");
// 	current[0].className = current[0].className.replace(" active", "");
// 	this.className += " active";
//  });
// }
</script>

<script>
function menuFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}
</script>

<?php
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper"> 
    <div id="outerheader" >
	<div id="headertop">
		<div id="utilities">
			<div id="utilitiesmain">
				<a href="/index.php/"> Home </a> | <a href="/contact-us/"> Contact Us </a> | <a href="/CCIPressKit.pdf"> Press Kit </a> |<?php get_search_form(); ?>
			</div>
        </div><!--End Utilities -->
	</div>
   	<div id="headerwrap"> 
		<div class="logo-column logo-left">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/CCI-Logo-With-Clown-16year.png'?>" id="logo" alt="logo"/></a>
			<div id="headermsg">
				<?php $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="logo-column logo-right">
			<div id="connect">
				Mailing Address:  P.O. Box 75 Suquamish, WA 98392
				<br/>
				<a href="https://www.facebook.com/caringclownsinternational/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/f_logo.png'?>" alt="f_logo.png"/></a>
				<a href=""></a><a href="https://www.youtube.com/channel/UCQI8hQtlVDrVQ5CDMVcGFyw"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/youtube-icon.png'?>" alt="youtube-icon.png"/></a>
			</div><!--end connect div-->

				</div><!-- .site-branding -->
		</div>
	</div><!--End Header Wrap -->
    </div><!--End Outer Header Wrap -->

	<div class="navbar" id="myNavbar">
		<a href="/news/" class="navbtn">News</a>
		<a href="/calendar/" class="navbtn">Calendar</a>
		<a href="/projects/" class="navbtn">Outreach</a>
		<a href="/about-us/" class="navbtn">About Us</a>
		<a href="/join-us/" class="navbtn">Join Us</a>
		<a href="/hire-us/" class="navbtn">Hire Us</a>
		<a href="/donate/" class="navbtn active">Donate</a>
		<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="menuFunction()">&#9776;</a>  
	</div>
	
    <div class="clear"></div>
        
        <div id="mainwrap">
	       	<div id="maintop"> </div>
            <div id="content">
