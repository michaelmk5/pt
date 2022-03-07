<?php
    $action = $_GET['action']??'home';
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--File CSS Icon-->
    <link rel="stylesheet" href="icons/css/all.css">
    <!--File CSS-->
    <link rel="stylesheet" href="Css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Personal Trainer</title>
</head>

<body class="h-100 d-flex flex-column">

        <!--Collegamento php -->
        <?php
            include __DIR__.'/Templates/header.php';
            
            switch($action){
                case 'home':
                        include __DIR__.'/Templates/main.php';
                        break;
                case 'profilo':
                        include __DIR__.'/Templates/profilo.php';
                        break;
                case 'tab':
                        include __DIR__.'/Templates/tab.php';
                        break;
                default:
                    include __DIR__.'/Templates/404.php';
            }
            include __DIR__.'/Templates/footer.php';
        ?>

    
</body>
</html>