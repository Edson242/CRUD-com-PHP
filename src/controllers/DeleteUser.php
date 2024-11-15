<?php 
// Recebendo dados
$post = json_decode(file_get_contents('php://input'), true);

// Função para deletar o usuário baseado no ID
function DeleteUser($usuario) {
    include "../db/db.php";
    session_start();

    // Valida se o usuário não está apagando ele mesmo
    if(intval($usuario) === intval($_SESSION['id_us'])) {
        echo '<script>alert("❌ Você não pode deletar o usuário em que você está logado!")</script>';
        return;
    }

    // Execução no DB
    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $usuario);

    // Executa a query e verifica se teve sucesso
    if (mysqli_stmt_execute($stmt)) {

        exit(json_encode(array("status" => true)));
        echo '<script>alert("✅ Usuário deletado com sucesso!")</script>';

    } else {

        exit(json_encode(array("status" => false)));
        echo '<script>alert("❌ Erro ao deletar usuário!")</script>';
    }

    mysqli_stmt_close($stmt);
}

DeleteUser($post['idUser']);
?>
