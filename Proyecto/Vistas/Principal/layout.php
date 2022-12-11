<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SANIMAL S.L.</title>
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="librerias/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0fe0ab93e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        //require_once './Vistas/Principal/header.php';
       require_once './Vistas/Principal/header.php';
    ?>
    <section>
        <div id="cuerpo">
        <?php
           require_once './Vistas/Principal/enruta.php';
        ?>
        </div>
    </section>

    <?php
        require_once './Vistas/Principal/footer.php';
    ?>

</body>

</html>