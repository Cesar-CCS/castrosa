<?php
$IDCurso = $_POST['id'];

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

$sql = "SELECT * FROM curso WHERE id_Curso = ?";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(1,$IDCurso);
   if ($stmt->execute()) {
       $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $row['resultado']  = '0';
        $row['informacion']= 'Consulta Exitosa';
        $row['mensaje']    = 'Consult Encontrado';
        $row['detalle']    = $result;
   } else {
        $row['resultado']  = '2';
        $row['informacion']= 'Error Consulta';
        $row['mensaje']    = 'Error';
        $row['detalle']    = "Error al Consulta";
   }

   echo json_encode($row);
?>