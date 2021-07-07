<?php

remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', '__gdkob_loop_single');
add_action('genesis_gdkob_the_content', '__gdkob_the_content_article');

function __gdkob_the_content_article() {
    gdkob_load_template('gdkob-reference-single.php');
}

genesis();
