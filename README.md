<h1>Juguetes</h1>
<p>A partir de la tabla juguetes de la práctica de este tema, vamos a crear una clase Juguetes.php que tenga:</p>
<ul>
    <li>Un atributo conexion que inicializaremos en el constructor con el conector msqli a la base de datos. Éste lo usaremos en los demás métodos.</li>
    <li>El método constructor</li>
    <li>El método selectAll() que devolverá todos los registros de la tabla juguetes.</li>
    <li>El método select($ID) que recibirá por parámetro la PK de la tabla y devolverá el registro correspondiente.</li>
    <li>El método insert($data) que recibirá un array asociativo con los campos de la tabla y creará un nuevo registro.</li>
    <li>El método update($data) que recibirá el mismo array asociativo pero que actualizará un registro existente.</li>
    <li>El método delete($ID) que borrará el registro de la PK que reciba por parámetro.</li>
</ul>
<p>Crearemos 4 archivos PHP con la siguiente funcionalidad:</p>
<ul>
    <li>Listado de juguetes con opciones de crear, editar y borrar (podemos usar como punto de partida el listado de la práctica).</li>
    <li>Crear juguete.</li>
    <li>Editar juguete.</li>
    <li>Borrar juguete: que después de borrarlo volverá al listado mostrando un mensaje de "Juguete borrado correctamente".</li>
</ul>
<p>La idea es que en esos 4 archivos incluyamos la clase Juguetes.php (mediante un require_once) de manera que la conexión con base de datos solo se haga desde ese archivo.</p>






