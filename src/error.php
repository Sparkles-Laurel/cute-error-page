<!DOCTYPE html>
<html data-bs-theme="dark">
<head>
    <?php
    $status_code = $_GET['code'];

    // Before we proceed, sanitize the input
    if (!is_numeric($status_code)) {
        // if the input is not a number, redirect to the 404 page
        header('Location: /error.php?code=404');
        exit;
    }

    $http_cat_pic = 'https://http.cat/'.$status_code.'.jpg';

    // user-friendly, long error descriptions
    $errorDescriptions = [
        400 => 'The server could not understand the request due to invalid syntax. Please check your request and try again.',
        401 => 'The server could not verify that you are authorized to access the requested resource. Please check your credentials and try again.',
        403 => 'The server understood the request, but is refusing to fulfill it. Please check your credentials and try again.',
        404 => 'The server could not find the requested resource. Please check the URL and try again.',
        405 => 'The method specified in the request is not allowed for the resource identified by the request URI. Please check your request and try again.',
        406 => 'The server is refusing to service the request because the entity of the request is in a format not supported by the requested resource for the requested method. Please check your request and try again.',
        407 => 'The server is refusing to service the request because proxy authentication is required. Please check your credentials and try again.',
        412 => 'The server is refusing to service the request because the request entity is larger than the server is willing or able to process. Please check your request and try again.',
        414 => 'The server is refusing to service the request because the request-target is longer than the server is willing to interpret. Please check your request and try again.',
        415 => 'The server is refusing to service the request because the entity of the request is in a format not supported by the requested resource for the requested method. Please check your request and try again.',
        500 => 'The server has encountered a situation it doesn\'t know how to handle. Please try again later.',
        502 => 'The server received an invalid response from the upstream server it accessed in attempting to fulfill the request. Please try again later.',
        503 => 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server. Please try again later.',
        504 => 'The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server it needed to access in order to complete the request. Please try again later.',
    ];

    ?>
    <!-- print HTTP error code here -->
    <title> Error: <?php echo $status_code; ?> </title>
    <!-- add meta tags here -->

    <meta name="description" content="Error <?php echo $status_code; ?>: <?php echo $errorDescriptions[$status_code]; ?>">
    <meta name="keywords" content="error, <?php echo $status_code; ?>, <?php echo $errorDescriptions[$status_code]; ?>">
    <meta name="author" content="Kıvılcım L. Öztürk, Efi S. Öztürk, Y. Cemal Öztürk">

    <!-- end meta tags here -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/fonts/font-declaration.css">

    <style>
    .thingy-center {
        margin: auto;
        text-align: center;
    }

    .thingy-center-content {
        padding: auto;
        /* align-content: center; */
    }

    .thingy-opendyslexic {
        font-family: 'OpenDyslexic Regular';
    }

    p.thingy-opendyslexic {
        font-size: 1.15em;
    }
    </style>
    <script>
        // if the user uses light mode, adjust the body accordingly,
        // and vice versa
        if (localStorage.getItem('theme') === 'light') {
            document.body.classList.remove('bs-dark');
            document.body.classList.add('bs-light');
        } else if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.remove('bs-light');
            document.body.classList.add('bs-dark');
        }
    </script>
</head>
<body class="bs-dark">
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
             <h2 class="thingy-opendyslexic text-center">
                <?php
                echo 'Error:' . $status_code;
                ?>
            </h2>
            </div>
       </div>  
       <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="thingy-opendyslexic text-center">
                    <?php
                    echo $errorDescriptions[$status_code];
                    ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="<?= $http_cat_pic ?>" alt="Error Image" class="img-fluid smaller-image">    
            </div>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <div class="row text-muted justify-content-center">
                <div class="col-4 thingy-opendyslexic">
                    Liked this? It's <a href="https://github.com/SparkySimp/cute-error-page" class="text-muted">open source</a>!
                </div>
            </div>
        </div>
</body>
</html>