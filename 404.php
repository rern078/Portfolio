<?php
// Set the response code to 404
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>404 - Page Not Found</title>
      <style>
            body {
                  font-family: 'Arial', sans-serif;
                  background-color: #f4f4f4;
                  color: #333;
                  margin: 0;
                  padding: 0;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  height: 100vh;
                  text-align: center;
            }

            .container {
                  max-width: 600px;
                  padding: 20px;
                  background-color: #fff;
                  border-radius: 8px;
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                  font-size: 3rem;
                  margin: 0;
                  color: #e74c3c;
            }

            p {
                  font-size: 1.2rem;
                  margin: 20px 0;
            }

            a {
                  color: #3498db;
                  text-decoration: none;
            }

            a:hover {
                  text-decoration: underline;
            }
      </style>
</head>

<body>
      <div class="container">
            <h1>404</h1>
            <p>Oops! The page you're looking for doesn't exist.</p>
            <p>You might have typed the wrong URL or the page has been moved.</p>
            <p><a href="/">Go back to the homepage</a></p>
      </div>
</body>

</html>