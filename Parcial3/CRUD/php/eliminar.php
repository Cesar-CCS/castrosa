<?php
$IDCurso = $_POST['id'];

$hostname = 'localhost';
$database = 'web18100157';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    echo 'exito';
} catch(PDOException $e) {
    $row['resultado']  = '1';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Exeption';
    $row['detalle']    = $e->getMessage();
}


$sql = "DELETE FROM curso WHERE id_Curso = ?";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(1,$IDCurso);
   if ($stmt->execute()) {
        $row['resultado']  = '0';
        $row['informacion']= 'ELIMINADO';
        $row['mensaje']    = 'ELIMINADO';
        $row['detalle']    = "Registro Borrado";
   } else {
        $row['resultado']  = '2';
        $row['informacion']= 'Error Delete';
        $row['mensaje']    = 'Error';
        $row['detalle']    = "Error al ejecutar";
   }
   $encoded_row = array_map('utf8_encode',$row);
   echo json_encode($encoded_row);
?>