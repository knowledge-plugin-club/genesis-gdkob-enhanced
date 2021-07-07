<?php 

include_once(get_template_directory().'/lib/init.php');

define('CHILD_THEME_NAME', 'Genesis GDKOB, Basic');
define('CHILD_THEME_URL', 'https://plugins.dev4press.com/gd-knowledge-base/' );
define('CHILD_THEME_VERSION', '3.0.1' );

add_theme_support('html5');
add_theme_support('genesis-accessibility');
add_theme_support('genesis-responsive-viewport');

add_action('wp_enqueue_scripts', 'genesis_gdkob_theme_scripts');
function genesis_gdkob_theme_scripts() {
    wp_enqueue_style('genesis-parent-css', get_template_directory_uri().'/style.css');
}

function __gdkob_loop_archive() {
    if (have_posts()) :
        do_action('genesis_before_while');

        while (have_posts()) : the_post();
            do_action('genesis_before_entry');

            do_action('genesis_gdkob_archive_the_content');

            do_action('genesis_after_entry');
        endwhile;

        gdkob_the_posts_pagination();

        do_action('genesis_after_endwhile');

    else :
        gdkob_load_template('gdkob-content-none.php');
    endif;
}

function __gdkob_loop_single() {
    do_action('genesis_before_while');

    while (have_posts()) : 
        the_post();

        do_action('genesis_before_entry');

        genesis_markup(array(
            'open' => '<article %s>',
            'context' => 'entry',
        ));

        do_action('genesis_before_entry_content');

        do_action('genesis_gdkob_the_content');

        do_action('genesis_after_entry_content');

        genesis_markup(array(
            'close' => '</article>',
            'context' => 'entry',
        ));

        do_action( 'genesis_after_entry' );

    endwhile;

    do_action('genesis_after_endwhile');
}
