<?php get_header(); ?>
<div class="bg-black py-12">
    <h1 class="text-center text-white">Search</h1>
</div>
<main>
    <div class="px-4 py-12 mx-auto max-w-7xl lg:py-20">
        <?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>

        <h3 class="mb-8 text-center pagetitle">Search Result for
            <?php 
            $allsearch = new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="text-deepcoral search-terms">"'); echo $key; _e('"</span>'); ?>


        </h3>
        <h3><?php echo $count . ' '; _e('items found'); wp_reset_query(); ?></h3>

        <div class="grid gap-4 lg:grid-cols-3">
            <?php while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>

            <article class="border border-black mb-4 p-4">
                <a class="mb-4" href="<?php the_permalink() ?>" rel="bookmark">
                    <div class="h-[200px] lg:h-[350px] overflow-hidden">
                        <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('full', array('class' => 'h-full w-full object-cover rounded-lg'));
                                        } else { ?>
                        <img src="/wp-content/uploads/2021/11/soon.jpg" class="object-cover w-full h-full rounded-lg"
                            alt="<?php the_title(); ?>" />
                        <?php } ?>
                    </div>
                </a>
                <h3 class="mb-0 text-center text-lg"><a class="no-underline text-deepcoral"
                        href="<?php the_permalink() ?>" rel="bookmark"
                        title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                <div class="mt-2 text-center">
                    <a class="block mb-4" href="<?php the_permalink() ?>" rel="bookmark">View more &raquo;</a>
                </div>
            </article>
            <?php
        } ?>
        </div>
        <?php }else{
?>
        <h1>Nothing Found</h1>

        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>

        <?php } wp_reset_query(); ?>

    </div>
</main>
<?php get_footer();?>