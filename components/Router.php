<?php


class Router
{

    public function run()
    {        
        $routes = include(ROOT . '/config/routes.php');
        
        $way = $_SERVER['REQUEST_URI'];
        $way = trim($way, '/');
        
        foreach ($routes as $key => $route) {
            if ($res = preg_match("~$key~", $way)) {
                
                $internal_route = preg_replace("~$key~", $route, $way);
                
                $path = explode("/", $internal_route);
                
                $controllerName = ucfirst(array_shift($path)) . "Controller";
                $actionName = "action" . ucfirst(array_shift($path));
                $parameters = $path;
               
                if (file_exists(ROOT . '/controllers/' . $controllerName . '.php')) {
                    include_once(ROOT . '/controllers/' . $controllerName . '.php');
                }
                
                $controller = new $controllerName;
                $result = $controller->$actionName($parameters);

                break;
            }
        }
    }
}





