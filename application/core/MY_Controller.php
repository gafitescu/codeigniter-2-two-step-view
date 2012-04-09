<?php

class MY_Controller extends CI_Controller {
   
    protected $data = array();
    protected $controller_name;
    protected $action_name;
   
    public static $_LAYOUT = 'layouts';
    
    public function MY_Controller() 
    {
        parent::__construct();
        
        $this->data['head_title']       = 'Default head title';
        $this->data['head_description'] = 'Default head description';
        $this->data['head_keywords']    = 'Default head keywords';
        
        $this->load_defaults();
    }
    
    protected function load_defaults() {
       
        $this->data['custom_js'] = '';
        $this->data['custom_js_mobile'] = '';
        $this->data['arCustomJSfiles'] = array();
        $this->data['arCustomCSSfiles'] = array();
        
        $this->data['content'] = '';

        $this->controller_name = $this->router->fetch_directory() . $this->router->fetch_class();
        $this->action_name = $this->router->fetch_method();

        $this->data['current_page'] = $this->controller_name . '_' . $this->action_name;
        $this->data['controller'] = $this->controller_name;
        
    }
    
    protected function render($template='default', $view_name='',$return=false) {
        
        if (empty($view_name)) {
            $view_path = $this->controller_name . '/' . $this->action_name . '.tpl.php';
        } else {
            $view_path = $view_name . '.tpl.php';
        }
      
        if (file_exists(APPPATH . 'views/' . $view_path)) {
            if (isset($this->data['content'])) {
                $this->data['content'] .= $this->load->view($view_path, $this->data, true);
            } else {
                $this->data['content']  = $this->load->view($view_path, $this->data, true);
            }
        }
        
        if ($return == false) {
            $this->load->view(self::$_LAYOUT."/$template.tpl.php", $this->data);
        } else {
            return $this->data['content'];
        }
        
    }

    protected function add_custom_js($js_content) {
        $this->data['custom_js'] .= $js_content;
    }

    protected function add_custom_js_file($file_path) {
        $this->data['arCustomJSfiles'][] = $file_path;
    }

    protected function add_custom_css($css_content) {
        if (isset($this->data['custom_css'])) {
            $this->data['custom_css'] .= $css_content;
        } else {
            $this->data['custom_css'] = $css_content;
        }
    }

    protected function add_custom_css_file($file_path, $start_condition='', $end_condition='') {
        $cssFile = array('file' => $file_path,
            'start_condition' => $start_condition,
            'end_condition' => $end_condition);
        $this->data['arCustomCSSfiles'][] = $cssFile;
    }  
        
}