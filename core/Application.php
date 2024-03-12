<?php 
namespace app\core;

class Application {
    public static string $ROOT_PATH;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_PATH = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(){
        echo $this->router->resolve();
    }

    public function getController(Controller $controller){
        return $this->controller;
    }

    public function setController(Controller $controller){
        return $this->controller;
    }
}
?>