<?php

//======================================================================
//   ADD FAQ SCHEMA TO WEBSITE
//======================================================================
 
function FAQ_schema()
{
 
    if (have_rows('flexible_content')) {
 
        while (have_rows('flexible_content')) : the_row();
 
            if (get_row_layout() == 'faqs') {
 
                //Schema Markup FAQ
                global $schema;
                $schema = array(
                    '@context' => "https://schema.org",
                    '@type' => "FAQPage",
                    'mainEntity' => array()
                );
 
                //make sure field is your acf repeater
                while (have_rows('faq_items')) : the_row();
 
                    $questions = array(
                        '@type' => 'Question',
                        'name' => get_sub_field('question'), //Question field name
                        'acceptedAnswer' => array(
                            '@type' => "Answer",
                            'text' => get_sub_field('answer') //Answer field name
                        )
                    );
 
                    array_push($schema['mainEntity'], $questions);
 
                endwhile;
 
 
                echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
 
            }
        endwhile;
    }
}
 
add_action('wp_footer', 'FAQ_schema');

function blogSchema()
{
 
    if (have_rows('blog_blocks')) {
 
        while (have_rows('blog_blocks')) : the_row();
 
            if (get_row_layout() == 'faqs') {
 
                //Schema Markup FAQ
                global $schema;
                $schema = array(
                    '@context' => "https://schema.org",
                    '@type' => "FAQPage",
                    'mainEntity' => array()
                );
 
                //make sure field is your acf repeater
                while (have_rows('faq_items')) : the_row();
 
                    $questions = array(
                        '@type' => 'Question',
                        'name' => get_sub_field('question'), //Question field name
                        'acceptedAnswer' => array(
                            '@type' => "Answer",
                            'text' => get_sub_field('answer') //Answer field name
                        )
                    );
 
                    array_push($schema['mainEntity'], $questions);
 
                endwhile;
 
 
                echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
 
            }
        endwhile;
    }
}
 
add_action('wp_footer', 'blogSchema');