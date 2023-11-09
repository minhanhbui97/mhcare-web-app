<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/patient/add' => 'controllers/patient-add.php',
    '/patient/edit' => 'controllers/patient-edit.php',
    '/patient/delete' => 'controllers/patient-delete.php',
    '/patient' => 'controllers/patient.php',
    '/patients' => 'controllers/patients.php',
    '/employee-workspace' => 'controllers/employee-workspace.php',
    '/login' => 'controllers/login.php',
    '/logout' => 'controllers/logout.php',
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        if ($uri !== '/' && $uri !== '/login' && !isset($_SESSION['user'])) {
            header("Location: /login");
        } else {
            require $routes[$uri];
        }
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require VIEW_PATH . "{$code}.php";

    die();
}


routeToController($uri, $routes);