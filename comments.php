<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2"><?php
            $philosophy_comments_count = get_comments_number();
            if( $philosophy_comments_count <= 1 ) {
                echo esc_html($philosophy_comments_count) . ' Comment';
            } else {
                echo esc_html($philosophy_comments_count) . " Comments";
            }
            
            ?></h3>

            <!-- commentlist -->
            <ol class="commentlist">

                <?php wp_list_comments() ?>

            </ol> <!-- end commentlist -->

            <div class="comments-pagination">
                <?php
                    the_comments_pagination(array(
                        'Screen_reader_text' => __("Pagination", "philosophy"),
                        'prev_text'         => '<' . __( 'Previous Comments', 'philosophy' ),
                        'next_text'         => '>' . __( 'Next Comments', 'philosophy' )
                    ))
                ?>
            </div>

            <!-- respond
    ================================================== -->
            <div class="respond">

                <h3 class="h2"><?php _e( 'Add Comment' , 'philosophy' ) ?></h3>

                <?php comment_form() ?>
                <!-- <form name="contactForm" id="contactForm" method="post" action="">
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" type="text" id="cName" class="full-width" placeholder="Your Name"
                                value="">
                        </div>

                        <div class="form-field">
                            <input name="cEmail" type="text" id="cEmail" class="full-width" placeholder="Your Email"
                                value="">
                        </div>

                        <div class="form-field">
                            <input name="cWebsite" type="text" id="cWebsite" class="full-width" placeholder="Website"
                                value="">
                        </div>

                        <div class="message form-field">
                            <textarea name="cMessage" id="cMessage" class="full-width"
                                placeholder="Your Message"></textarea>
                        </div>

                        <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>

                    </fieldset>
                </form>  -->

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->