<?php

//Hook Widget
add_action('widgets_init', 'darksky_widget_action');
//Register Widget
function darksky_widget_action()
{
    register_widget('darksky_widget');
}

class darksky_widget extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'Dark Sky Widget', 'description' => __('A widget show weather, utilizing Dark Sky API.', 'darksky'));
        $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'darksky_widget');
        parent::__construct('darksky_widget', __('Dark Sky Widget', 'darksky'), $widget_ops, $control_ops);
    }

    function widget($args, $instance)
    {
        global $wpdb, $blog_id;
        extract($args);
        //Save WPOptions
        $darksky_latitude = "";
        $darksky_longitude = "";
        add_option('darksky_latitude', $darksky_latitude);
        add_option('darksky_longitude', $darksky_longitude);
        $darksky_latitude = isset($instance['darksky_latitude']) ? $instance['darksky_latitude'] : false;
        $darksky_longitude = isset($instance['darksky_longitude']) ? $instance['darksky_longitude'] : false;

        //Display
        echo $before_widget;
        if (empty($darksky_latitude)) {
            $darksky_latitude = '-27.469771';
            echo '<font color="red">Please insert latitude in widget backend.</font><br>';
        }
        if (empty($darksky_longitude)) {
            $darksky_longitude = '153.025124';
            echo '<font color="red">Please insert longitude in widget backend.</font>';
        }
        echo '<iframe style="height: 400px;" src="https://maps.darksky.net/@temperature,' . $darksky_latitude . ',' . $darksky_longitude . ',6?embed=true&amp;timeControl=false&amp;fieldControl=false&amp;defaultField=temperature&amp;defaultUnits=_C" width="100%" frameborder="0"></iframe>';
        echo $after_widget;
    }

    //Update the widget
    function update($new_instance, $old_instance)
    {
        global $wpdb, $blog_id;
        $instance = $old_instance;
        $instance['darksky_latitude'] = $new_instance['darksky_latitude'];
        $instance['darksky_longitude'] = $new_instance['darksky_longitude'];
        return $instance;
    }

    function form($instance)
    {
        global $wpdb, $blog_id;
        //Set up some default widget settings.
        $defaults = array('darksky_latitude' => false, 'darksky_longitude' => false);
        $instance = wp_parse_args((array)$instance, $defaults);
        ?>
        <div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
        <h2>Dark Sky WP Options</h2>
        <p>
            <label for="<?php echo $this->get_field_id('darksky_latitude'); ?>"><?php _e('Dark Sky Latitude:'); ?></label><br>
            <input id="<?php echo $this->get_field_id('darksky_latitude'); ?>"
                   name="<?php echo $this->get_field_name('darksky_latitude'); ?>"
                   value="<?php echo $instance['darksky_latitude']; ?>" style="width:auto;"/>
        <div class="description">Example <b>-27.469771</b>. Brisbane.</div>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('darksky_longitude'); ?>"><?php _e('Dark Sky Longitude:'); ?></label><br>
            <input id="<?php echo $this->get_field_id('darksky_longitude'); ?>"
                   name="<?php echo $this->get_field_name('darksky_longitude'); ?>"
                   value="<?php echo $instance['darksky_longitude']; ?>" style="width:auto;"/>
        <div class="description">Example <b>153.025124</b>. Brisbane.</div>
        </p>
        <?php
    }
}

?>
