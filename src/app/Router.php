<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\App;

class Router{
    private array $routes;

    function __construct(private Container $container)
    {
        
    }

    public function register(string $requestMethod, string $route, callable|array $action, array $params = []): self{
        $this->routes[$requestMethod][$route] = $action;
        $this->routes[$requestMethod]['params'] = $params;
        
        return $this;
    }

    public function get(string $route, callable|array $action, array $params = []): self{
        return $this->register('get',$route,$action,$params);
    }

    public function post(string $route, callable|array $action, array $params = []): self{
        return $this->register('post',$route,$action,$params);
    }
    
    public function getRoutes(): array{
        return $this->routes;
    }




    public function resolve(string $requestUri, string $requestMethod){
        $route = explode('?', $requestUri)[0];// e.g gets the left side of ? for example => mywebsite/helloworld?action=something 
        $action = $this->routes[$requestMethod][$route] ?? null;

        if(! $action){
            //throw new RouteNotFoundException();
        }

        [$class, $method] = $action;

        if(class_exists($class)){
            //$class = new $class()
            $class = $this->container->get($class);

            if(method_exists($class, $method)){
                return call_user_func_array([$class,$method], []);
            }
        }
        // return new RouteNotFoundException($action);
    }
}