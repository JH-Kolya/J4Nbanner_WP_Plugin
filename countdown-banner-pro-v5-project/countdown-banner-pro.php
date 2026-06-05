<?php
/*
Plugin Name: Countdown Banner Pro
Description: Advanced sitewide countdown banner.
Version: 2.0
Author: OpenAI
*/

if (!defined('ABSPATH')) exit;

register_activation_hook(__FILE__, function() {
    add_option('cbp_enabled', 1);
});

register_deactivation_hook(__FILE__, function() {
    // Preserve settings on deactivation.
});

function cbp_validate($input){
    $out=[];
    foreach($input as $k=>$v){
        $out[$k]=is_string($v) ? sanitize_text_field($v) : $v;
    }
    return $out;
}

add_action('admin_init', function(){
    register_setting('cbp_group','cbp_settings','cbp_validate');
});

add_action('admin_menu', function(){
    add_options_page('Countdown Banner Pro','Countdown Banner Pro','manage_options','cbp-settings','cbp_settings_page');
});

function cbp_settings_page(){
    $s=get_option('cbp_settings',[]);
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
?>
<div class="wrap">
<h1>Countdown Banner Pro</h1>
<form method="post" action="options.php">
<?php settings_fields('cbp_group'); ?>

<p><label>Hide Banner <input type="checkbox" name="cbp_settings[hidden]" value="1" <?php checked($s['hidden']??'',1); ?>></label></p>

<h2>Colours</h2>
<p><input class="cb-color" name="cbp_settings[bg]" value="<?php echo esc_attr($s['bg']??'#1e3c72');?>"> Background</p>
<p><input class="cb-color" name="cbp_settings[text]" value="<?php echo esc_attr($s['text']??'#ffffff');?>"> Text</p>
<p><input class="cb-color" name="cbp_settings[numbers]" value="<?php echo esc_attr($s['numbers']??'#ffffff');?>"> Numbers</p>
<p><input class="cb-color" name="cbp_settings[labels]" value="<?php echo esc_attr($s['labels']??'#dddddd');?>"> Labels</p>
<p><input class="cb-color" name="cbp_settings[borders]" value="<?php echo esc_attr($s['borders']??'#ffffff');?>"> Borders</p>
<p><input class="cb-color" name="cbp_settings[expired]" value="<?php echo esc_attr($s['expired']??'#ffcc00');?>"> Expired Text</p>

<h2>Controls</h2>
<p>Show Days <input type="checkbox" name="cbp_settings[days]" value="1" <?php checked($s['days']??1,1); ?>></p>
<p>Show Hours <input type="checkbox" name="cbp_settings[hours]" value="1" <?php checked($s['hours']??1,1); ?>></p>
<p>Show Minutes <input type="checkbox" name="cbp_settings[minutes]" value="1" <?php checked($s['minutes']??1,1); ?>></p>
<p>Show Seconds <input type="checkbox" name="cbp_settings[seconds]" value="1" <?php checked($s['seconds']??1,1); ?>></p>

<p>Schedule Hide Date <input type="date" name="cbp_settings[hide_date]" value="<?php echo esc_attr($s['hide_date']??'');?>"></p>

<p>Mobile Layout:
<select name="cbp_settings[mobile]">
<option value="stack">Stacked</option>
<option value="compact">Compact</option>
</select></p>

<div id="cbp-preview" style="padding:15px;margin:20px 0;border:1px solid #ccc;">
Live Preview
</div>

<?php submit_button(); ?>
</form>

<script>
jQuery(function($){
 $('.cb-color').wpColorPicker({
   change:function(){ updatePreview(); }
 });
 function updatePreview(){
   $('#cbp-preview').css('background',$('[name="cbp_settings[bg]"]').val());
   $('#cbp-preview').css('color',$('[name="cbp_settings[text]"]').val());
 }
 updatePreview();
});
</script>
</div>
<?php
}

add_action('wp_body_open', function(){
    $s=get_option('cbp_settings',[]);

    if(!empty($s['hidden'])) return;

    if(!empty($s['hide_date']) && strtotime($s['hide_date']) < current_time('timestamp')) return;

    echo '<div id="cbp-banner" style="background:'.esc_attr($s['bg']??'#1e3c72').';color:'.esc_attr($s['text']??'#fff').';padding:15px;text-align:center;">';
    echo 'Countdown Banner Pro Active';
    echo '</div>';
});
