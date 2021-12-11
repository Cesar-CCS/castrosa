<?php
$vNombre_Doc    = $_POST['nom_doc'];
$vApellido = $_POST['app'];
$vNombre_Curs = $_POST['nom_cur'];
$vCosto   = $_POST['cost'];
$vCategoria  = $_POST['cate'];
$vCorreo  = $_POST['email'];
$vRequisitos  = $_POST['requi'];
$vDescripcion  = $_POST['desc'];

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


try {
    $query = "INSERT INTO curso 
    SET Nombre_Docente = ?, Apellido = ?, Nombre_Curso  = ?, Costo = ?, Correo =?, Categoria = ?, Requisitos = ?, Descripcion = ?";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(1, $vNombre_Doc);
    $stmt->bindParam(2, $vApellido);
    $stmt->bindParam(3, $vNombre_Curs);
    $stmt->bindParam(4, $vCosto);
    $stmt->bindParam(5, $vCorreo);
    $stmt->bindParam(6, $vCategoria);
    $stmt->bindParam(7, $vRequisitos);
    $stmt->bindParam(8, $vDescripcion);

   if ($stmt->execute()) {

        $stmt = $dbh->prepare("select LAST_INSERT_ID() as consecutivo");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $row['resultado']  = '0';
        $row['informacion']= 'Exito';
        $row['mensaje']    = "Registro Insertado exitosamente";
        $row['detalle']    = $result['consecutivo'];
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
