<?php 

//Load More
function load_posts() {
    $paged = $_POST['page'];
    $search = $_POST['search'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
        's' => $search,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content', get_post_format());
        endwhile;
    endif;
	die;
}

add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');