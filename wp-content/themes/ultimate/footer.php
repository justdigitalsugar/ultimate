<footer class="pb-12 footer-clip bg-gray-100" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="px-4 py-20 container lg:py-24 text-center sm:text-left ">


        <div class="grid md:grid-cols-4 gap-4 lg:gap-8">
            <div class="mt-12 mb-12 xl:mt-0">

                <?php if ( have_rows( 'column_1', 'option' ) ) : ?>
                <div class="">
                    <?php while ( have_rows( 'column_1', 'option' ) ) : the_row(); ?>
                    <?php $logo = get_sub_field( 'logo' ); ?>
                    <?php if ( $logo ) : ?>
                    <a href="<?php echo get_site_url(); ?>" class="" aria-label="Home Link">
                        <img src="<?php echo esc_url( $logo['url'] ); ?>" height="30" width="200" loading="lazy"
                            alt="<?php echo esc_attr( $logo['alt'] ); ?>"
                            class="w-48 h-auto mb-8 lg:mx-0 lg:mb-0 mx-auto">
                    </a>
                    <?php endif; ?>

                    <?php if ( have_rows( 'contact' ) ) : ?>
                        <div class="mt-6">
                    <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
                    <div class="flex items-center mt-3 justify-center lg:justify-start">
                        <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

                        if ( $img_acf ) : ?>

                        <img class="h-8 w-8 mr-2" loading="lazy" height="50" width="50"
                            src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                            title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                            srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                            sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                            alt="<?php echo $img_acf->get_alt_text() ?>">
                        <?php endif; ?>
                        <?php $detail = get_sub_field( 'detail' ); ?>
                        <?php if ( $detail ) : ?>
                        <a href="<?php echo esc_url( $detail['url'] ); ?>"
                            target="<?php echo esc_attr( $detail['target'] ); ?>"><?php echo esc_html( $detail['title'] ); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>

                    <?php endwhile; ?>
                </div>



                <?php endif; ?>

            </div>

            <?php if ( have_rows( 'column_2', 'option' ) ) : ?>
            <?php while ( have_rows( 'column_2', 'option' ) ) : the_row(); ?>
            <div>
                <h3 class="text-base font-semibold tracking-wider uppercase">
                    <?php the_sub_field( 'heading' ); ?>
                </h3>
                <?php if ( have_rows( 'links' ) ) : ?>
                <ul class="mt-4 space-y-4">
                    <?php while ( have_rows( 'links' ) ) : the_row(); ?>
                    <li>
                        <?php $link = get_sub_field( 'link' ); 
                        $target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';
                        if ( $link && $link['target'] == '_blank' ) {
                            $target .= ' rel="noopener noreferrer"';
                        }
                        ?>
                        <?php if ( $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo $target; ?>
                            class="text-base text-gray-900 hover:text-black"><?php echo esc_html( $link['title'] ); ?></a>
                        <?php endif; ?>

                    </li>
                    <?php endwhile; ?>

                </ul>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'column_3', 'option' ) ) : ?>
            <?php while ( have_rows( 'column_3', 'option' ) ) : the_row(); ?>
            <div class="mt-12 md:mt-0">
                <h3 class="text-base font-semibold tracking-wider uppercase">
                    <?php the_sub_field( 'heading' ); ?>
                </h3>
                <?php if ( have_rows( 'links' ) ) : ?>
                <ul class="mt-4 space-y-4">
                    <?php while ( have_rows( 'links' ) ) : the_row(); ?>
                    <li>
                        <?php $link = get_sub_field( 'link' ); 
                        $target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';
                        if ( $link && $link['target'] == '_blank' ) {
                            $target .= ' rel="noopener noreferrer"';
                        }
                        ?>
                        <?php if ( $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo $target; ?>
                            class="text-base text-gray-900 hover:text-black"><?php echo esc_html( $link['title'] ); ?></a>
                        <?php endif; ?>


                    </li>
                    <?php endwhile; ?>

                </ul>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'column_4', 'option' ) ) : ?>
            <?php while ( have_rows( 'column_4', 'option' ) ) : the_row(); ?>
            <div class="mt-12 md:mt-0">
                <h3 class="text-base font-semibold tracking-wider uppercase">
                    <?php the_sub_field( 'heading' ); ?>
                </h3>
                <?php if ( have_rows( 'links' ) ) : ?>
                <ul class="mt-4 space-y-4">
                    <?php while ( have_rows( 'links' ) ) : the_row(); ?>
                    <li>
                        <?php $link = get_sub_field( 'link' ); 
                        $target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';
                        if ( $link && $link['target'] == '_blank' ) {
                            $target .= ' rel="noopener noreferrer"';
                        }
                        ?>
                        <?php if ( $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo $target; ?>
                            class="text-base text-gray-900 hover:text-black"><?php echo esc_html( $link['title'] ); ?></a>
                        <?php endif; ?>

                    </li>
                    <?php endwhile; ?>

                </ul>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</footer>


<script async src='<?php echo get_template_directory_uri(); ?>/dist/js/app.js'></script>
<!--/Scripts -->

<?php wp_footer(); ?>

</body>

</html>