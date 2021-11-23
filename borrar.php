<?php
if(!empty($_GET['id'])){
    require_once('Juguetes.php');
    //Instanciamos la clase
    $modeloJuguetes = new Juguetes();

    $idJuguete = (int) filter_input(INPUT_GET, 'id'); //$idJuguete=(int)$_GET['id'];
    $modeloJuguetes->delete($idJuguete);
    //Indicamos que se ha borrado correctamente, se puede poner lo que queramos. Trataremos el mensaje enviado en index
    header('Location:index.php?msg=77');
}else{
    header('Location:index.php');
}
?>