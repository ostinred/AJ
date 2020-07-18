<?php
include __DIR__. "/vendor/mobile_detect.php";

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
    register_post_type('catalog_post',
        array(
            'labels' => array(
                'name' => __('Catalog post'),
                'singular_name' => __('Catalog post'),
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

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
