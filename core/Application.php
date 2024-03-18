<?php 
namespace app\core;

class Application {
    public static string $ROOT_PATH;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user;

    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_PATH = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if($primaryValue){
            // $primaryKey = $this->userClass::primaryKey();
            $primaryKey = (new $this->userClass)->primaryKey();
            $this->user = (new $this->userClass)->findOne([$primaryKey => $primaryValue]);         
        } else {
            $this->user = null;
        }
    }

    public function run(){
        echo $this->router->resolve();
    }

    public static function isGuest(){
        return  !self::$app->user;
    }

    public function getController(Controller $controller){
        return $this->controller;
    }

    public function setController(Controller $controller){
        return $this->controller;
    }

    public function login(DbModel $user){
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout(){
        $this->user = null;
        $this->session->remove('user');
    }
}
?>
