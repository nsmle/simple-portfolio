<?php 


class App {
    
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct()
    {
        $url = $this->parseURL();
        
        if ( $url[0] == 'admin' ) {
          
            //CONTROLLER ADMIN
            if ( file_exists('app/Controllers/Admin/' . ucfirst($url[1]) . '.php') ) {
                $this->controller = ucfirst($url[1]);
                unset($url[1]);
            }
            
            require_once ('app/Controllers/Admin/' . $this->controller . '.php');
            $this->controller = new $this->controller;
            
            //METHOD ADMIN
            if ( isset($url[2]) ) {
                if ( method_exists($this->controller, $url[2]) ) {
                    $this->method = $url[2];
                    unset($url[2]);
                }
            }
            
            //PARAMS ADMIN
            if ( !empty($url) ) {
                $this->params = array_values($url);
            }
            
            // RUN controller AND method AND PASS params IF ANY
            call_user_func_array([$this->controller, $this->method], $this->params);
            return;
        }
        
        
        
        //CONTROLLER PUBLIC
        if ( file_exists('app/Controllers/' . ucfirst($url[0]) . '.php') ) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }
        
        require_once ('app/Controllers/' . $this->controller . '.php');
        $this->controller = new $this->controller;
        
        //METHOD PUBLIC
        if ( isset($url[1]) ) {
            if ( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        //PARAMS PUBLIC
        if ( !empty($url) ) {
            $this->params = array_values($url);
        }
        
        // RUN controller AND method AND PASS params IF ANY
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }
    public function parseURL() 
    {
        if ( isset($_GET['url']) ) {
    
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
    
}