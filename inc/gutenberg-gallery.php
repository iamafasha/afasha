<?php
/**
 * Custom Gutenberg functions
 */

function alecaddd_gutenberg_default_colors()
{
    //Block editor supports
    add_theme_support('editor-color-palette', array(
            array(
                'name' => 'White',
                'slug' => 'white',
                'color' => '#ffffff'
            ),
            array(
                'name' => 'Foreground',
                'slug' => 'foreground',
                'color' => '#27bbff'
            ),
            array(
                'name' => 'Background',
                'slug' => 'background',
                'color' => '#222222'
            )
        )
    );
    
    //gallery block type
    wp_register_script( 'gutenberg-gallery', get_template_directory_uri() .'/js/starter-block/build/index.js', array( 'wp-blocks' , 'wp-editor' ,'wp-element', 'wp-components'));

    register_block_type( 'afasha/project-gallery', array(
        'editor_script' => 'gutenberg-gallery'
    ) );
}
add_action( 'init', 'alecaddd_gutenberg_default_colors' );