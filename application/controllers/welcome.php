<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    /*
     * Render the default layout
     */
   
    public function index() {
        $this->render();
    }
    
    /*
     * Render the default layout and current method
     */
    public function back() {
        $this->data['name'] = 'James Joyce';
        $this->render();
    }
    
    /*
     * Render a different layout
     */
    public function different(){
        $this->data['head_title'] .= ' Change the default title';
        
        $this->render('no_footer');
    }
    
    /*
     * Render a different layout and different template
     */
    public function different_template(){
        $this->render('no_footer','welcome/changed');
    }
    
    /*
     * Render a different layout and different template
     */
    public function json_respose(){
        $arResponse = array("success" => true,
                            "message" => "I am Json!" );
        echo json_encode($arResponse);
        exit();
    }
    
     /*
     * Render a different layout and different template
     *  
     */
    public function response(){
        
         $this->data['view_content'] = $this->render('','welcome/content',true);
         
         // add custom js file in header
         $this->add_custom_js_file('assets/js/response.js');
         
         // add custom js content in header 
         // can be used to call js jquery plugins
         $js_content = ' var x = "My var"; console.info(x); ';
         $this->add_custom_js($js_content);
         
         // add custom css file
         $this->add_custom_css_file('assets/css/custom.css');
         
          // add custom css content
         $css_content = ' a,a:hover,a:visited {color:green;} ';
         $this->add_custom_css($css_content);
         
         
         $this->render();
    }

}