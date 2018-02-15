<?php

add_action('init', 'testimonials_post_type');
function testimonials_post_type()
{
    $labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'Отзывы',
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'view_item' => 'Просмотреть отзыв',
        'search_items' => 'Искать отзыв',
        'not_found' => 'Отзывы не найдены',
        'not_found_in_trash' => 'В корзине нет отзывов',
        'parent_item_colon' => '',
    );

    register_post_type('testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => array('title', 'editor'),
        'register_meta_box_cb' => '', // Callback function for custom metaboxes
    ));
}


add_filter('manage_edit-testimonials_columns', 'testimonials_edit_columns');
function testimonials_edit_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'testimonial' => 'Сообщение',
        'date' => 'Date'
    );

    return $columns;
}


add_action('manage_posts_custom_column', 'testimonials_columns', 10, 2);
function testimonials_columns($column, $post_id)
{
    switch ($column) {
        case 'testimonial':
            the_excerpt();
            break;
    }
}


function get_testimonial($posts_per_page = 1, $orderby = 'none')
{
    $args = array(
        'post_status' => 'publish',
        'posts_per_page' => (int)$posts_per_page,
        'post_type' => 'testimonials',
        'orderby' => $orderby,
        'no_found_rows' => true,
    );

    $query = new WP_Query($args);

    $testimonials = '<div id="owlReviews" class="reviewsCarousel owl-carousel owl-theme">';
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            $testimonials .= '<div class="item">';
            $testimonials .= '<div class="title">' . get_the_title() . '</div>';
            $testimonials .= '<div class="description">' . get_the_content() . '</div>';
            $testimonials .= '</div>';

        endwhile;
        wp_reset_postdata();
    }

    $testimonials .= '</div>';

    return $testimonials;
}


add_action('wp_ajax_nopriv_ajax-testimonial-insert', 'insert_testimonial');
add_action('wp_ajax_ajax-testimonial-insert', 'insert_testimonial');
function insert_testimonial()
{
    check_ajax_referer('elena-ajax-custom-nonce', 'nonce_code');

    parse_str($_POST['user_data'], $user_data);

    $name = $user_data['username'];
    $message = $user_data['message'];

    $args = array(
        'post_title' => wp_strip_all_tags($name),
        'post_content' => htmlspecialchars($message),
        'post_status' => 'pending',
        'post_type' => 'testimonials',
    );

    if (strlen($name) > 70 || empty($name) || empty($message)) {
        wp_send_json_error(array('msg' => 'Неправильно заполнены поля.'));
    } else {
        if (is_wp_error(wp_insert_post($args))) {
            wp_send_json_error(array('msg' => 'Произошла внутренняя ошибка. Попробуйте оставить отзыв в другой раз.'));
        } else {
            wp_send_json_success(array('msg' => 'Спасибо за ваш отзыв.'));
        }
    }

    wp_die();
}