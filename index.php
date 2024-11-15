<?php

include "src/db/db.php";
session_start();

// Verifique se o usuário está logado
if ($_SESSION['logged'] == false) {
  header("Location: ./src/views/login.html");
  exit();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="https://www.sysmo.com.br/Site/Resources/Assets/img/favicon/favicon.ico" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="src/js/script.js"></script>
  <title>Sysmo</title>
</head>

<body class="bg-gray-100 text-gray-800 font-sans flex flex-col min-h-screen">

  <div class="container mx-auto p-6 flex-grow">

    <div class="bg-white shadow-md rounded-lg p-6 mb-6 flex justify-between items-center">
      <h1 class="text-3xl font-semibold text-gray-800">Seja Bem-Vindo, <?php echo $_SESSION['usuario']; ?>!</h1>
      <a href="src/controllers/LogoutUser.php">
        <button id="logout" class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
          Logout
        </button>
      </a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Lista de Usuários</h2>
      <table class="min-w-full table-auto">
        <thead>
          <tr>
            <th class="px-4 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-700">Nome</th>
            <th class="px-4 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-700">Email</th>
            <th colspan="2" class="px-4 py-2 bg-gray-200 text-center text-sm font-semibold text-gray-700">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Busca os usuários no DB
          $sql = "SELECT * FROM usuarios";
          $result = mysqli_query($connection, $sql);

          $dadosUsuario = [];
          while ($dados = $result->fetch_assoc()) {
            $dadosUsuario[] = $dados;
          }

          // Mapeia os usuários para exibir
          foreach ($dadosUsuario as $key => $valor) {
            $nome = json_encode($valor["nome"]);
            $email = json_encode($valor["email"]);
            $senha = json_encode($valor["senha"]);

            echo "<tr class='border-t hover:bg-gray-50'>";
            echo "<td class='px-4 py-2'>" . $valor["nome"] . "</td>";
            echo "<td class='px-4 py-2'>" . $valor["email"] . "</td>";
            echo "<td class='py-2 text-center'>
                    <button onclick='editUser(" . $valor["id"] . ", " . $nome . ", " . $email . ")' class='bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition-colors duration-300'>
                      Editar
                    </button>
                  </td>";
            echo "<td class='py-2 text-center'>
                    <button onclick='deleteUser(" . $valor["id"] . ")' class='bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors duration-300'>
                      Excluir
                    </button>
                  </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

  </div>

  <footer class="bg-gray-800 text-white py-4 mt-auto">
    <div class="container mx-auto px-4">
      <p class="text-center text-sm">
        Site desenvolvido por
        <a href="https://github.com/Edson242" target="_blank" class="text-blue-400 font-semibold hover:text-blue-600 transition duration-300">Edson Silveira</a>
        para teste Dev Full Stack
        <a href="https://sysmo.com.br/" class="text-blue-400 hover:text-blue-600 transition duration-300" target="_blank">Sysmo Sistemas</a> &reg;
      </p>
      <p class="text-center text-xs text-gray-400 mt-4">© 2024 Todos os direitos reservados.</p>
    </div>
  </footer>

</body>

</html>