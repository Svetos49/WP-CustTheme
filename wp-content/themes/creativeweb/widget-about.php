<?php

class Creativeweb_About_Widget extends WP_Widget {
    function __construct() {
        parent:: __construct('creativeweb_about_widget', esc_html__('About Widget', 'creativeweb'), array('description'=>esc_html('Our first widget', 'creativeweb')) );
    }
    
    public function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $text =  apply_filters('widget_content', $instance['text']);

        echo $before_widget;
        if($title) {
            echo $before_title . esc_html( $title) . $after_title;
        }
        if($text) {
            echo wp_kses_post($text);
        }
        
        
        echo $after_widget;
    }  
    
    public function form ($instance) {
        if(isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = '';
        }

        if(isset($instance['title'])) {
            $text = $instance['text'];
        } else {
            $text = '';
        }
    ?>  
     <p>
       <label for="<?php echo $this -> get_field_id('title'); ?>"><?php esc_html_e('Title', 'creativeweb'); ?></label>
       <input type="text" class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" value=" <?php echo esc_attr($title); ?>"> 
     </p> 
     
     <p>
       <label for="<?php echo $this -> get_field_id('text'); ?>"><?php esc_html_e('Title', 'creativeweb'); ?></label>
       <textarea type="text" class="widefat" id="<?php echo $this -> get_field_id('text'); ?>" name="<?php echo $this -> get_field_name('text'); ?>" ><?php echo esc_attr($title); ?></textarea> 
     </p>
     <?php }

    public function update ($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);

        return $instance;
    }
}
