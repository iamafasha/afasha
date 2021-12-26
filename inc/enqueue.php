<?php

function afasha_load_styles_and_scripts($hook)
{
    //css & fonts
    wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap.css', array(), 'all');
    wp_enqueue_style('magnific_popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), 'all');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '1.5', 'all');
    wp_enqueue_style('scss_style', get_template_directory_uri() . '/css/scss-main.css', array(), '1.5', 'all');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), "1.1", 'all');
    wp_enqueue_style('google_font', 'https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic', array(), 'all');
    //js
//    wp_enqueue_script('ajax-posts', get_template_directory_uri() . '/js/ajax-posts.js', array('jquery'), '1.0', true);
    wp_enqueue_script('font-awesomejs', 'https://kit.fontawesome.com/0672d868fb.js', array(), true);
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), true);
    wp_enqueue_script('jquery_migrate', get_template_directory_uri() . '/js/jquery.migrate.js', array(), true);
    wp_enqueue_script('jquery_imagesloaded', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js', array(), true);
    wp_enqueue_script('jquery_magnific_popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), true);
    wp_enqueue_script('jquery_flex_slider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), true);
    wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.min.js', array('jquery'), true);
    wp_enqueue_script('macyjs', 'https://cdn.jsdelivr.net/npm/macy@2', array('jquery'), true);
    wp_enqueue_script('jquery_nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('font-awesomejs'), true);
}

function afasha_load_admin_styles_and_scripts($hook)
{

}

add_action('wp_enqueue_scripts', 'afasha_load_styles_and_scripts');
add_action('admin_enqueue_scripts', 'afasha_load_admin_styles_and_scripts');

function afasha_get_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed = get_media_embedded_in_content($content, $type);
    if (in_array('audio', $type)):
        $output = str_replace('?visual=true', '?visual=false', $embed[0]);
    else:
        $output = $embed[0];
    endif;
    return $output;
}

function sunset_get_bs_slides($attachments)
{
    $output = array();
    $count = count($attachments) - 1;

    for ($i = 0; $i <= $count; ++$i):

        $active = ($i == 0 ? ' active' : '');

        $n = ($i == $count ? 0 : $i + 1);
        $nextImg = wp_get_attachment_thumb_url($attachments[$n]->ID);
        $p = ($i == 0 ? $count : $i - 1);
        $prevImg = wp_get_attachment_thumb_url($attachments[$p]->ID);

        $output[$i] = array(
            'class' => $active,
            'url' => wp_get_attachment_url($attachments[$i]->ID),
            'next_img' => $nextImg,
            'prev_img' => $prevImg,
            'caption' => $attachments[$i]->post_excerpt,
        );

    endfor;

    return $output;
}

function sunset_get_attachment($num = 1)
{
    $output = '';
    if (has_post_thumbnail() && $num == 1):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));else:
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID(),
        ));
        if ($attachments && $num == 1):
            foreach ($attachments as $attachment):
                $output = wp_get_attachment_url($attachment->ID);
            endforeach;elseif ($attachments && $num > 1):
            $output = $attachments;
        endif;

        wp_reset_postdata();

    endif;

    return $output;
}

function sunset_grab_url()
{
    if (!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links)) {
        return false;
    }

    return esc_url_raw($links[1]);
}

function sunset_grab_quote()
{
    $x = array();
    $post = str_get_html(get_the_content());
    foreach ($post->find('blockquote') as $element) {
        $quote = $element->find('p', 0)->plaintext;
        $author = $element->find('cite', 0)->plaintext;
        array_push($x, ["quote" => $quote, "author" => $author]);
    }
    return $x;
}
