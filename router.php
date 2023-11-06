<?php   

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/patient/add' => 'controllers/patient-add.php',
    '/patient/edit' => 'controllers/patient-edit.php',
    '/patient/delete' => 'controllers/patient-delete.php',

    '/patient' => 'controllers/patient.php',
    '/patients' => 'controllers/patients.php',
    // '/patient-list' => 'controllers/patient-list.php',
    // '/patient-detail' => 'controllers/patient-detail.php',
    // '/add-patient-detail' => 'controllers/add-patient-detail.php',
    // '/edit-patient-detail' => 'controllers/edit-patient-detail.php',
    '/employee-workspace' => 'controllers/employee-workspace.php',
    '/login' => 'controllers/login.php',
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

