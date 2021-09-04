<?php

class Walker_Social_Menu extends Walker_Nav_menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output = '<ul class="social-icons">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
    {
        //var_dump($item);
        $output .= '<li><a target="_blank"  class="' . $item->title . '" href="' . $item->url . '" ><i class="fab fa-' . $item->title . '"></i></a>';
    }

    /*
function end_el(){ // closing li a span

}

function end_lvl(){ // closing ul

}
 */
}

class Walker_Main_Menu extends Walker_Nav_menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output = '<ul class="menu">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
    {
        //var_dump($item);

        $is_current_item = '';
        if (array_search('current-menu-item', $item->classes) != 0) {
            $is_current_item = ' class="active"';
        }
        $output .= '<li  ><a ' . $is_current_item . '  href="' . $item->url . '" ><span>' . $item->title . '</span></a>';
    }

    /*
function end_el(){ // closing li a span

}

function end_lvl(){ // closing ul

}
 */
}
