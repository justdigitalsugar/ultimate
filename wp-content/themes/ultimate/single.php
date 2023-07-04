<?php get_header();?>
<main class="">

        <div class="w-full">
            <?php
        $id = $wp_query->post;
        
        if ( have_rows( 'flexible_content', $id ) ) :
        
            while ( have_rows( 'flexible_content', $id ) ) : the_row();
        
                get_template_part( 'partials/flexible-layouts/' . get_row_layout() );
        
            endwhile;
        
        elseif ( get_the_content() ) :
        
        endif;
        

        ?>
        </div>
       
    </div>

</main>

<?php get_footer();?>