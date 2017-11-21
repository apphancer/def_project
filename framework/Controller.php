<?php

namespace Controller;

use App\App;

class Controller extends App
{
    public function getPage($uri, $config)
    {
        $uri = $this->URI($uri);
        require_once($this->controllerFile($uri));
        $class_name = $uri.'Controller';
        $controller = new $class_name($config);
        $controller->index();
    }


    public function URI($uri)
    {
        $view = 'index';

        // @todo[m]: change to / for index and subsequent pages
        if (isset($_GET['page']) && !empty($_GET['page']))
        {
            $view = $_GET['page'];
        }

        return $view;
    }


    public function viewFile($file)
    {
        return dirname(__FILE__) . '/../protected/views/' . $file . '.php';
    }

    public function controllerFile($uri)
    {
        return dirname(__FILE__) . '/../protected/controllers/' . $uri . 'Controller.php';
    }


    public function render($view_file, $data)
    {
        foreach ($data as $key => $d)
            ${$key} = $d;

        ob_start();
        require_once($this->viewFile($view_file));
        $content = ob_get_contents();
        ob_end_clean();

        require_once($this->viewFile('layout'));
    }
}