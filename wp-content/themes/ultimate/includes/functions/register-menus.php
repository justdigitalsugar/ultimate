<?php

function wpb_custom_new_menu()
{
register_nav_menu('header', __('Main navigation'));
register_nav_menu('footer','Footer Menu');
register_nav_menu('footer2','Links');
}
add_action('init', 'wpb_custom_new_menu');

add_action('thesis_hook_footer','custom_footer_menu');

?>