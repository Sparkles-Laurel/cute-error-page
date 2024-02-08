<!DOCTYPE html>
<html data-bs-theme="dark">
<head>
    <?php
    $status_code = $_GET['code'];
    $http_cat_pic = 'https://http.cat/'.$status_code.'.jpg';
    ?>
    <!-- print HTTP error code here -->
    <!-- in this format: Error {code} -->
    <title> Error: <?php echo $status_code; ?> </title>
    <!-- add meta tags here -->

    <!-- end meta tags here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://yigitovski.com/assets/fonts/font-declaration.css">

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
    </style>
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
                <img src="<?= $http_cat_pic ?>" alt="Error Image" class="img-fluid">    
            </div>
        </div>
    </div>
</body>
</html>