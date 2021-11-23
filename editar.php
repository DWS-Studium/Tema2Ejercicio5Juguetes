<?php
require_once('Juguetes.php');

//Instanciamos la clase
$modeloJuguetes = new Juguetes();

$id=0;
if (!empty($_POST)) {
    $datosJuguete = [];
    $datosJuguete['id'] = (int)filter_input(INPUT_POST, 'id');
    $datosJuguete['nombre'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $datosJuguete['precio'] = (float)str_replace(',', '.', filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_STRING));

    try {
        $id = $modeloJuguetes->update($datosJuguete);
        if ((int)$id) {
            $mensajeOK = 'El juguete se ha actualizado correctamente';
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
    }
}else if (!empty($_GET)){
    $id = (int) filter_input(INPUT_GET, 'id');
    $idMensaje = (int) filter_input(INPUT_GET, 'msg');
    //Comprobamos si el mensaje es:
    if($idMensaje == 55){
        $mensajeOK = "El juguete se ha creado correctamente"; //Si es creamos el texto para que salga por pantalla
    }
}
//Comprobamos si hay juguete en caso de que no encuentre enviara un mensaje al index. 
$juguete = $modeloJuguetes->select($id);
        if ($juguete==null) {
            header('Location:editar.php?msg=66');
        }
?>
<!doctype html>
<html lang="es">

<head>
    <?php echo Utils::getHead('Editar juguete'); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 offset-md4 mt-4">
                <a href="./index.php" class="btn btn-primary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al listado</a>
                <a href="./crear.php" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Crear Juguete</a>
                <div class="clearfix"></div>
                <h1>Editar juguete</h1>
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
            <div class="col-12 col-md-4 offset-md-4">
                <form action="editar.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $juguete['nombre']; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" id="precio" placeholder="0.00" value="<?php echo $juguete['precio']; ?>" required/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $juguete['id']; ?>"/>
                    <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Modificar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>