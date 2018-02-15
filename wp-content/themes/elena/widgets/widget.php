<?php
// register sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
            'name' => 'Footer external links',
            'id' => 'footer_external_links',
            'description' => 'These widgets will be shown in the footer of the site',
            'before_widget' => '',
            'after_widget' => '',
        )
    );
}

// register widget
add_action('widgets_init', 'poly_external_link_widget');
function poly_external_link_widget()
{
    register_widget('poly_external_links');
    register_widget('poly_partners_links');
}

// add admin scripts
add_action('admin_enqueue_scripts', 'ctup_wdscript');
function ctup_wdscript()
{
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/widgets/widget.js', false, '1.0.0', true);
}


class Poly_External_Links extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'external_links',
            'External links',
            array(
                'description' => 'External links',
                'classname' => 'poly_external_links'
            )
        );
    }

    // render widget result in frontend
    function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $url = apply_filters('widget_url', $instance['url']);
        $icon = apply_filters('widget_icon', $instance['icon']);

        echo $args['before_widget'];

        echo '<a href="' . $url . '" title="' . $title . '">' . $icon . '</a>';

        echo $args['after_widget'];
    }

    // render widget in admin
    function form($instance)
    {

        $title = @ $instance['title'] ?: '';
        $url = @ $instance['url'] ?: '';
        $icon = @ $instance['icon'] ?: '';

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br/>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>">Url</label>
            <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>"
                   name="<?php echo $this->get_field_name('url'); ?>" type="text"
                   value="<?php echo esc_attr($url); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon</label><br/>

            <?php
            if ($instance['icon'] != '') :
                echo '<div style="margin:0;padding:0;width:100px;display:inline-block;">' . $instance['icon'] . '</div>';
            endif;
            ?>

            <textarea class="widefat" rows="5" name="<?php echo $this->get_field_name('icon'); ?>"
                      id="<?php echo $this->get_field_id('icon'); ?>"
                      style="margin-top:5px;"><?php echo $icon; ?></textarea>

        </p>

        <?php
    }

    // save widget data
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['icon'] = $new_instance['icon'];
        return $instance;
    }

}

class Poly_Partners_Links extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'partners_links',
            'Partners links',
            array(
                'description' => 'Partners links',
                'classname' => 'poly_partners_links'
            )
        );
    }

    // render widget result in frontend
    function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $url = apply_filters('widget_url', $instance['url']);
        $image_uri = apply_filters('widget_logo', $instance['image_uri']);

        echo $args['before_widget'];

        echo '<a href="' . $url . '" title="' . $title . '" class="partner">
        <div class="imgWrap">
        <img src="' . $image_uri . '" alt="' . $title . '">
        </div></a>';

        echo $args['after_widget'];
    }

    // render widget in admin
    function form($instance)
    {

        $title = @ $instance['title'] ?: '';
        $url = @ $instance['url'] ?: '';
        $image_uri = @ $instance['image_uri'] ?: '';

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br/>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>">Url</label>
            <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>"
                   name="<?php echo $this->get_field_name('url'); ?>" type="text"
                   value="<?php echo esc_attr($url); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">Logo</label><br/>

            <?php
            if ($instance['image_uri'] != '') :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:10px 20px;box-sizing:border-box;max-width:100%;float:left;display:inline-block;background-color:#eee;" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>"
                   style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                   name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image"
                   style="margin-top:5px;"/>
        </p>

        <?php
    }

    // save widget data
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['image_uri'] = $new_instance['image_uri'];
        return $instance;
    }

}