<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.0.0
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

<?php
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper"> 
    <div id="outerheader" >
   	  <div id="headerwrap" > 
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/logo358-16year.png'?>" alt="Caring Clowns International Logo" id="logo"/>  </a>
			<div id="utilities">
             	<div id="utilitiesmain">
					<a href="/index.php/"> Home </a> | <a href="/contact-us/"> Contact Us </a> | <a href="/CCIPressKit.pdf"> Press Kit </a> |<?php get_search_form(); ?>
				</div>
				<div id="banner">
					<a href="<?php echo esc_url( home_url( '/thank-you-for-successful-auction/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Auction-2018-Thanks_Off.png'?>" alt="Auction-2018" /></a>
				</div>
        	</div><!--End Utilities -->
      </div><!--End Header Wrap -->
    </div><!--End Outer Header Wrap -->
        
	<div id="navwrap">   
		<div id="navpanel" >
			<a href="/about-us/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/AboutUs_Off.png'?>" class="about" alt="About Us"/></a>
			<a href="/news/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/News_Off.png'?>" class="news" alt="News" /></a>
			<a href="/calendar/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Calendar_Off.png'?>" class="calendar" alt="Calendar"/></a>
			<a href="/projects/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Outreach_Off.png'?>" class="outreach" alt="Outreach"/></a>
			<a href="/get-involved/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/GetInvolved_Off.png'?>" class="involved" alt="Get Involved"/></a>
			<a href="/donate/"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/Images/Donate_Off.png'?>" class="donate pngfix" alt="donate" /></a>
		</div> <!--End Nav Panel -->

	</div><!--End Nav Wrapper -->
    <div class="clear"></div>
        
        <div id="mainwrap">
	       	<div id="maintop"> </div>
            <div id="content">
