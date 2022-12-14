<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\App;

class View{
    public function __construct(
        protected string $view,
        protected array $params = []
    )
    {
        
    }




    public static function create_View(string $view, array $params = []){
        return new static($view, $params);
    }

    public function render():string{
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if(! file_exists($viewPath)){
            // throw new ViewNotFoundException($viewPath);
        }

        ob_start();

        foreach($this->params as $key => $value){
            $$key = $value;
        }

        if(isset($_GET)){
            foreach($_GET as $key => $value){
                $$key = $value;
            }
        }

        include $viewPath;

        return (string)ob_get_clean();

    }


    public function __toString()
    {
        return $this->render();
    }

    public function __get($name)
    {
        return $this->params[$name];
    }
}
