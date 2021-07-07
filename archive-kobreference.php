<?php

remove_action('genesis_loop', 'genesis_do_loop');
remove_action('genesis_after_endwhile', 'genesis_posts_nav');

add_action('genesis_loop', '__gdkob_loop_archive');
add_action('genesis_before_loop', '__gdkob_header_archive_reference');
add_action('genesis_before_while', '__gdkob_before_archive_reference');

add_action('genesis_gdkob_archive_the_content', '__gdkob_archive_content_reference');

function __gdkob_header_archive_reference() {
    ?><header class="archive-header">
        <h1 class="archive-title">
            <?php _e("Knowledge Base Reference Archives"); ?>
        </h1>
    </header><?php
}

function __gdkob_before_archive_reference() {
    gdkob_load_template('gdkob-current-term.php');

    gdkob_load_template('gdkob-list-topics.php');
}

function __gdkob_archive_content_reference() {
    gdkob_load_template('gdkob-reference-archive.php');
}

genesis();
