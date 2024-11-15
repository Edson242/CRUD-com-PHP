<?php
include "src/db/db.php";
session_start();

// Verifique se o usuário está logado
if ($_SESSION['logged'] == false) {
    header("Location: login.html");
    exit();
}

// Verifique se os parâmetros estão presentes na URL
if (isset($_GET['id']) && isset($_GET['nome']) && isset($_GET['email'])) {
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];
} else {
    // Caso os parâmetros não estejam presentes, redirecione de volta para a lista de usuários
    header("Location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <div class="container mx-auto p-6">

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
      <h1 class="text-3xl font-semibold text-gray-800">Editar Usuário</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
      <form action="src/controllers/EditUser.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="mb-4">
          <label for="name" class="block text-sm font-semibold text-gray-700">Nome</label>
          <input type="text" id="name" name="name" value="<?php echo $nome; ?>" class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
          <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
          <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
          <label for="password" class="block text-sm font-semibold text-gray-700">Senha</label>
          <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300">Salvar</button>
        
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors duration-300" onclick="window.location.href = document.referrer;">Cancelar</button>
      </form>
    </div>

  </div>

</body>
</html>