<?php

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $routes = [
        '/' => "controllers/home.php",
        '/new' => 'controllers/criarLeilao.php'
    ];

    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
        http_response_code(404);
        echo '404 - Page Not Found!';
        die();
    }


?>