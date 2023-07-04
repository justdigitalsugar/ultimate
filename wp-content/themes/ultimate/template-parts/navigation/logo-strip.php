<div class="pt-5 px-4 hidden lg:block">
    <div class="flex items-center justify-between w-full">
        <div class="mx-2 w-[15%]">
            <div class="flex">
                <a href="<?php echo get_site_url(); ?>/my-account/" aria-label="My Account"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" id="toggle"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

        </div>
        <div class="relative block px-4 xl:px-0 w-[70%]">
            <?php $img_acf = GetACFImage( get_field( 'nav_logo' ,'option' ) );

                        if ( $img_acf ) : ?>

            <a href="<?php echo get_site_url(); ?>" aria-label="Home Link">
                <!-- ACF Image START-->
                <img class='w-auto h-10 lg:h-[30px] mx-auto' height="30" width="200"
                    src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                    title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                    srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                    sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                    alt="<?php echo $img_acf->get_alt_text() ?>" />
                <!-- ACF Image END -->
            </a>
            <?php endif; ?>

        </div>

        <div class="mx-2 w-[15%]">
            <a href="<?php echo get_site_url(); ?>/cart/" aria-label="Cart Link"
                class="relative block text-sm font-normal text-black rounded lg:text-base w-fit ml-auto">
                <div class="flex items-center">
                    <span class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <sup class="flex items-center justify-center w-4 h-4 -ml-2 text-white bg-black rounded-full">
                            <span
                                class="text-xs header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </sup>
                    </span>

                    <span class="header-cart-total">
                        <p class="mb-0"><?php echo WC()->cart->get_cart_total(); ?></p>
                    </span>
                    <span class="sr-only">items in cart, view bag</span>
                </div>
            </a>

        </div>

    </div>
</div>

<div class="searchoverlay flex justify-center items-center relative" id="searchoverlay">
    <div class="absolute top-12 right-12">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" id="closetoggle" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
    <div class="lg:w-5xl mx-auto overlay-content">
        <p class="text-4xl font-medium uppercase text-white text-center font-audrey">Search</p>
        <form action="/" method="get">
            <label for="search" class="sr-only">Search for products</label>
            <input placeholder="Search Products" type="text" name="s" id="search"
                value="<?php the_search_query(); ?>" />
            <input type="submit" id="searchsubmit" class="button border-white border"
                value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
        </form>
    </div>
</div>