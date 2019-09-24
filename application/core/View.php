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

        $view = APP_DIR.'/views/'.$this->path.'.php';
        if (file_exists($view)){
            ob_start();
            require $view;
            $content = ob_get_clean();
            require APP_DIR.'/views/layouts/'.$this->layout.'.php';
        } else {
            echo "Вид не найден.".$this->path;
        }

    }
}