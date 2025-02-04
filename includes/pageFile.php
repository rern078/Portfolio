<?php
// Route Mapping
$routes = [
      'login' => 'auth/login.php',
      'register' => 'auth/register.php',
      'admin' => 'admin/index.php',
      'logout' => 'auth/logout.php',
      'home' => 'index.php'
];

$requestUri = trim($_SERVER['REQUEST_URI'], '/');

if (empty($requestUri)) {
      $requestUri = 'home';
}

if (isset($routes[$requestUri])) {
      require_once $routes[$requestUri];
} else {
      http_response_code(404);
      echo "Page not found!";
}
