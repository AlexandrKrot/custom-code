<?php


namespace pechenki\pcs\src;

use pechenki\pcs\src\core;

/**
 *
 */
class settings extends  core {


    private $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
        </svg>';
    /**
     *
     */
    public function init (){
        add_action('admin_menu', array($this, 'settingsTemplete'));

       /* add_action( 'wp_ajax_wic_css', array($this,'addCss'));
        add_action( 'wp_ajax_nopriv_wic_css', array($this,'addCss'));

        add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );*/

        add_action('wp_head', array($this, 'addHead'));
        add_action('wp_footer', array($this, 'addFooter'));


    }

    /**
     * @return void
     */
    public function addHead(){
        echo $this->header;
    }

    /**
     * @return void
     */
    public function addFooter(){
        echo $this->footer;
    }






    /**
     * settings action
     */
    public function settingsTemplete()
    {
        add_submenu_page('options-general.php','pechenki-custom-code',  'Custom Code 🩼', 'manage_options', 'pechenki-custom-code', array($this, 'settings'));

    }
    /*
     * settings html
     */
    public function settings(){

        $this->render('admin/index',[
            'header'=>$this->header,
            'footer'=>$this->footer
        ]);

    }

    private function iconMenu(){
        return "data:image/svg+xml;base64,".base64_encode($this->icon);
    }
}
