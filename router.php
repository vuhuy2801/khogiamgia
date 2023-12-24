<?php 
class Router {
    private $staticRoutes = [];
    private $dynamicRoutes = [];

    public function addRoute($uri, $controller_action) {
        $this->staticRoutes[$uri] = $controller_action;
    }

    public function addDynamicRoute($pattern, $controller_action) {
        $pattern = str_replace(['{', '}'], ['(?P<', '>[^/]+)'], $pattern);
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->dynamicRoutes[$pattern] = $controller_action;
    }
    

    public function getAction($uri) {
        if (isset($this->staticRoutes[$uri])) {
            return $this->staticRoutes[$uri];
        }
        foreach ($this->dynamicRoutes as $pattern => $controller_action) {
            if (preg_match($pattern, $uri, $matches)) {
                return $controller_action;
            }
        }

        return null; 
    }

    public function listDynamicRoutes() {
        return $this->dynamicRoutes;
    }
}


$router = new Router();
$router->addRoute('/pj_voucher/khogiamgia/posts/add', 'PostController@addPost');
$router->addRoute('/pj_voucher/khogiamgia/posts/update', 'PostController@updatePost');
$router->addDynamicRoute('/pj_voucher/khogiamgia/posts/delete/{postId}', 'PostController@deletePost');

$dynamicRoutes = $router->listDynamicRoutes();
var_dump($dynamicRoutes);

$request_uri = $_SERVER['REQUEST_URI'];

$action = $router->getAction($request_uri);

if ($action) {
    $controller_action = explode('@', $action);
   
    $controller = $controller_action[0];
    $action = $controller_action[1];

    require_once __DIR__ . '/app/controllers/' . $controller . '.php';
    $controller_instance = new $controller();
    $controller_instance->$action();
} else {
    echo '<br>'."404 - Not Found";
}

?>