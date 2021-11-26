<?php

$hostname='localhost';
$database='web18100157';
$username='root';
$password='';

try {
      $con = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
      echo "Conexion exitosa".'<br>'.'<br>';
      echo "Consulta a la tabla Cursos: ".'<br>';
      $queryStr="select * from Curso";
      $query=$con->prepare($queryStr);
      $query->execute();
      while ($row = $query->fetch()) {
          echo '|'.$row['Nombre_Usuario'].'|'.'--'.
          $row['Nombre_Docente'].'|'.'--'.
          $row['Apellido'].'|'.'--'.
          $row['Nombre_Curso'].'|'.'--'.
          $row['Costo_Curso'].'|'.'--'.
          $row['Correo'].'|'.'--'.
          $row['Categoria'].'|'.'--'.
          $row['Requisitos'].'|'.'--'.
          $row['Descripcion'].'|'.'<br>'.'<br>';
      }
      $query->closeCursor();
} catch(PDOException $e) {
      echo "!ERROR¡ FALLO EN LA CONEXION";
      echo $e->getMessage();
      exit();
}

$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
