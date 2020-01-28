<?php

namespace application\core;

class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $view = APP_VIEWS.'/'.$this->path.'.php';
        if (file_exists($view)){
            ob_start();
            require $view;
            $content = ob_get_clean();
            require APP_VIEWS.'/layouts/'.$this->layout.'.php';
        } else {
            echo "Вид не найден.".$this->path;
        }

    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = APP_VIEWS.'/errors/'.http_response_code().'.php';
        if (file_exists($path)){
            require $path;

        }
        exit();
    }

    public function redirect($url)
    {
        header('Location: '.$url);
        exit();
    }
}