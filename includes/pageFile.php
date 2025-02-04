<?php
function pageUrl($page)
{
      // Map page names to URL paths
      $routes = [
            'login' => '/login',         // Maps 'login' to '/login'
            'register' => '/register',   // Maps 'register' to '/register'
            'index' => '/dashboard',         // Maps 'index' to '/index'
            'logout' => '/logout',
            // Add other routes here as needed
      ];

      // Return the corresponding URL for the given page
      return isset($routes[$page]) ? $routes[$page] : '/';  // Default to home if no match
}
