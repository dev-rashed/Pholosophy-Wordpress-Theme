<?php
get_header();
?>

<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'row format-standard' ); ?>>

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title(); ?>
            </h1>
            <ul class="s-content__header-meta">
                <li class="date"><?php echo esc_html(get_the_date()) ?></li>
                <li class="cat">
                    In
                    <?php the_category( " " ) ?>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail("large") ?>
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <?php the_content(); ?>
            <p class="s-content__tags">
                <span>Post Tags</span>

                <span class="s-content__tag-list">
                    <?php echo get_the_tag_list(); ?>
                </span>
            </p> <!-- end s-content__tags -->

            <div class="s-content__author">
                <?php echo get_avatar( get_the_author_meta( "ID" ) ) ?>

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a
                            href="<?php echo get_author_posts_url( get_the_author_meta("ID") ) ?>"><?php echo get_the_author_meta( "nicename" ) ?></a>
                    </h4>

                    <p>
                        <?php echo get_the_author_meta('description'); ?>
                    </p>

                    <ul class="s-content__author-social">
                        <?php 
                            $philosophy_author_facebook = get_field("facebok", get_the_author_meta("ID"));
                            $philosophy_author_twitter = get_field("twitter", get_the_author_meta("ID"));
                            $philosophy_author_linkedin = get_field("linkedin", get_the_author_meta("ID")); 
                        ?>
                        <?php if($philosophy_author_facebook): ?>
                        <li><a href="<?php echo esc_url($philosophy_author_facebook) ?>">Facebook</a></li>
                        <?php endif; ?>
                        <?php if($philosophy_author_twitter): ?>
                        <li><a href="<?php echo esc_url($philosophy_author_twitter) ?>">Twitter</a></li>
                        <?php endif; ?>
                        <?php if($philosophy_author_linkedin): ?>
                        <li><a href="<?php echo esc_url($philosophy_author_linkedin) ?>">Instagram</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <br>
            </div>

            <div class="s-content__pagenav">
                <div class="s-content__nav">
                    <div class="s-content__prev">
                        <a href="#0" rel="prev">
                            <span>Previous Post</span>
                            Tips on Minimalist Design
                        </a>
                    </div>
                    <div class="s-content__next">
                        <a href="#0" rel="next">
                            <span>Next Post</span>
                            Less Is More
                        </a>
                    </div>
                </div>
            </div> <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>


    <!-- comments
        ================================================== -->
    <?php if( !(post_password_required()) ) : ?>
    <?php comments_template() ?>
    <?php endif; ?>

</section> <!-- s-content -->



<?php
get_footer();