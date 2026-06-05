<?php
if(!defined('ABSPATH')) exit;
class CBP_Plugin{
 static function instance(){ static $i; if(!$i){$i=new self;} return $i; }
 function __construct(){
  add_action('admin_menu',[$this,'menu']);
  add_action('admin_init',[$this,'settings']);
  add_action('wp_body_open',[$this,'render']);
 }
 function settings(){ register_setting('cbp_group','cbp_settings'); }
 function menu(){ add_options_page('Countdown Banner Pro','Countdown Banner Pro','manage_options','cbp',[$this,'page']); }
 function page(){ echo '<div class="wrap"><h1>Countdown Banner Pro</h1><p>Enterprise starter implementation.</p></div>'; }
 function render(){ echo '<div style="padding:10px;background:#1e3c72;color:#fff;text-align:center">Countdown Banner Pro v5 Active</div>'; }
}
