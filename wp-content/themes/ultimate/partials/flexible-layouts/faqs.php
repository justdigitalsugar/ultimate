<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> accordion">

    <div class="max-w-5xl mx-auto px-4">
        <?php if ( get_sub_field('sub_heading') ) : ?>
        <p class="text-sm font-medium tracking-widest text-gray-900 uppercase text-center">
            <?php the_sub_field('sub_heading'); ?>
        </p>
        <?php endif; ?>
        <?php if ( get_sub_field('heading') ) : ?>
        <h3 class="text-center mb-8 lg:mb-8 uppercase"><?php the_sub_field('heading'); ?></h3>
        <?php endif; ?>

        <?php if ( have_rows('faq_items') ) : ?>
        <?php while( have_rows('faq_items') ) : the_row(); ?>

        <div class=" mb-2 accordion__item">
            <div
                class="relative flex items-center justify-between px-6 py-3 font-medium transition-all duration-300 ease-in-out bg-white border-b cursor-pointer md:py-4 js-toggle">
                <h3
                    class="m-0 text-lg font-medium transition-all duration-300 ease-in-out lg:text-xl text-black-500 font-moderat">
                    <?php the_sub_field('question'); ?>
                </h3>
                <span
                    class="flex items-center justify-center p-2 ml-4 transition-all duration-300 ease-in-out rounded-full md:p-3 chevron"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg></span>
            </div>
            <div
                class="relative overflow-hidden transition-all duration-300 ease-in-out toggle-container animated fade-in-up">
                <div class="mt-6 px-6">
                    <?php the_sub_field('answer'); ?>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<!-- /Frequently asked questions -->