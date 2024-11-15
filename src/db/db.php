<?php
$servername = "localhost";
$username = "root"; 
$password = "";      
$dbname = "sysmo";  

// Criar conexão
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexão
if (!$connection) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
