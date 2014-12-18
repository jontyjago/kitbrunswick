<?php
/*
File: functions.php
Site: www.kitbrunswick.com
Author: Jonathan Evans
URL: htp://www.jontyjago.com/

/*********************
CUSTOM POST TYPES

These allow the user to access all the functionality of the Wordpress post type
(Page or Post being the 2 main default ones), but with custom names.

Documentation:
http://codex.wordpress.org/custom_post_type#Custom_Post_Types
http://codex.wordpress.org/Function_Reference/register_post_type

*********************/

// Start Testimonials

function kb_testimonial() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'testimonial' ),
		'add_new_item'       => __( 'Add New Testimonial' ),
		'edit_item'          => __( 'Edit Testimonial' ),
		'new_item'           => __( 'New Testimonial' ),
		'all_items'          => __( 'All Testimonials' ),
		'view_item'          => __( 'View Testimonial' ),
		'search_items'       => __( 'Search Testimonials' ),
		'not_found'          => __( 'No Testimonials found' ),
		'not_found_in_trash' => __( 'No Testimonials found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Allows you to enter and edit testimonials',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'testimonial', $args );
	flush_rewrite_rules( false );
}

add_action( 'init', 'kb_testimonial' );

//Customise messages
function kb_testimonial_messages( $messages ) {
	global $post, $post_ID;
	$messages['testimonial'] = array(
		0 => '',
		1 => sprintf( __( 'Testimonial updated. <a href="%s">View testimonial</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Testimonial updated.' ),
		3 => __( 'Testimonial deleted.' ),
		4 => __( 'testimonial updated.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Testimonial restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Testimonial published. <a href="%s">View Testimonial</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Testimonial saved.' ),
		8 => sprintf( __( 'Testimonial submitted. <a target="_blank" href="%s">Preview product</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Testimonial scheduled for publication on: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Testimonial draft updated. <a target="_blank" href="%s">Preview product</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'kb_testimonial_messages' );


//End Testimonial
//**********************
// Start Accomplishments

function kb_accomplishment() {
	$labels = array(
		'name'               => _x( 'Accomplishments', 'post type general name' ),
		'singular_name'      => _x( 'Accomplishment', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Accomplishment' ),
		'add_new_item'       => __( 'Add New Accomplishment' ),
		'edit_item'          => __( 'Edit Accomplishment' ),
		'new_item'           => __( 'New Accomplishment' ),
		'all_items'          => __( 'All Accomplishments' ),
		'view_item'          => __( 'View Accomplishment' ),
		'search_items'       => __( 'Search Accomplishments' ),
		'not_found'          => __( 'No Accomplishments found' ),
		'not_found_in_trash' => __( 'No Accomplishments found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Accomplishments'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Allows you to enter and edit Accomplishments',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'accomplishment', $args );
	flush_rewrite_rules( false );
}

add_action( 'init', 'kb_accomplishment' );

//Customise messages
function kb_accomplishment_messages( $messages ) {
	global $post, $post_ID;
	$messages['accomplishment'] = array(
		0 => '',
		1 => sprintf( __( 'Accomplishment updated. <a href="%s">View Accomplishment</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Accomplishment updated.' ),
		3 => __( 'Accomplishment deleted.' ),
		4 => __( 'Accomplishment updated.' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Accomplishment restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Accomplishment published. <a href="%s">View Accomplishment</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Accomplishment saved.' ),
		8 => sprintf( __( 'Accomplishment submitted. <a target="_blank" href="%s">Preview product</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Accomplishment scheduled for publication on: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Accomplishment draft updated. <a target="_blank" href="%s">Preview product</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'kb_accomplishment_messages' );

//End accomplishment

/******************
OPTIONS PAGE

This is a separate page in the Admin interface with a number of one-off
options which the user can set. The options are stored in the wp_options table
and can be referenced from anywhere using the get_options function.

******************/

add_action( 'admin_menu', 'kb_options_menu' );

function kb_options_menu() {
	// this function adds the page to the Admin menu - it does not control the content
	add_menu_page( 'KB Options', 'KB Options', 'manage_options', 'kb-user-options', 'kb_options_page', '', 99 );
}

function kb_options_page() {
	// this function controls the content and runs the add or update against the db
	
	//if we got here with a POST, update the database with the new options
	if (isset($_POST['update_kb_options'])) {
        if ( $_POST['update_kb_options'] == 'true' ) { kb_options_update(); }
    }
?>

<!--Options Markup-->
<!-- the html for the Options Page -->
<div class="wrap">
    <div id="icon-themes" class="icon32"><br />
    </div>
    <h2>Options</h2>
    <p>The following options allow you edit the titles on the home page - note that the titles will also be applied to the menu on the sidebar.</p>
    <form method="POST" action="">
<!--    hidden field to trigger the update -->
        <input type="hidden" name="update_kb_options" value="true" />
        <h3>Tagline</h3>
<!--    the text fields are populated with the values if they already exist -->
    	<input type="text" name="tagline" id="tagline" size="90" value="<?php esc_attr_e( get_option( 'tagline' ) ); ?>"/>
        <h3>About</h3>
        <input type="text" name="about-title" id="about-title" size="30" value="<?php esc_attr_e( get_option( 'about-title' ) ); ?>"/>
        <h3>Skills</h3>
        <input type="text" name="skills-title" id="skills-title" size="30" value="<?php esc_attr_e( get_option( 'skills-title' ) ); ?>"/>
        <h3>Testimonials</h3>
        <input type="text" name="testimonial-title" id="testimonial-title" size="30" value="<?php esc_attr_e( get_option( 'testimonial-title' ) ); ?>"/>
        <h3>Accomplishments</h3>
        <input type="text" name="accomplishments-title" id="accomplishments-title" size="30" value="<?php esc_attr_e( get_option( 'accomplishments-title' ) ); ?>"/>
        <h3>Contact</h3>
        <input type="text" name="contact-title" id="contact-title" size="30" value="<?php esc_attr_e( get_option( 'contact-title' ) ); ?>"/>
        
        <!-- submit button -->
        <p><input type="submit" name="search" value="Update Options" class="button" /></p>
    </form>
</div>

<?php
}
function kb_options_update() {
	// this is where validation would go
	// run the add or update
	update_option( 'tagline', stripslashes($_POST['tagline']) );
	update_option( 'about-title', stripslashes($_POST['about-title']) );
	update_option( 'skills-title', stripslashes($_POST['skills-title']) );
	update_option( 'testimonial-title', stripslashes($_POST['testimonial-title']) );
	update_option( 'accomplishments-title', stripslashes($_POST['accomplishments-title']) );
	update_option( 'contact-title', stripslashes($_POST['contact-title'])) ;
}

/*********************
FONTS
*********************/
// Generates the link to the Google Fonts CSS in the header
function load_fonts() {
  wp_register_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic' );
  wp_enqueue_style( 'googleFonts' );
}

add_action( 'wp_print_styles', 'load_fonts' );

/*********************
Theme Support
*********************/
// Adds Featured Image to the custom posts
add_theme_support( 'post-thumbnails' ); 