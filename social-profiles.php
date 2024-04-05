<?php
/*
Plugin Name: Social Profiles
Description: This plugin will register a social profile in widget area
Author: Muhammad Qurban
Author URL: http://example.com/
Version: 1.0
*/

if (!defined('ABSPATH')) {
    exit;
}


function sps()
{
    wp_enqueue_style('social-styling', plugins_url('/social-profiles/style.css'));
    wp_enqueue_script('social-js', plugins_url('/social-profiles/main.js'));
}

add_action('wp_enqueue_scripts', 'sps');









class social_profiles extends WP_Widget
{


    function __construct()
    {
        parent::__construct(
            'social_profiles', // Base ID
            esc_html__('Social Profiles', 'S_L'), // Name
            array('description' => esc_html__('This widget will show social profiles icons linked with your pages', 'S_L'),)
        );
    }


    public function widget($args, $instance)
    {
        $fb_link = !empty($instance['fb_link']) ? $instance['fb_link'] : 'wwww.facebook.com/facebook';
        $fb_icon = !empty($instance['fb_icon']) ? $instance['fb_icon'] : plugins_url('/social-profiles/img/facebook.png');

        $insta_link = !empty($instance['insta_link']) ? $instance['insta_link'] : 'wwww.instagram.com/instagram';
        $insta_icon = !empty($instance['insta_icon']) ? $instance['insta_icon'] : plugins_url('/social-profiles/img/instagram.png');


        $linkedin_link = !empty($instance['linkedin_link']) ? $instance['linkedin_link'] : 'wwww.linkedin.com/linkedin';
        $linkedin_icon = !empty($instance['linkedin_icon']) ? $instance['linkedin_icon'] : plugins_url('/social-profiles/img/linkedin.png');


        echo $args['before_widget'];
        echo '<h3> Social Profiles </h3>';
?>

        <div class="social-profiles">
            <a href="<?php echo $fb_link; ?>"><img src="<?php echo $fb_icon;  ?>" alt="" /></a>
            <a href="<?php echo $insta_link; ?>"><img src="<?php echo $insta_icon;  ?>" alt="" /></a>
            <a href="<?php echo $linkedin_link; ?>"><img src="<?php echo $linkedin_icon;  ?>" alt="" /></a>
        </div>

    <?php
        echo '<hr>';
        echo $args['after_widget'];
    }


    public function form($instance)
    {
        $fb_link = !empty($instance['fb_link']) ? $instance['fb_link'] : 'wwww.facebook.com/facebook';
        $fb_icon = !empty($instance['fb_icon']) ? $instance['fb_icon'] : 'iconurl';

        $insta_link = !empty($instance['insta_link']) ? $instance['insta_link'] : 'wwww.instagram.com/instagram';
        $insta_icon = !empty($instance['insta_icon']) ? $instance['insta_icon'] : 'iconurl';


        $linkedin_link = !empty($instance['linkedin_link']) ? $instance['linkedin_link'] : 'wwww.linkedin.com/linkedin';
        $linkedin_icon = !empty($instance['linkedin_icon']) ? $instance['linkedin_icon'] : 'iconurl';


    ?>
        <p>
            <label for="<?php echo $this->get_field_id('fb_link');   ?>">Facebook Link</label>
            <input type="text" name="<?php echo $this->get_field_name('fb_link');   ?>" value="<?php echo esc_attr($fb_link);  ?>" id="<?php echo $this->get_field_id('fb_link');   ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('fb_icon');   ?>">Icon</label>
            <input type="text" name="<?php echo $this->get_field_name('fb_icon');   ?>" value="<?php echo esc_attr($fb_icon);  ?>" id="<?php echo $this->get_field_id('fb_icon');   ?>">
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('insta_link');   ?>">Instagram Link</label>
            <input type="text" name="<?php echo $this->get_field_name('insta_link');   ?>" value="<?php echo esc_attr($insta_link);  ?>" id="<?php echo $this->get_field_id('insta_link');   ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('insta_icon');   ?>">Icon</label>
            <input type="text" name="<?php echo $this->get_field_name('insta_icon');   ?>" value="<?php echo esc_attr($insta_icon);  ?>" id="<?php echo $this->get_field_id('insta_icon');   ?>">
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('linkedin_link');   ?>">Linkedin URL</label>
            <input type="text" name="<?php echo $this->get_field_name('linkedin_link');   ?>" value="<?php echo esc_attr($linkedin_link);  ?>" id="<?php echo $this->get_field_id('linkedin_link');   ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin_icon');   ?>">Icon</label>
            <input type="text" name="<?php echo $this->get_field_name('linkedin_icon');   ?>" value="<?php echo esc_attr($linkedin_icon);  ?>" id="<?php echo $this->get_field_id('linkedin_icon');   ?>">
        </p>



<?php }


    public function update($new_instance, $old_instance)
    {
        $instance = array(
            'fb_link' => !empty($new_instance['fb_link']) ? $new_instance['fb_link'] : 'wwww.facebook.com/facebook',
            'fb_icon' => !empty($new_instance['fb_icon']) ? $new_instance['fb_icon'] : 'iconurl',

            'insta_link' => !empty($new_instance['insta_link']) ? $new_instance['insta_link'] : 'wwww.instagram.com/instagram',
            'insta_icon' => !empty($new_instance['insta_icon']) ? $new_instance['insta_icon'] : 'iconurl',

            'linkedin_link' => !empty($new_instance['linkedin_link']) ? $new_instance['linkedin_link'] : 'wwww.linkedin.com/linkedin',
            'linkedin_icon' => !empty($new_instance['linkedin_icon']) ? $new_instance['linkedin_icon'] : 'iconurl',

        );

        return $instance;
    }
}



function social_profiles_links()

{
    register_widget('social_profiles');
}

add_action('widgets_init', 'social_profiles_links');
