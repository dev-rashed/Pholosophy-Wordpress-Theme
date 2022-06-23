<article id="post-<?php the_ID(); ?>" <?php post_class( 'masonry__brick entry format-gallery' ); ?> data-aos="fade-up">
    <?php $attachments = new Attachments( 'gallery' ); ?>
    <?php if( $attachments->exist() ) : ?>
    <div class="entry__thumb slider">
        <div class="slider__slides">
            <?php while( $attachments->get() ) : ?>
            <div class="slider__slide">
                <?php echo wp_kses_post($attachments->image( 'philosophy-square-small' )); ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php get_template_part("template-parts/common/post/summary") ?>


</article> <!-- end article -->