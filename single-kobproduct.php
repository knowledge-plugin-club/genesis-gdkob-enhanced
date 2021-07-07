<?php

remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', '__gdkob_loop_single');
add_action('genesis_gdkob_the_content', '__gdkob_the_content_article');

function __gdkob_the_content_article() {
    if (gdkob_query()->sub_type != '') {
        echo '<div class="gdkob-entry-wrapper gdkob-resource-archive">';

        gdkob_load_template('gdkob-product-resources.php');

        echo '</div>';

        remove_action('genesis_after_post', 'genesis_get_comments_template');
        remove_action('genesis_after_entry', 'genesis_get_comments_template');
    } else {
        echo '<div class="gdkob-entry-wrapper">';

        gdkob_load_template('gdkob-product-single.php');

        echo '</div>';
    }
}

genesis();
