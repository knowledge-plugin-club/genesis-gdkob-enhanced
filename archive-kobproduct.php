<?php

remove_action('genesis_loop', 'genesis_do_loop');
remove_action('genesis_after_endwhile', 'genesis_posts_nav');

add_action('genesis_loop', '__gdkob_loop_archive');
add_action('genesis_before_loop', '__gdkob_header_archive_product');
add_action('genesis_before_while', '__gdkob_before_archive_product');

add_action('genesis_gdkob_archive_the_content', '__gdkob_archive_content_product');

function __gdkob_header_archive_product() {
    ?><header class="archive-header">
        <h1 class="archive-title">
            <?php _e("Knowledge Base Products Archives"); ?>
        </h1>
    </header><?php
}

function __gdkob_before_archive_product() {
    gdkob_load_template('gdkob-current-term.php');

    gdkob_load_template('gdkob-list-groups.php');
}

function __gdkob_archive_content_product() {
    gdkob_load_template('gdkob-product-archive.php');
}

genesis();
