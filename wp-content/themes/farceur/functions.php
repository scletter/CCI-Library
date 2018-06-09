<?php
/**
 * farceur functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development
 * and https://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage farceur
 * @since farceur 1.1.0
 */

/*
 * Set up the content width value based on the theme's design.
 *
 * @see farceur_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;


/**
 * farceur only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * farceur setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * farceur supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since farceur 1.0.0
 */
function farceur_setup() {
	/*
	 * Makes farceur available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on farceur, use a find and
	 * replace to change 'farceur' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'farceur', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', farceur_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'farceur' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'farceur_setup' );

/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since farceur 1.0.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function farceur_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'farceur' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'farceur' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since farceur 1.1.0
 */
function farceur_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );
	
	// Loads JavaScript files with functionality specific to farceur.	
	wp_enqueue_script( 'farceur-script-nav', get_template_directory_uri() . '/js/navigation_highlight.js', array( 'jquery', 'jquery-ui-accordion' ), '1.1.0' );

	// Loads JavaScript files with functionality specific to farceur.	
	wp_enqueue_script( 'farceur-script-pdf', get_template_directory_uri() . '/js/pdf.js', array( 'jquery', 'jquery-ui-dialog' ), '1.1.0' );
	
	wp_enqueue_script( 'farceur-slideshow', get_template_directory_uri() . '/js/slideshow.js', array( 'jquery' ), '1.1.0' );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'farceur-fonts', farceur_fonts_url(), array(), null );
	
		// Loads our main stylesheet.
	wp_enqueue_style( 'farceur', get_stylesheet_uri(),array(), '1.1.0' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'farceur-ie', get_template_directory_uri() . '/css/ie.css', array( 'farceur-style' ), '2013-07-18' );
	wp_style_add_data( 'farceur-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'farceur_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since farceur 1.0.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function farceur_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'farceur' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'farceur_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since farceur 1.0.0
 */
function farceur_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'farceur' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'The sidebar that appears on the right.', 'farceur' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Front Page Sidebar', 'farceur' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on Front Page.', 'farceur' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'farceur_widgets_init' );

if ( ! function_exists( 'farceur_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own farceur_entry_meta() to override in a child theme.
 *
 * @since farceur 1.0.0
 */
function farceur_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'farceur' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		farceur_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'farceur' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'farceur' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'farceur' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'farceur_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own farceur_entry_date() to override in a child theme.
 *
 * @since farceur 1.0.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function farceur_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'farceur' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'farceur' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'farceur_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since farceur 1.0.0
 */
function farceur_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'farceur_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since farceur 1.0.0
 *
 * @return string The Link format URL.
 */
function farceur_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'farceur_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since farceur 1.0.0
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function farceur_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'farceur' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'farceur_excerpt_more' );
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since farceur 1.0.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function farceur_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'farceur_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since farceur 1.0.0
 */
function farceur_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'farceur_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since farceur 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function farceur_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'farceur_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since farceur 1.0.0
 */
function farceur_customize_preview_js() {
	wp_enqueue_script( 'farceur-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'farceur_customize_preview_js' );

if ( ! function_exists( 'farceur_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Note, this function was part of the original twentyten theme that farceur was based upon
 * and was not in TwentyThirteen.  comment.php in farceur theme requires this callback as twentyten.
 * At some point the names should be updated to reflect one theme. 
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own farceur_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since farceur 1.0.0
 */
function farceur_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div class="commentbg">
    <?php echo get_avatar( $comment, 40 ); ?>
		<div id="comment-<?php comment_ID(); ?>" class="commentinsidewrap">
		<div class="comment-author vcard">
        
			
            
           
			<?php printf( __( '%s <span class="says">says:</span>', 'farceur' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'farceur' ); ?></em>
			<br />
		<?php endif; ?>
<div class="comment-body"><?php comment_text(); ?></div>
		

		<div class="comment-meta commentmetadata"><img src="/Images/heartbullet.png" class="smallerheart"/> Posted: <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'farceur' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'farceur' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata --><br /><br />

		<div class="reply">
			&raquo; <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  --><div class="clear"></div></div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'farceur' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'farceur'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

if ( ! function_exists( 'farceur_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since farceur 1.0.0
 */
function farceur_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'farceur' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'farceur' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'farceur_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since farceur 1.0.0
 */
function farceur_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'farceur' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'farceur' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'farceur' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
 * Provides a login form function for use on a page.
 *
 * @since farceur 1.0.0
 * @returns wordpress loginform 
 * @returns User logged in including name of user.
 */
function farceur_login_form() {

	$attr = array();
	
	if ( is_user_logged_in() ) {
		return '';
	}
	
	/* Set up some defaults. */
	$defaults = array(
		'label_username' => 'User or Email',
		'label_password' => 'Password'
	);
	
	/* Merge the user input arguments with the defaults. */
	$attr = shortcode_atts( $defaults, $attr );

	/* Set 'echo' to 'false' because we want it to always return instead of print for shortcodes. */
	$attr['echo'] = true;
	
	return wp_login_form( $attr );
}
/**
 * Provides a Dialog popup which displays a embedded PDF file from the PDF folder.
 *
 * @since farceur 1.0.0
 */
function farceur_pdf_popup ( $filename, $divid ) {
	$file = "/wp-content/themes/farceur/PDF/" . $filename . "#view=fitH";
	?>
	<div class="Dialog" id="<?php echo $divid; ?>" style="display: none" title="<?php echo $filename; ?>">
		<object data="<?php echo $file; ?>" width="600" height="450" type="application/pdf">
			<p>It appears you don't have Adobe Reader or PDF support in this web browser. <a href="<?php echo $file; ?>">Click here to download the PDF</a>. Or <a href="http://get.adobe.com/reader/" target="_blank">click here to install Adobe Reader</a>.</p>
			<embed src="<?php echo $file; ?>" width="100%" height="100%" alt="pdf" type="application/pdf">
		</object>
	</div>
	<?php
}

