<?php

if( function_exists('acf_add_options_page') ) {

acf_add_options_sub_page(array(
'page_title' => 'Theme Header Settings',
'menu_title' => 'Header',

));

acf_add_options_sub_page(array(
'page_title' => 'Theme Footer Settings',
'menu_title' => 'Footer',

));

acf_add_options_sub_page(array(
    'page_title' => 'Global Settings',
    'menu_title' => 'Global Settings',
    
    ));



acf_add_options_sub_page(array(
    'page_title' => 'Shop Settings',
    'menu_title' => 'Shop',
    
    ));

}

?>