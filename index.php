<?php
require_once('./Juguetes.php');

//Instanciamos la clase
$modeloJuguetes = new Juguetes();
$rows = $modeloJuguetes->selectAll(); //Optenemos los juguetes

//Comprobamos si la consulta devuelve algo
if ($rows->num_rows == 0) {
    $mensajeKO = "No hay juguetes para mostrar";
}
//Comprobamos si se recibe algo por get
if (!empty($_GET)) {
    $idMensaje = (int) filter_input(INPUT_GET, 'msg');
    //Comprobamos si el mensaje es:
    if($idMensaje == 77){
        $mensajeOK = "El juguete ha sido borrado correctamente"; //Si es creamos el texto para que salga por pantalla
    }
    if($idMensaje == 66){
        $mensajeKO = "Lo sentimos, pero ha intentado acceder a un juguete que no existe"; //Si es creamos el texto para que salga por pantalla
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <?php echo Utils::getHead('Listado de juguetes'); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 mt-4">
                <a href="./crear.php" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Crear Juguete</a>
                <h1>Juguetes</h1>
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
                <?php if((int)$rows->num_rows){ ?>
                    <div class="col-12 col-md-8 offset-md-2 mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $rows->fetch_assoc()){ ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo number_format($row['precio'],2,',','.'); ?>€</td>
                                        <td>
                                            <div class="btn-groud">
                                                <a href="./editar.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</a>
                                                <a href="./borrar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>