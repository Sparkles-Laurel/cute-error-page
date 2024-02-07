<!DOCTYPE html>
<html>
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
    <style>
    .thingy-center {
        margin: auto;
        text-align: center;
    }

    .thingy-center-content {
        align-content: center;
    }
    </style>
</head>
<body>
   <div class="container">
        <div class="row">
            <h2 class="thingy-center">
                <?php
                echo 'Error:' . $status_code;
                ?>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12 thingy-center-content">
                <img src="<?= $http_cat_pic ?>" alt="Error Image" class="img-fluid thingy-center">    
            </div>
        </div>
    </div>
</body>
</html>