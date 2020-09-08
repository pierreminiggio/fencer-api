<?php

use Illuminate\Support\Facades\URL;

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>API Documentation</title>
        <link rel="stylesheet" href="{{ URL::to('/openapi/swagger-ui.css') }}">
    </head>

    <body>
        <div id="swagger-ui"></div>

        <script src="https://unpkg.com/swagger-ui-dist@3/swagger-ui-bundle.js"></script>
        <script>
        window.onload = function() {
            window.ui = SwaggerUIBundle({url: "{{ URL::to('/openapi/' . $page . '.json') }}", dom_id: '#swagger-ui'})
        }
        </script>
    </body>
</html>