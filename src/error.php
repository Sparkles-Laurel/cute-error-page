<!DOCTYPE html>
<html>
<head>
    <!-- print HTTP error code here -->
    <!-- in this format: Error {code} -->
    <title> Error: <?= $_ENV["SERVER_REDIRECT_STATUS"]?> </title>
    <!-- add meta tags here -->

    <!-- end meta tags here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
        
</head>
<body>
<?php
    $errorCode = $_ENV["SERVER_REDIRECT_STATUS"];
    echo '<img src="https://http.cat/'. $errorCode .'.jpg"/>'
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>