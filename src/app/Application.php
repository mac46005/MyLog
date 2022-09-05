<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\App;

use MyLog_ClassLib\App\Container;

class Application{
    public static Router $router;
    public static Container $container;

    public function __construct(protected array $request)
    {
        self::$container = new Container();
        self::$router = new Router(self::$container);
    }


    

    public function run(){
        try {
            self::$container->set(Container::class, function(){
                return self::$container;
            });

            echo self::$router->resolve($this->request['uri'],strtolower($this->request['method']));
        } catch (\Throwable $th) {
            http_response_code(404);

            echo $th;
        }
    }
}