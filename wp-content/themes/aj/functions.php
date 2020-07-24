<?php
include __DIR__ . "/vendor/mobile_detect.php";

function dbg()
{
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
}
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

}
function catalog_post_type()
{
    register_post_type('project',
        array(
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Projects',
                'add_new' => 'Add Projects',
                'add_new_item' => 'Add Projects',
                'edit_item' => 'Edit Projects',
                'new_item' => 'Projects',
                'view_item' => 'View Projects',
                'search_items' => 'Search Projects',
                'not_found' => 'No Projects found',
                'not_found_in_trash' => 'No Projects found in Trash',
                'all_items' => 'All Projects',
                'menu_name' => 'Projects',
                'name_admin_bar' => 'Projects',
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}
add_action('init', 'catalog_post_type');

function get_video_preview($post)
{
    $video = get_field('video_preview', $post->ID);
    if (empty($video)) {
        return false;
    }
    return $video['url'];
}

function my_template_part($slug, $name = null, $data = [])
{
    $templates = [];
    $name = (string) $name;

    if ('' !== $name) {
        $templates[] = "{$slug}-{$name}.php";
    }

    $templates[] = "{$slug}.php";

    $template = locate_template($templates, false);

    if (!$template) {
        return;
    }

    if ($data) {
        extract($data);
    }

    include $template;
}

function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

function get_vimeo_url($url)
{
    $regs = array();

    $id = '';

    $regs = [];
    preg_match('/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/', $url, $regs);
    $id = $regs[5];

    return "https://player.vimeo.com/video/$id?color=ec2481&title=0&byline=0&portrait=0";

}

add_filter('big_image_size_threshold', '__return_false');

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Sidebar Menu'),
        )
    );
}
add_action('init', 'register_my_menus');

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function is_about_page()
{
    return get_the_id() === 242;
}
add_theme_support('title-tag');

add_filter('pre_get_document_title', function ($title) {
    return implode(" | ", array_reverse(explode('-', $title)));
}, 999, 1);

/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug($post_link, $post)
{

    if ('project' === $post->post_type && 'publish' === $post->post_status) {
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    }

    return $post_link;
}
add_filter('post_type_link', 'gp_remove_cpt_slug', 10, 2);

function gp_add_cpt_post_names_to_main_query($query)
{

    // Bail if this is not the main query.
    if (!$query->is_main_query()) {
        return;
    }

    // Bail if this query doesn't match our very specific rewrite rule.
    if (!isset($query->query['page']) || 2 !== count($query->query)) {
        return;
    }

    // Bail if we're not querying based on the post name.
    if (empty($query->query['name'])) {
        return;
    }

    // Add CPT to the list of post types WP will include when it queries based on the post name.
    $query->set('post_type', array('post', 'page', 'project'));
}
add_action('pre_get_posts', 'gp_add_cpt_post_names_to_main_query');