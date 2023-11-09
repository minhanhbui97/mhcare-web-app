<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Reference: https://github.com/laracasts/PHP-For-Beginners-Series/blob/main/Core/Session.php
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

    header("Location: /login");
}