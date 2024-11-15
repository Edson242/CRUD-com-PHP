<?php
include "../db/db.php";

// Recebimento dos dados
$nome = $_POST["name"];
$email = $_POST["email"];
$senha = password_hash($_POST["password"], PASSWORD_BCRYPT);

// Execução no DB
$query = "INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $senha);

if (mysqli_stmt_execute($stmt)) {
    header("location: ../views/login.html");
    echo '<script>alert("✅ Usuário inserido com sucesso !")</script>';
} else {
    header("location: ../views/register.html");
    echo '<script>alert("❌ Erro ao inserir o usuário Tente novamente !")</script>';
}
mysqli_stmt_close($stmt);
