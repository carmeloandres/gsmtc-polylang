<?php
 if ( ! defined( 'ABSPATH' ) ) {die;} ; 

/**
 * Class to manage the plugin
 */

class Gsmtc_Pll{

       
    function __construct()
    {
        add_action('init',array($this,'init')); 
        add_filter('render_block',array($this,'render_block'),10,3);
        add_action( 'wp_body_open',array($this,'body_open'));
//        add_filter('upload_mimes',array($this,'upload_mimes'));

    }
/*
    function upload_mimes($existing_mines=array() ){

            // add your extension to the mimes array as below
        $existing_mimes['zip'] = 'application/zip';
        $existing_mimes['gz'] = 'application/x-gzip';
//        error_log ('Estamos en la función upload_mimes, $existing_mimes: '.var_export($existing_mimes,true));

        return $existing_mimes;

    }
*/
    function body_open(){
        ?>
            <style>
                .wp-block-site-logo{display: none}
                .gsmtc-navigation{color: #2f4f80;}
            </style>
        <?php
    }
	


    function init(){

        register_block_type( GSMTC_PLL_DIR.'/switcher',array('render_callback' => array($this,'switcher_render_cb')));
       
    }

    function switcher_render_cb(){
        ob_start();
        ?>
        <ul class="wp-block-gsmtc-pll-switcher">
            <?php pll_the_languages(array( 'show_flags' => 1, 'show_names' => 0, 'hide_current' => 1)); ?>
        </ul>
        <?php
         $output = ob_get_contents();
         ob_end_clean();
     
         return $output;
    }

    function render_block($block_content, $block, $instance){
        if ($block['blockName'] === 'core/navigation' && 
            !is_admin() &&
            !wp_is_json_request() ) {

                error_log ('function "render_block", $block_content: '.var_export($block_content,true).PHP_EOL);

            $new_block = preg_replace('/<svg.*?\/svg>/i','<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="103.609px" viewBox="0 0 122.879 103.609" enable-background="new 0 0 122.879 103.609" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M10.368,0h102.144c5.703,0,10.367,4.665,10.367,10.367v0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,20.735,0,16.07,0,10.368v0C0,4.665,4.666,0,10.368,0L10.368,0z M10.368,82.875 h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0c0,5.702-4.664,10.367-10.367,10.367H10.368C4.666,103.609,0,98.944,0,93.242l0,0 C0,87.54,4.666,82.875,10.368,82.875L10.368,82.875z M10.368,41.438h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,62.173,0,57.507,0,51.805l0,0C0,46.103,4.666,41.438,10.368,41.438 L10.368,41.438z"/></g></svg>', $block_content,1);
            $new_block = str_replace('wp-block-navigation__responsive-container-open','wp-block-navigation__responsive-container-open gsmtc-navigation',$new_block);
            $new_block = str_replace('wp-block-navigation__responsive-container-close','wp-block-navigation__responsive-container-close gsmtc-navigation',$new_block);

            return $new_block;
        } 

        return $block_content;

    }
}