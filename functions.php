<?php


function dumpAndDie($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

define("VIEW_PATH", __DIR__ . '/views/');