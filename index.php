<?php
// Autoload your controllers or include necessary files
include_once __DIR__ . '/app/controller/FilmController.php';
include_once __DIR__ . '/app/controller/CategorieController.php';
include_once __DIR__ . '/app/controller/ActeurController.php';
include_once __DIR__ . '/app/controller/FavorisController.php';
include_once __DIR__ . '/app/controller/PersonController.php';


// Get the requested controller and action from the URL
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'FilmController'; // Default: FilmController
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';                                               // Default: index

try {
    // Check if the controller class exists
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        // Check if the method (action) exists in the controller
        if (method_exists($controller, $actionName)) {
            // Collect all parameters from $_GET (excluding controller and action)
            $params = array_diff_key($_GET, array_flip(['controller', 'action']));

            // Call the action dynamically with parameters
            call_user_func_array([$controller, $actionName], $params);
        } else {
            throw new Exception("Error: Action '$actionName' not found in '$controllerName'.");
        }
    } else {
        throw new Exception("Error: Controller '$controllerName' not found.");
    }
} catch (Exception $e) {
    // Handle errors gracefully
    echo $e->getMessage();
}
