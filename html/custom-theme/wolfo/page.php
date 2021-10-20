<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

get_header();

global $post;
?>
<div class="wolfo-page wolfo-tmp">
	<div class="wolfo-inner">
		<div class="wolfo-content">
			<div class="container">
				<?php
				while (have_posts()) {
					the_post();
					the_content();

					wp_link_pages(
						array(
							'before' 		=> '<nav class="wolfo-page-break wolfo-pagination">',
							'after'  		=> '</nav>',
							'link_before'	=> '<span class="current">',
							'link_after'	=> '</span>',
						)
					);

					do_action('wolfo_page_end');

                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();
