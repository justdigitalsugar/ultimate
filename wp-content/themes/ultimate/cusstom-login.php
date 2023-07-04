<?php
/*
Template Name: Custom Login Page
*/
?>

<?php get_header(); ?>

<div id="content" class="lg:h-screen lg:flex w-full">
    <div class="w-full lg:w-1/3 h-full bg-gray-100 flex items-center justify-center pt-44 pb-20">
        <div class="w-4/5 mx-auto lg:w-2/3">
            <div class="max-w-3xl mx-auto login-form w-full">

            <div class="text-center">
                <?php the_field('content');?>
            </div>

            <form name="loginform" id="loginform" action="<?php echo wp_login_url(); ?>" method="post">
                <p class="login-username w-full">
                    <label for="user_login"><?php _e( 'Username or Email Address', 'custom-login-form' ); ?></label>
                    <input type="text" name="log" id="user_login" class="input" value="" size="20"
                        autocapitalize="off" />
                </p>
                <div class="login-password">
                    <label for="user_pass"><?php _e( 'Password', 'custom-login-form' ); ?></label>
                    <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
                </div>
                <div class="login-submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary hover:text-black"
                        value="<?php esc_attr_e( 'Log In', 'custom-login-form' ); ?>" />
                    <input type="hidden" name="redirect_to" value="<?php echo esc_attr( home_url() ); ?>" />
                </div>
            </form>

            <p class="mt-6 text-center">Dont have an account? <span class="underline font-bold cursor-pointer" id="openLink">Click here</span></p>
        </div>
        </div>
    </div>
    <div class="w-full lg:w-2/3 h-full flex items-center justify-center relative min-h-[300px]">
     <?php $img_acf = GetACFImage( get_field( 'image' ) );

        if ( $img_acf ) : ?>
            <img class='absolute left-0 top-0 h-full w-full object-cover'
                src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                alt="<?php echo $img_acf->get_alt_text() ?>" height="700" width="1000">

            <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>