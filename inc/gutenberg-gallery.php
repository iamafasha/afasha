<?php
/**
 * Custom Gutenberg functions
 */

function afasha_gutenberg_default_colors()
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

    register_block_type( 'afasha/progress-level', array(
        'editor_script' => 'progress-level'
    ) );

    register_block_type( 'afasha/profile-modal', array(
        'editor_script' => 'profile-modal'
    ) );

    register_block_type( 'afasha/service-item', array(
        'editor_script' => 'afasha/service-item'
    ) );
}
add_action( 'init', 'afasha_gutenberg_default_colors' );


function gwg_block_categories( $categories ) {
    $category_slugs = wp_list_pluck( $categories, 'slug' );
    return in_array( 'afasha_theme', $category_slugs, true ) ? $categories : array_merge(
        $categories,
        array(
            array(
                'slug'  => 'afasha_theme',
                'title' =>'Afasha Blocks',
                'icon'  => null,
            ),
        )
    );
}
add_filter( 'block_categories', 'gwg_block_categories' );

