<?php
include "../db/db.php";

// Recebendo dados
$id = $_POST['id'];
$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['password'];

// Se a senha for alterada, criptografe a senha antes de salvar
if (!empty($senha)) {
    // Execução no DB
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $query = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $nome, $email, $senhaHash, $id);
} else {
    // Execução no DB
    $query = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssi', $nome, $email, $id);
}

if (mysqli_stmt_execute($stmt)) {
    echo '<script>alert("✅ Usuário atualizado com sucesso!"); window.location.href="../../index.php";</script>';
} else {
    echo '<script>alert("❌ Erro ao atualizar o usuário.");</script>';
}

mysqli_stmt_close($stmt);
