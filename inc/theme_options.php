<?php


function register_fields()
{
    register_setting('general', 'phone_number', 'esc_attr');
    add_settings_field('phone_number', '<label for="phone_number">'.__('Phone Number' , 'phone_number' ).'</label>' , 'print_phone_number', 'general');

    register_setting('general', 'pysical_address', 'esc_attr');
    add_settings_field('pysical_address', '<label for="pysical_address">'.__('Physical Address' , 'pysical_address' ).'</label>' , 'print_address', 'general');
}

function print_phone_number()
{
    $value = get_option( 'phone_number', '' );
    echo '<input type="tel" id="phone_number" name="phone_number" value="' . $value . '" />';
}
function print_address()
{
    $value = get_option( 'pysical_address', '' );
    echo '<textarea cols="35" rows="3" id="pysical_address" name="pysical_address">'.$value.'</textarea>';
}

add_filter('admin_init', 'register_fields');