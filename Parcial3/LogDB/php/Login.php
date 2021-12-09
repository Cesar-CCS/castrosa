<?php
$vLogin   = $_POST['Login'];
$vPassword= $_POST['Password'];

//$vLogin   = 'Rogelio';
//$vPassword= 'Rog150';


$hostname = 'localhost';
$database = 'web18100157';
$username = 'root';
$password = '';


$link = new mysqli($hostname, $username, $password, $database);


if ($link->connect_error) {
        $row['resultado']  = '1';
        $row['informacion']= 'Error DB';
		$row['mensaje']    = 'Error conexion';
		$row['detalle']    = 'No hay conexion a la base de datos';
    } else {

    $vPasswordMd5=md5($vPassword);
    $consulta="SELECT id_Usuario,Nombre_Director FROM usuario
    	       WHERE  Nombre_Director = '$vLogin' AND pass = '$vPassword'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();

			$row['resultado']  = '0';
			$row['informacion']= 'Login Correcto';
			$row['mensaje']    = 'Acceso Concecido';
			$row['detalle']    = 'Bienvenid@ '.$registro['Nombre_Director'].' ';

            session_start();
            $_SESSION['id_Usuario']=$registro['id_Usuario'];
            $_SESSION['Nombre_Director']=$registro['Nombre_Director'];

    } else  {
        $row['resultado']  = '1';
        $row['informacion']= 'Login Incorrecto';
        $row['mensaje']    = 'Acceso Negado';
        $row['detalle']    = 'Usuario y/o Password Incorrecto';
    }

    $link->close();
}


 //var_dump($row);


$encoded_row = array_map('utf8_encode',$row);


echo json_encode($encoded_row);

?>