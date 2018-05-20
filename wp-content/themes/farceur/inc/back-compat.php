<?php
/**
 * farceur back compat functionality
 *
 * Prevents farceur from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since farceur 1.0.0
 */

/**
 * Prevent switching to farceur on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since farceur 1.0.0
 */
function farceur_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'farceur_upgrade_notice' );
}
add_action( 'after_switch_theme', 'farceur_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * farceur on WordPress versions prior to 3.6.
 *
 * @since farceur 1.0.0
 */
function farceur_upgrade_notice() {
	$message = sprintf( __( 'farceur requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'farceur' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since farceur 1.0.0
 */
function farceur_customize() {
	wp_die( sprintf( __( 'farceur requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'farceur' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'farceur_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since farceur 1.0.0
 */
function farceur_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'farceur requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'farceur' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'farceur_preview' );
