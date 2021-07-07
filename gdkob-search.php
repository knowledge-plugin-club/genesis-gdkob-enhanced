<?php

remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', '__gdkob_loop_search');

function __gdkob_loop_search() {
    do_action('genesis_before_while');

    gdkob_load_template('gdkob-search-results.php');

    do_action('genesis_after_endwhile');
}

genesis();
