<?php
$Usuario= $_GET['Usuario'];
$Password= $_GET['Contra'];

session_start();
$_SESSION['Login']=$Usuario;

?>