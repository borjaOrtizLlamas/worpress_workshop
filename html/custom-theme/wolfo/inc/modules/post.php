<?php
//Post thumbnail
if ( ! function_exists( 'wolfo_post_thumbnail' ) ) {
    function wolfo_post_thumbnail( $size ) {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        global $post;

        echo '<div class="post-image">';
        echo '<a href="' . esc_url( get_the_permalink( $post->ID ) ) . '">';
        echo get_the_post_thumbnail( $post->ID, $size );
        echo '</a>';
        echo '</div>';
    }
}

//== remove posts auto tag <p>
if ( ! function_exists( 'remove_auto_p_tinymce' ) ) {
    function remove_auto_p_tinymce( $in ) {
        $in['forced_root_block'] = "";
        $in['force_p_newlines']  = true;

        return $in;
    }

    add_filter( 'tiny_mce_before_init', 'remove_auto_p_tinymce' );
}

//== Get Post Meta Date
if ( ! function_exists( 'wolfo_post_single_date' ) ) {
    function wolfo_post_single_date() {
        echo '<div class="post-meta-date-single">';
        echo '<i class="la la-calendar-check-o"></i>';
        echo '<p>' . esc_html( get_the_date( 'd F, Y' ) );
        echo '</p></div>';
    }
}

//== Get Post Meta Categories
if ( ! function_exists( 'wolfo_post_categories' ) ) {
    function wolfo_post_categories() {
        $post_cate_layout = 'boxed';

        global $post;
        $categories = get_the_category( $post->ID );
        if ( ! $categories ) {
            return;
        }

        $html   = array();
        $html[] = '<div class="post-meta-categories middle ' . $post_cate_layout . '">';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $category_link = get_tag_link( $category->term_id );
                $html[]        = '<a href="' . esc_url( $category_link ) . '">' . esc_html( $category->name ) . '</a>';
            }
        }
        $html[] = '</div>';

        return implode( "\n", $html );
    }
}

//== [ Archive ]
if ( ! function_exists( 'wolfo_post_date_meta' ) ) {
    function wolfo_post_date_meta() {
        echo '<div class="post-meta-date">';
        echo '<p>' . esc_html( get_the_date( 'dS' ) );
        echo '<span>' . esc_html( get_the_date( 'F' ) ) . '</span>';
        echo '</p></div>';
    }
}

//== [ Content Box Title ]
if ( ! function_exists( 'wolfo_post_content_title' ) ) {
    function wolfo_post_content_title( $typo ) {
        $enable_post_categories  = false;
        $blog_enable_white_color = false;
        $white_color             = ( $blog_enable_white_color ) ? 'white-color' : '';

        $class = array(
            'entry-title',
            $enable_post_categories ? 'mt-0' : '',
            $white_color,
        );

        $class = array_filter( $class );

        if ( ! empty( get_the_title() ) ) :
            echo '<' . $typo . ' class="' . implode( ' ', $class ) . '">'; ?>

            <a title="<?php the_title_attribute(); ?>"
               href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>

            <?php
            echo '</' . $typo . '>';
        endif;
    }
}

//== [ Content Box Excerpt ]
if ( ! function_exists( 'wolfo_post_content_excerpt' ) ) {
    function wolfo_post_content_excerpt( $number_excerpt ) {
        global $post;
        $enable_post_excerpt = true;
        $excerpt             = ( has_excerpt() ) ? $post->post_excerpt : $post->post_content;
        $excerpt             = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', $excerpt );
        $excerpt             = strip_shortcodes( $excerpt );

        if ( ! $enable_post_excerpt ) {
            return;
        }

        $html   = array();
        $html[] = '<div class="post-excerpt">';
        $html[] = '<p>' . wp_trim_words( $excerpt, $number_excerpt ) . '</p>';
        $html[] = '</div>';

        echo implode( "\n", $html );
    }
}

if ( ! function_exists( 'wolfo_first_post_content_excerpt' ) ) {
    function wolfo_first_post_content_excerpt( $number_excerpt ) {
        global $post;
        $enable_first_post_excerpt = wolfo_get_customize_option( 'blog_first_enable_excerpt', true );
        $excerpt                   = ( has_excerpt() ) ? $post->post_excerpt : $post->post_content;
        $excerpt                   = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', $excerpt );
        $excerpt                   = strip_shortcodes( $excerpt );

        if ( ! $enable_first_post_excerpt ) {
            return;
        }

        $html   = array();
        $html[] = '<div class="post-excerpt">';
        $html[] = '<p>' . wp_trim_words( $excerpt, $number_excerpt ) . '</p>';
        $html[] = '</div>';

        echo implode( "\n", $html );
    }
}

//== [ Single Post Excerpt ]
if ( ! function_exists( 'wolfo_post_single_excerpt' ) ) {
    function wolfo_post_single_excerpt() {
        global $post;
        if ( has_excerpt() ) {
            echo '<div class="entry-excerpt">';
            echo esc_attr( $post->post_excerpt );
            echo '</div>';
        }
    }
}

//== [ Single Post Content ]
if ( ! function_exists( 'wolfo_post_single_content' ) ) {
    function wolfo_post_single_content() {
        echo '<div class="entry-content clearfix">';
        if ( ! empty( get_the_content() ) ) {
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wolfo' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span class="page-link">',
                'link_after'  => '</span>',
            ) );
        }
        wolfo_meta_tags_socials();
        echo '</div>';
    }
}

//== [ Single Post Navigation ]
if ( ! function_exists( 'wolfo_post_single_navigation' ) ) {
    function wolfo_post_single_navigation() {
        global $post;
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        $check_nav = array();
        $html      = array();

        if ( ! empty( $prev_post ) && ! empty( $next_post ) ) {
            array_push( $check_nav, 'col-12', 'col-sm-6' );
        }

        if ( ! empty( $prev_post ) || ! empty( $next_post ) ) {
            $html[] = '<div class="single-post-navigation">';
            if ( ! empty( $prev_post ) && ! empty( $next_post ) ) {
                $html[] = '<div class="row">';
            }
            if ( ! empty( $prev_post ) ) {
                $html[] = '<div class="entry-navi-post prev-post text-left ' . join( ' ', $check_nav ) . '">';
                $html[] = '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '">';
                $html[] = '<span class="entry-intro">';
                $html[] = '<i class="bx bx-undo entry-icon middle"></i>';
                $html[] = '<span class="middle">' . esc_html__( 'Previous Post', 'wolfo' ) . '</span>';
                $html[] = '</span>';
                $html[] = '<h6 class="entry-text mt-0">' . esc_attr( $prev_post->post_title ) . '</h6>';
                $html[] = '</a>';
                $html[] = '</div>';
            }
            if ( ! empty( $next_post ) ) {
                $html[] = '<div class="entry-navi-post next-post text-right ' . join( ' ', $check_nav ) . '">';
                $html[] = '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '">';
                $html[] = '<span class="entry-intro">';
                $html[] = '<span class="middle">' . esc_html__( 'Next Post', 'wolfo' ) . '</span>';
                $html[] = '<i class="bx bx-redo entry-icon middle"></i>';
                $html[] = '</span>';
                $html[] = '<h6 class="entry-text mt-0">' . esc_attr( $next_post->post_title ) . '</h6>';
                $html[] = '</a>';
                $html[] = '</div>';
            }
            if ( ! empty( $prev_post ) && ! empty( $next_post ) ) {
                $html[] = '</div>';  // end row
            }
            $html[] = '</div>'; // single-post-navigation
        }

        echo implode( "\n", $html );
    }
}

//== [ Single Post Author Info ]
if ( ! function_exists( 'wolfo_post_single_author' ) ) {
    function wolfo_post_single_author() {

        $html   = array();
        $html[] = '<div class="single-post-author author-info clearfix">';
        $html[] = '<div class="author-info-avatar">';
        $html[] = get_avatar( get_the_author_meta( 'ID' ), 70 );
        $html[] = '</div>';
        $html[] = '<div class="author-info-content">';
        $html[] = '<h5 class="entry-title mt-0">' . get_the_author_posts_link() . '</h5>';
        $html[] = '<p class="entry-bio">' . get_the_author_meta( 'description' ) . '</p>';
        $html[] = '<div class="wolfo-button btn-link size-small btn-effect-1 author-post-all">';
        $html[] = '<a href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '"><span>' . esc_html__( 'View All Posts', 'wolfo' ) . '</span></a>';
        $html[] = '</div></div></div>';

        echo implode( "\n", $html );
    }
}

//== [ Single Post Comment Template ]
if ( ! function_exists( 'wolfo_post_single_comment' ) ) {
    function wolfo_post_single_comment() {
        if ( ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
            comments_template();
        }
    }
}

//== [ Single Post Number Comment ]
if ( ! function_exists( 'wolfo_post_number_comment' ) ) {
    function wolfo_post_number_comment() {
        echo '<div class="post-meta-comment middle">';
        comments_popup_link( wp_kses_post( esc_html__( '0 comment', 'wolfo' ) ), wp_kses_post( esc_html__( '1 comment', 'wolfo' ) ), wp_kses_post( esc_html__( '% comments', 'wolfo' ) ), '', '' );
        echo '</div>';
    }
}

//== [ General Meta Date + Author + Comment use page archive + post ]
if ( ! function_exists( 'wolfo_meta_date_author' ) ) {
    function wolfo_meta_date_author() {
        $enable_post_date   = true;
        $enable_post_author = true;

        if ( ! $enable_post_date && ! $enable_post_author ) {
            return;
        }
        $html = array();

        $html[] = '<div class="post-date-author">';
        if ( $enable_post_author ) {
            $html[] = '<div class="post-author">' . get_the_author_posts_link() . '</div>';
        }

        if ( $enable_post_date && $enable_post_author ) {
            $html[] = '<span>' . esc_html__('&#45;', 'wolfo') . '</span>';
        }

        if ( $enable_post_date ) {
            $html[] = '<div class="post-meta-date"><p>' . get_the_date( ' j, Y' ) . '</p></div>';
        }

        $html[] = '</div>';

        return implode( "\n", $html );
    }
}

//== [ Single Post Meta Tags + Socials ]
if ( ! function_exists( 'wolfo_meta_tags_socials' ) ) {
    function wolfo_meta_tags_socials() {
        $post_enable_socials = true;
        $post_enable_tags    = true;

        if ( ! $post_enable_socials && ! $post_enable_tags ) {
            return;
        }

        global $post;

        echo '<div class="post-meta">';
        if ( $post_enable_tags && has_tag() ) {
            echo '<div class="post-meta-tags">';
            $tags = get_the_tags( $post->ID );
            echo '<div class="entry-tags">';
            if ( ! empty( $tags ) ) {
                foreach ( $tags as $tag ) {
                    $tag_link = get_tag_link( $tag->term_id );
                    echo '<a href="' . esc_url( $tag_link ) . '">' . esc_html( $tag->name ) . '</a>';
                }
            }
            echo '</div></div>';
        }
        if ( $post_enable_socials && function_exists( 'wolfo_single_blog_share_social' ) ) {
            echo '<div class="post-meta-socials clearfix"><div class="entry-share">';
            do_action( 'wolfo_single_blog_share_button' );
            echo '</div></div>';
        }
        echo '</div>';
    }
}

//== [ Single Post Render Comments ]
if ( ! function_exists( 'wolfo_render_comments' ) ) {
    function wolfo_render_comments( $comment, $args, $depth ) {
        wolfo_get_template( 'single/comment', array( 'comment' => $comment, 'args' => $args, 'depth' => $depth ) );
    }
}

//== [ Single Post Related ]
if ( ! function_exists( 'wolfo_post_single_related' ) ) {
    function wolfo_post_single_related() {
        global $post;

        $post_id        = $post->ID;
        $post_terms     = wp_get_post_terms( $post_id, 'category' );
        $related_column = (float) wolfo_get_customize_option( 'single_post_related_column', '3' );

        $args = array(
            'posts_per_page'      => 8,
            'post__not_in'        => array( $post_id ),
            'ignore_sticky_posts' => 1,
            'tax_query'           => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array( 'post-format-quote', 'post-format-link' ),
                    'operator' => 'NOT IN'
                )
            )
        );

        if ( isset( $attachment_ids, $attachment_ids[0] ) ) {
            $t_id        = $post_terms[0]->term_id;
            $args['cat'] = $t_id;
        };

        $slick_attributes     = array(
            '"dots": false',
            '"arrows": false',
            '"adaptiveHeight": false',
            '"slidesToShow": ' . $related_column,
            '"slidesToScroll": 1',
            '"autoplay": false',
            '"autoplaySpeed": 5000',
            '"responsive": [{ "breakpoint": 1200, "settings": {"slidesToShow": 3} },{ "breakpoint": 992, "settings": {"slidesToShow": 3} },{ "breakpoint": 768, "settings": {"slidesToShow": 2} },{ "breakpoint": 576, "settings": {"slidesToShow": 1} } ]',
        );
        $wrapper_attributes[] = "data-slick='{" . implode( ', ', $slick_attributes ) . "}'";

        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) { ?>
            <div id="single-post-related" class="single-post-related">
                <h2 class="heading-title text-center mt-0 col-12"><?php echo esc_html__( 'You May Also Like...', 'wolfo' ); ?></h2>
                <div class="wolfo-blogs wolfo-slick wolfo-slick-position" <?php echo implode( ' ', $wrapper_attributes ); ?>>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <?php
                        global $post;
                        $post_id   = $post->ID;
                        $thumb_url = 'background-color: #f9f9f9';
                        if ( has_post_thumbnail() ) {
                            $thumb_url = 'background-image: url("' . get_the_post_thumbnail_url( $post_id, 'full' ) . '")';
                        };
                        ?>
                        <article class="column">
                            <a <?php post_class(); ?> style="<?php echo esc_attr( $thumb_url ); ?>"
                                                      href="<?php echo esc_url(get_permalink( $post_id )); ?>"></a>
                            <div class="post-content">
                                <?php echo wolfo_meta_date_author(); ?>
                                <div class="post-content-wrapper">
                                    <h4 class="entry-title mt-0">
                                        <a title="<?php echo esc_attr(get_the_title()); ?>"
                                           href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        <?php }
    }
}

//== [ Archive List Category ]
if ( ! function_exists( 'wolfo_post_archive_list_category' ) ) {
    function wolfo_post_archive_list_category() {
        $enable_categories = wolfo_get_customize_option( 'blog_enable_categories_list', false );
        $categories_type   = wolfo_get_customize_option( 'blog_categories_type', 'bg-image' );
        $column            = wolfo_get_customize_option( 'blog_categories_column', '6' );
        $cssID             = 'blog-categories-list';
        $i                 = 1;
        $html              = array();

        $args = array(
            'taxonomy' => 'category',
            'parent'   => 0,
        );

        $categories = get_terms( $args );

        if ( ! $categories || ! $enable_categories ) {
            return;
        }

        $class     = array(
            'categories-list-wrapper',
            'layout-' . $categories_type,
            ( $categories_type == 'bg-image' ) ? 'wolfo-slider-inset wolfo-hide-navi' : '',
        );
        $col_class = ( $categories_type == 'bg-image' ) ? 'col-12' : '';

        $slick_attributes   = array(
            '"dots": false',
            '"adaptiveHeight": false',
            '"slidesToShow": ' . $column,
            '"slidesToScroll": 1',
            '"infinite": true',
            '"lazyLoad": "progressive"',
            '"prevArrow": "#' . $cssID . ' .arrow-left"',
            '"nextArrow": "#' . $cssID . ' .arrow-right"',
            '"responsive": [{ "breakpoint": 1200, "settings": {"slidesToShow": 5} },{ "breakpoint": 1025, "settings": {"slidesToShow": 4} },{ "breakpoint": 992, "settings": {"slidesToShow": 3} },{ "breakpoint": 768, "settings": {"slidesToShow": 2} },{ "breakpoint": 576, "settings": {"slidesToShow": 1} } ]',
        );
        $wrapper_attributes = array( "data-slick='{" . implode( ', ', $slick_attributes ) . "}'" );

        if ( ! empty( $categories ) ) :
            $html[] = '<div id="' . $cssID . '" class="' . implode( ' ', $class ) . '">';

            if ( $categories_type == 'bg-image' ) {
                $html[] = '<div class="wolfo-content-container">'; //== [ Container + Slider ]
                $html[] = '<div class="row wolfo-slick" ' . implode( ' ', $wrapper_attributes ) . '>'; //== [ Row + Slider ]
            } else {
                $html[] = '<div class="container">'; //== [ Container ]
                $html[] = '<div class="row">'; //== [ Row ]
            }

            foreach ( $categories as $category ) :
                $categoryID    = $category->term_id;
                $term_meta     = get_term_meta( $categoryID, '_category_options', true );
                $category_link = get_tag_link( $category->term_id );
                $image         = $term_meta['thumbnail'];
                $image_class   = $image ? ' has-image' : '';

                if ( $categories_type == 'bg-image' ) {
                    $html[] = '<div class="column ' . $col_class . '">';
                }

                $html[] = '<div class="categories-item' . $image_class . '">';
                $html[] = '<a href="' . esc_url( $category_link ) . '">';
                if ( ! empty( $image ) && $categories_type == 'bg-image' ) {
                    $html[] = wp_get_attachment_image( $image, 'full' );
                }
                $html[] = '<span class="name">' . esc_attr( $category->name ) . '<small>' . $category->count . '</small></span></a>';
                $html[] = '</div>';

                if ( $categories_type == 'bg-image' ) {
                    $html[] = '</div>';
                }
                $i ++;
            endforeach;

            $html[] = '</div>'; //== [ End Row ]
            $html[] = '</div>'; //== [ End Container ]

            if ( $categories_type == 'bg-image' && ( $i > $column ) ) {
                $html[] = wolfo_arrow_slider();
            }

            $html[] = '</div>';
        endif;
        echo implode( "\n", $html );
    }
}

if ( ! function_exists( 'wolfo_post_single_info' ) ) {
    function wolfo_post_single_info( $layout ) {
        global $post;

        $post_id                = $post->ID;
        $enable_title           = true;
        $enable_post_categories = true;
        $enable_post_date       = true;
        $enable_post_author     = true;
        $thumb_url              = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( $post_id, 'full' ) : '';
        $typo                   = $enable_title ? 'h2' : 'h1';

        if ( $layout == 'parallax' ) {
            $col_class = ' col-12';
        } elseif ( $layout == 'bottom-title' ) {
            $col_class = ' col-12 col-lg-12';
        } else {
            $col_class = '';
        }

        echo '<div class="single-post-info ' . $layout . '">';
        if ( $layout == 'parallax' ) {
            echo '<div class="single-post-image" style="background-image: url(' . esc_url( $thumb_url ) . ');"></div>';
            echo '<div class="container">';
            echo '<div class="row">';
        }
        if ( $layout == 'bottom-title' && has_post_thumbnail() ) {
            echo '<div class="single-post-image">' . get_the_post_thumbnail( $post_id, 'large' ) . '</div>';
        }
        echo '<div class="inner-content-info' . esc_attr( $col_class ) . '">';

        if ( $enable_post_categories ) {
            echo wolfo_post_categories();
        }
        echo '<div class="entry-post-title"><' . $typo . ' class="entry-title mt-0 mb-0">' . get_the_title( $post_id ) . '</' . $typo . '></div>';
        echo '<div class="post-meta post-meta-entry clearfix">';
        echo wolfo_meta_date_author();

        if ( comments_open() || get_comments_number() ) {
            if ( $enable_post_date || $enable_post_author ) {
                echo '<span>&#45;</span>';
            }
            wolfo_post_number_comment();
        }

        echo '</div>';
        echo '</div>';

        if ( $layout != 'parallax' && $layout != 'bottom-title' && has_post_thumbnail() ) {
            echo '<div class="single-post-image">' . get_the_post_thumbnail( $post_id, 'large' ) . '</div>';
        }
        if ( $layout == 'parallax' ) {
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
}