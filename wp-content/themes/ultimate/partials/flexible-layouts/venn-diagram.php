<section class="section overflow-x-clip radial pt-10 lg:pt-0">
    <div class="container">
        <div class="-mt-20 lg:mt-0">

            <div>
                <div class="venn-container max-w-xl mx-auto">
                    <div class="circle circle-left aspect-square"></div>
                    <div class="circle circle-right aspect-square"></div>
                </div>
            </div>
            <div class="max-w-6xl mx-auto text-center">
               <?php the_sub_field('content');?>
               <div class="text-center">
                    <?php get_template_part( 'template-parts/global/button-primary' ) ?>
                </div>
            </div>
        </div>
    </div>
</section>