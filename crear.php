<?php
//require_once('./Utils.php');
require_once('Juguetes.php');


//Instanciamos la clase
$modeloJuguetes = new Juguetes();

if (!empty($_POST)) {
    $datosJuguete = [];
    $datosJuguete['nombre'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $datosJuguete['precio'] = (float)str_replace(',', '.', filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_STRING));

    try {
        $id = $modeloJuguetes->insert($datosJuguete);
        if ((int)$id) {
            header('Location:editar.php?msg=55&id=' . $id);
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
    }
}

?>
<!doctype html>
<html lang="es">

<head>
    <?php echo Utils::getHead('Crear juguete'); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 offset-md4 mt-4">
                <a href="./index.php" class="btn btn-primary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al listado</a>
                <div class="clearfix"></div>
                <h1>Crear juguete</h1>
                <?php if (isset($mensajeKO)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensajeKO; ?>
                    </div>
                <?php } ?>
                <?php if (isset($mensajeOK)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $mensajeOK; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
                <form action="crear.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" id="precio" placeholder="0.00" required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Crear</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>