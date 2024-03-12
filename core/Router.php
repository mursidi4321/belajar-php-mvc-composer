<?php 
namespace app\core;
use app\core\Request;
use app\core\Response;
use app\core\Controller;

class Router {
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
           $this->response->setStatusCode(404);
            return $this->renderView('_404');      
        }
        if(is_array($callback)){
           Application::$app->controller = new $callback[0]();
           $callback[0] = Application::$app->controller;
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params=[]){
        
        $layoutContent = $this->layoutContent();
        $onlyViewContent = $this->onlyViewContent($view,$params);
        return str_replace('{{content}}',$onlyViewContent, $layoutContent);
    }

    public function renderContent($viewContent){
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}',$viewContent, $layoutContent);
    }

    protected function layoutContent(){
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_PATH . "/views/layouts/$layout.php";
        return ob_get_clean();
    }
    protected function onlyViewContent($view, $params){
        foreach($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_PATH . "/views/$view.php";
        return ob_get_clean();
    }

}
?>