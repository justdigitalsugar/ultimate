<?php get_header();?>

<section role="main">
    <div class="max-w-7xl px-4 mx-auto py-20 lg:py-32">
        <div class="page-header">
            <p class="font-bold">404! This page has been moved.</p>
            <h1 class="page-title uppercase">We're sorry, the page you're looking for cannot be found!</h1>
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                <p class="text-xl">Unfortunately, the page you're looking for has been removed or moved to another
                    location. Not to worry, just use the search below and hopefully you'll find what you're looking for!
                </p>

                <div class="mt-8">
                    <p class="text-xl font-bold">Search Products:</p>
                    <?php get_search_form(); ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>