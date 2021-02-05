<?php
/*
@package afasha
    ==========================
    Theme surport
    =========================
*/

$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
add_theme_support('post-formats', $formats);
add_theme_support('post-thumbnails');

//Navigation menus
function l_register_nav_menu()
{
    register_nav_menu('main_menu', 'Main Navigation Menu');
    register_nav_menu('social_menu', 'Social Icons Menu');
}
add_action('after_setup_theme', 'l_register_nav_menu');
add_post_type_support('page', 'excerpt');

// add tag support to pages
function tags_support_all()
{
    register_taxonomy_for_object_type('category', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query)
{
    if ($wp_query->get('tag')) {
        $wp_query->set('post_type', 'any');
    }
}
// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');


function themename_custom_logo_setup()
{
    $defaults = array(
    'width'       => 40,
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');   



add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}


$args = array(
    'default-color' => '0000ff',
    'default-image' => get_template_directory_uri() . '/upload/body-bg.jpg',
);
add_theme_support( 'custom-background', $args );

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="blog-page-link"';
}