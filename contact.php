<?php

/**
 * Template Name: Contac us page
 */
get_header();
?>


<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php single_post_title() ?>
            </h1>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <?php 
            if( is_active_sidebar( 'contact-map' ) ) {
                dynamic_sidebar( 'contact-map' );
            } ?>
        </div> <!-- end s-content__media -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail( 'large' ) ?>
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <?php the_content() ?>

            <div class="row block-1-2 block-tab-full">
                <?php 
                if( is_active_sidebar( 'contact-widgets' ) ) {
                    dynamic_sidebar('contact-widgets'); 
                }
                ?>
            </div>

            <h3><?php _e('Say Hello.', 'philosophy') ?></h3>

            <?php 
            $pholosophy_contact_form = get_field('conctact_form');
            if( $pholosophy_contact_form ) {
                echo do_shortcode($pholosophy_contact_form);
            }
            ?>
        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->



<?php
get_footer();