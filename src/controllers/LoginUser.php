<?php
include "../db/db.php";

// Recebendo dados
$username = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

// Execução no DB
$query = "SELECT * FROM usuarios WHERE usuarios.nome = '$username';";
$process = mysqli_query($connection, $query);
$db = $process->fetch_assoc();

// MApeando dados 
$nomeDB = $db["nome"];
$emailDB = $db["email"];
$senhaDB = $db["senha"];

// Validação do
$ID = "SELECT usuarios.id FROM usuarios WHERE usuarios.nome = '$username';";
$id = mysqli_query($connection, $ID)->fetch_assoc();
$id = implode(', ', $id);

if ($username == $nomeDB && $email == $emailDB && password_verify($password, $senhaDB)) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['usuario'] = $username;
    $_SESSION['id_us'] = $id;
    header("location: ../../index.php");
    exit();
} else {
    echo '<script>alert("❌ Usuário ou Senha inválido! Tente novamente!")</script>';
    echo '<script>window.location.href = document.referrer;</script>';
}
