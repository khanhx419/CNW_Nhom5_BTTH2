<?php
session_start();
require_once 'config/Database.php';
require_once 'controllers/AuthMiddleware.php';

$controllerName = 'HomeController';
$actionName = 'index';

if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = explode('/', $url);
    
    if (!empty($url[0])) {
        $controllerName = ucfirst($url[0]) . 'Controller';
    }

    if (isset($url[1])) {
        $actionName = $url[1];
    }
}

$controllerPath = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            echo "404 - Action '$actionName' không tồn tại.";
        }
    } else {
        echo "404 - Class '$controllerName' không tìm thấy.";
    }
} else {
    echo "404 - Controller '$controllerName' không tồn tại.";
}
?>