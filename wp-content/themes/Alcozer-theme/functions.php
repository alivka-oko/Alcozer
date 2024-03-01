<?php

add_action('wp_enqueue_scripts', 'add_styles');

add_action('wp_enqueue_scripts', 'add_scripts');

add_action('customize_register', 'custom_theme_img_settings');

add_action('after_setup_theme', 'add_features');

add_action('after_setup_theme', 'add_menu');

function emptytextarea()
{
    wp_enqueue_script('empty-textarea', get_template_directory_uri() . '/empty-textarea.js', array(), '1');
}
add_action('wp_enqueue_scripts', 'emptytextarea');

function add_styles()
{
    // Стили
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_style('lineicons', get_template_directory_uri() . '/assets/css/lineicons.css', array(), '1.0');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');
}

function add_scripts()
{

    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, 'footer');

    wp_enqueue_style('bootstrap', get_stylesheet_uri());

    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/sсript-new.js', array('jquery'), null, 'footer');

    wp_enqueue_style('main', get_stylesheet_uri());

}
// __________________ДОБАВЛЕНИЕ ИЗОБРАЖЕНИЙ НА САМ САЙТ___________________
function custom_theme_img_settings($wp_customize)
{
    $wp_customize->add_setting('header_logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_logo',
            array(
                'label' => __('Светлый логотип', 'alcozer-theme'),
                'section' => 'title_tagline',
                'settings' => 'header_logo',
            )
        )
    );

    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo',
            array(
                'label' => __('Темный логотип', 'alcozer-theme'),
                'section' => 'title_tagline',
                'settings' => 'footer_logo',
            )
        )
    );

    $wp_customize->add_setting('header_shape');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_shape',
            array(
                'label' => __('Элемент на главной', 'alcozer-theme'),
                'section' => 'title_tagline',
                'settings' => 'header_shape',
            )
        )
    );
}



// __________________РАЗМЕР И ДОБАВЛЕНИЕ ФОТО КАРТОЧЕК___________________
function add_features()
{
    add_theme_support('post-thumbnails', array('post'));
}

// Удалить заданную высоту и ширину
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);

function remove_thumbnail_dimensions($html, $post_id, $post_image_id)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
// __________________МЕНЮ___________________
function add_menu()
{
    register_nav_menu('top', 'Главное меню сайта');
    register_nav_menu('bottom_catalog', 'Меню в подвале: Каталог');
    register_nav_menu('bottom_clients', 'Меню в подвале: Клиентам');
    register_nav_menu('politics', 'Политика кофиденциальности');
}
// добавление классов для меню
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// __________________ПОДМЕНЮ___________________
function customize_menu_item($items, $args)
{
    if ($args->theme_location == 'top') {
        foreach ($items as &$item) {
            // Проверяем, является ли текущий элемент пунктом, у которого есть подменю
            if (in_array('menu-item-has-children', $item->classes)) {
                // Добавляем div и иконку для элемента с подменю
                $item->title .= '<div class="sub-nav-toggler"><span><i class="lni lni-chevron-down"></i></span></div>';

            }
        }
    }

    return $items;
}

add_filter('wp_nav_menu_objects', 'customize_menu_item', 10, 2);

// ________убираем лишне теги в CF7_____________
add_filter('wpcf7_autop_or_not', '__return_false');



