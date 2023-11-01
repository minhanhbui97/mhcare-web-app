<?php   

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/add-patient-detail' => 'controllers/add-patient-detail.php',
    '/edit-patient-detail' => 'controllers/edit-patient-detail.php',
    '/employee-workspace' => 'controllers/employee-workspace.php',
    '/login' => 'controllers/login.php',
    '/patient-detail' => 'controllers/patient-detail.php',
    '/patient-list' => 'controllers/patient-list.php',
];

function routeToController($uri, $routes) {
    // header("Location: /employee-workspace");

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require VIEW_PATH . "{$code}.php";

    die();
}


routeToController($uri, $routes);

// header("Location: /employee-workspace");

