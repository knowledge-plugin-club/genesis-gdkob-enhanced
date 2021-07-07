<?php

remove_action('genesis_loop', 'genesis_do_loop');
remove_action('genesis_after_endwhile', 'genesis_posts_nav');

add_action('genesis_loop', '__gdkob_loop_archive');
add_action('genesis_before_loop', '__gdkob_header_archive_categories');
add_action('genesis_before_while', '__gdkob_before_archive_categories');

add_action('genesis_gdkob_archive_the_content', '__gdkob_archive_content_categories');

function __gdkob_header_archive_categories() {
    ?><header class="archive-header">
        <h1 class="archive-title">
            <?php _e("Knowledge Base Category Archives"); ?>
        </h1>
    </header><?php
}

function __gdkob_before_archive_categories() {
    gdkob_load_template('gdkob-current-term.php');

    gdkob_load_template('gdkob-list-categories.php');
}

function __gdkob_archive_content_categories() {
    $post_type = get_post_type();

    if ($post_type == gdkob()->posttype_article()) {
        gdkob_load_template('gdkob-article-archive.php');
    } else if ($post_type == gdkob()->posttype_faq()) {
        gdkob_load_template('gdkob-faq-archive.php');
    } else if ($post_type == gdkob()->posttype_reference()) {
        gdkob_load_template('gdkob-reference-archive.php');
    } else if ($post_type == gdkob()->posttype_user_guide()) {
        gdkob_load_template('gdkob-user_guide-archive.php');
    }
}

genesis();
