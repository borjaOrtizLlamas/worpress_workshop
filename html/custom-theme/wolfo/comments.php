<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

if ( post_password_required() ) {
    return;
}

global $post;
?>
<div class="single-post-comment">
    <div id="comments" class="comments-area clearfix">
        <?php if ( have_comments() ) : ?>
            <h4 class="comment-title mt-0"><?php comments_number( esc_html__( 'No thought', 'wolfo' ), esc_html__( 'One thought ', 'wolfo' ), esc_html__( '% thoughts ', 'wolfo' ) ) ?><?php echo esc_html__( 'on ', 'wolfo' ); ?>
                '<?php the_title(); ?>'</h4>
            <div class="comment-content clearfix">
                <ol class="comment-list list-style-type clearfix">
                    <?php wp_list_comments( array(
                        'style'       => 'ol',
                        'avatar_size' => 60,
                        'short_ping'  => true,
                    ) ); ?>
                </ol>
                <!-- .comment-list -->
                <?php if ( get_comment_pages_count() > 1 ): ?>
                    <nav class="comment-navigation text-right clearfix mg-top-20" role="navigation">
                        <?php $paginate_comments_args = array(
                            'prev_text' => '<i class="bx bx-left-arrow-alt" ></i>',
                            'next_text' => '<i class="bx bx-right-arrow-alt"></i>'
                        );
                        paginate_comments_links( $paginate_comments_args );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php
        // Comment Form
        $args = array(
            'fields'              => apply_filters(
                'comment_form_default_fields', array(
                    'author' => '<div class="form-row"><p class="comment-form-author col-12 col-sm-4">' . '<label for="author">' . esc_html__( 'Your Name ', 'wolfo' ) . '</label><input id="author" class="input-text" name="author" type="text" value="' .
                        esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" required/></p>',
                    'email'  => '<p class="comment-form-email col-12 col-sm-4">' . '<label for="email">' . esc_html__( 'Your Email ', 'wolfo' ) . '</label><input id="email" class="input-text" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
                        '" size="30" maxlength="100" aria-describedby="email-notes" required/></p>',
                    'url'    => '<p class="comment-form-url col-12 col-sm-4">' .
                        '<label for="url">' . esc_html__( 'Your Website', 'wolfo' ) . '</label><input id="url" class="input-text" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p></div>'
                )
            ),
            'comment_field'       => '<div class="form-row form-area"><p class="comment-form-comment col-12"><label for="comment">' . esc_html__( 'Leave a reply', 'wolfo' ) . '</label><textarea id="comment" class="input-text" name="comment" cols="45" rows="5" aria-required="true"></textarea></p></div>',
            'comment_notes_after' => '',
            'class_submit'        => 'btn-comment-submit',
            'label_submit'        => esc_html__( 'Post Comment', 'wolfo' ),
            'submit_button'       => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">' . esc_attr( '%4$s' ) . '</button>',
        );

        comment_form( $args );
        ?>
    </div>
</div>
