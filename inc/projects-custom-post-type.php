<?php
/*
@package afasha
    ==========================
    Theme custom post types
    =========================
*/

add_action('init', 'projects_ctmpt');
function projects_ctmpt()
{
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'add_new' => 'Add Project',
        'add_new_item' => 'Add Project',
        'menu_name' => 'Projects',
        'name_admin_bar' => 'Projects',
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'public' => true,
        'show_in_rest' => true,
        'capability_type' => 'post',
        'taxonomies'  => array( 'category','post_tag' ),
        'hierarchical' => true,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => array('title', 'editor', 'author','post-formats', 'excerpt', 'comments','thumbnail'),
        'has_archive' => true,
    );

    register_post_type('projects', $args);
}

function jt_get_allowed_project_formats() {

	return array('gallery', 'image', 'video' );
}

add_action( 'load-post.php',     'jt_post_format_support_filter' );
add_action( 'load-post-new.php', 'jt_post_format_support_filter' );
add_action( 'load-edit.php',     'jt_post_format_support_filter' );

function jt_post_format_support_filter() {

	$screen = get_current_screen();

	// Bail if not on the projects screen.
	if ( empty( $screen->post_type ) ||  $screen->post_type !== 'projects' )
		return;

	// Check if the current theme supports formats.
	if ( current_theme_supports( 'post-formats' ) ) {

		$formats = get_theme_support( 'post-formats' );

		// If we have formats, add theme support for only the allowed formats.
		if ( isset( $formats[0] ) ) {
			$new_formats = array_intersect( $formats[0], jt_get_allowed_project_formats() );

			// Remove post formats support.
			remove_theme_support( 'post-formats' );

			// If the theme supports the allowed formats, add support for them.
			if ( $new_formats )
				add_theme_support( 'post-formats', $new_formats );
		}
	}

	// Filter the default post format.
	add_filter( 'option_default_post_format', 'jt_default_post_format_filter', 95 );
}

function jt_default_post_format_filter( $format ) {
	return in_array( $format, jt_get_allowed_project_formats() ) ? $format : 'standard';
}