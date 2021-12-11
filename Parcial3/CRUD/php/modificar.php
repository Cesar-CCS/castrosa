<?php
$IDCurso = $_POST['idC'];
$vNombre_Doc = $_POST['nom_doce'];
$vApellido = $_POST['appe'];
$vNombre_Curs = $_POST['nom_curs'];
$vCosto = $_POST['cos'];
$vCategoria = $_POST['catego'];
$vCorreo = $_POST['mail'];
$vRequisitos = $_POST['req'];
$vDescripcion = $_POST['des'];

$hostname = 'localhost';
$database = 'web18100157';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
} catch(PDOException $e) {
    $row['resultado']  = '1';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Exeption';
    $row['detalle']    = $e->getMessage();
}

echo "Descripcion: $vDescripcion";
try {
    $query = "UPDATE INTO curso
              SET Nombre_Docente = '$vNombre_Doc', Apellido = '$vApellido', Nombre_Curso  = '$vNombre_Curs', Costo = '$vCosto', Correo ='$vCorreo', Categoria = '$vCategoria', Requisitos = '$vRequisitos', Descripcion = '$vDescripcion' WHERE id_Curso = '$IDCurso'";

    $stmt = $dbh->prepare($query);

   if ($stmt->execute()) {
        $row['resultado']  = '0';
        $row['informacion']= 'Exito';
        $row['mensaje']    = "Registro Insertado exitosamente";
        $row['detalle']    = 'Modificacion Resuelta';
   } else {
        $row['resultado']  = '2';
        $row['informacion']= 'Error DB';
        $row['mensaje']    = 'Error Ejecucion de Insert';
        $row['detalle']    = 'Error al hacer sentecia de insercion';
   }

} catch(PDOException $exception) {
    $row['resultado']  = '3';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Exepcion en Insercion';
    $row['detalle']    =  $exception->getMessage();
}


$encoded_row = array_map('utf8_encode',$row);
echo json_encode($encoded_row);
?>
