<?php
class BaseController {
    protected function loadModel($modelName) {
        $filePath = __DIR__ . '/../model/' . $modelName . '.php';
        if (file_exists($filePath)) {
            include_once $filePath;
            return new $modelName();
        } else {
            die("Model $modelName not found!");
        }
    }

    protected function render($viewName, $data = []) {
        $viewPath = __DIR__ . '/../../tests/view/' . $viewName . '.php';
        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            die("View $viewName not found!");
        }
    }
}
?>
