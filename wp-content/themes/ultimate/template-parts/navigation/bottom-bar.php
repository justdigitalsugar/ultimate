<div class="bg-secondary mt-2 max-w-xl mx-auto rounded-full py-1" id="user-banner">
    <p class="text-xs lg:text-sm m-0 text-center">
        <?php if (is_user_logged_in()) : ?>
            <?php $current_user = wp_get_current_user(); ?>
            Hi <?php echo $current_user->user_firstname; ?>, you are logged in. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="underline">Logout</a>
       <?php else: ?>
            Create a <span class="underline font-medium cursor-pointer" id="bannerLogin">free account</span> to apply for jobs. or login <a href="<?php echo get_site_url(); ?>/login/"
                class="text-black underline">here</a>
        <?php endif;
        ?>
    </p>
</div>