<header class="header nav-shadow">
    <div class="pl-2 pr-4 lg:px-8">
        <div class="row v-center">
            <div class="header-item item-left">
                <div class="logo">
                    <?php $img_acf = GetACFImage( get_field( 'nav_logo' ,'option' ) );

                if ( $img_acf ) : ?>

                    <a href="<?php echo get_site_url(); ?>" aria-label="Home Link">
                        <!-- ACF Image START-->
                        <img class='w-auto h-10 lg:h-[35px]' height="30" width="200"
                            src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                            title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                            srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                            sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                            alt="<?php echo $img_acf->get_alt_text() ?>" />
                        <!-- ACF Image END -->
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="header-item item-center">
                <div class="menu-overlay"></div>
                <nav class="menu">
                    <div class="mobile-menu-head">
                        <div class="go-back bg-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>

                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </div>
                    </div>
                    <ul class="menu-main">
                        <?php if ( have_rows( 'flexible_menu', 'option' ) ): ?>
                        <?php while ( have_rows( 'flexible_menu', 'option' ) ) : the_row(); ?>

                        <?php if ( get_row_layout() == 'basic_link' ) : ?>
                        <?php $menu_link = get_sub_field( 'menu_link' ); 
                    $target = ! empty( $menu_link['target'] ) ? ' target="' . $menu_link['target'] . '"' : '';
                    if ( $menu_link && $menu_link['target'] == '_blank' ) {
                        $target .= ' rel="noopener noreferrer"';
                    }
                    ?>
                        <?php if ( $menu_link ) : ?>
                        <li>
                            <a href="<?php echo esc_url( $menu_link['url'] ); ?>" <?php echo $target; ?>
                                class=""><?php echo esc_html( $menu_link['title'] ); ?></a>
                        </li>

                        <?php endif; ?>

                        <?php elseif ( get_row_layout() == 'mega_menu' ) : ?>

                        <li class="menu-item-has-children">

                            <?php $top_level = get_sub_field( 'top_level' ); 
                            $target = ! empty( $top_level['target'] ) ? ' target="' . $top_level['target'] . '"' : '';
                            if ( $top_level && $top_level['target'] == '_blank' ) {
                                $target .= ' rel="noopener noreferrer"';
                            }
                            
                            ?>
                            <?php if ( $top_level ) : ?>
                            <a href="#" <?php echo $target; ?> class=""><?php echo esc_html( $top_level['title'] ); ?>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="ml-1 w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>


                            </a>
                            <?php endif; ?>
                            <?php
                                    $cols = get_sub_field( 'number_columns' );
                                ?>
                            <div class="sub-menu mega-menu mega-menu-column-<?php echo $cols;?>">

                                <?php if ( have_rows( 'columns' ) ) : ?>
                                <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                                <div class="list-item">

                                    <ul>
                                        <?php if ( have_rows( 'nav_links' ) ) : ?>
                                        <?php while ( have_rows( 'nav_links' ) ) : the_row(); ?>
                                        <?php $nav_link = get_sub_field( 'nav_link' ); 
                                      $target = ! empty( $nav_link['target'] ) ? ' target="' . $nav_link['target'] . '"' : '';
                                      if ( $nav_link && $nav_link['target'] == '_blank' ) {
                                          $target .= ' rel="noopener noreferrer"';
                                      }
                                    ?>
                                        <?php if ( $nav_link ) : ?>
                                        <li class="!mb-3"><a href="<?php echo esc_url( $nav_link['url'] ); ?>"
                                                <?php echo $target; ?>><?php echo esc_html( $nav_link['title'] ); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>

                                </div>
                                <?php endwhile; ?>
                                <?php endif; ?>


                            </div>
                        </li>

                        <?php endif; ?>

                        <?php endwhile; ?>
                    </ul>
                    <?php else: ?>
                    <p>Menu not available</p>

                    <?php endif; ?>
                </nav>
            </div>
            <div class="header-item item-right">

                <span id="email-slide"
                    class="border-secondary hover:border-black border-2 bg-secondary hover:bg-transparent !text-black hover:opacity-100 h-10 w-10 rounded-full !flex items-center justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                    </svg>
                </span>

                <div class="mobile-menu-trigger">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="contact-box">

    <div class="text-white">
        <h4>Have a question? get in touch.</h4>
        <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>

    </div>

    <div class="z-[999] absolute top-6 left-6 h-8 w-8 lg:h-12 lg:w-12 bg-secondary rounded-full flex items-center justify-center cursor-pointer"
        id="contact-close">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="h-4 w-4 lg:w-6 lg:h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </div>

</div>