<!DOCTYPE html>
<html>
<head>
    <!-- print HTTP error code here -->
    <!-- in this format: Error {code} -->
    <title> Error: <?= $_ENV["SERVER_REDIRECT_STATUS"]?> </title>
    <!-- add meta tags here -->

    <!-- end meta tags here -->
</head>
<body>
<?php
    $errorCode = $_ENV["SERVER_REDIRECT_STATUS"];
    echo '<img src="https://http.cat/'. $errorCode .'.jpg"/>'
?>
</body>
</html>