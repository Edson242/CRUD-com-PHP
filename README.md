# Sistema de Cadastro e Autenticação em PHP

Este projeto é uma aplicação simples de gerenciamento de usuários, construída utilizando **PHP**, **JavaScript**, **HTML** e **Tailwind CSS**, com um banco de dados **MySQL**. A aplicação implementa operações CRUD (Criar, Ler, Atualizar, Deletar) para gerenciar os usuários, incluindo funcionalidades de cadastro, login, listagem de usuários, edição e exclusão.

## Tecnologias Utilizadas

- **PHP**: Backend da aplicação, responsável pelo processamento de dados e interação com o banco de dados.
- **JavaScript**: Usado para interação dinâmica com o front-end e manipulação de eventos.
- **HTML**: Estruturação da página web.
- **Tailwind CSS**: Framework CSS utilizado para estilizar a aplicação de maneira moderna e responsiva.
- **MySQL**: Banco de dados para armazenar as informações dos usuários.
  
## Funcionalidades

- **Página de Cadastro**: Permite que novos usuários se cadastrem na aplicação com um nome, e-mail e senha.
- **Página de Login**: Usuários podem realizar login com suas credenciais (nome de usuário e senha).
- **Listagem de Usuários**: Visualização dos usuários cadastrados com a opção de editar ou excluir registros.
- **Edição de Usuários**: Funcionalidade que permite a atualização dos dados de um usuário.
- **Exclusão de Usuários**: Permite deletar um usuário do sistema.
  
## Segurança

- **Proteção contra SQL Injection**: A aplicação utiliza consultas preparadas para garantir que os dados inseridos pelos usuários sejam seguros, evitando vulnerabilidades como SQL Injection.

## Estrutura do Projeto

O projeto possui a seguinte estrutura de diretórios:

/root
│
├── /src
│   ├── /controllers       # Controladores responsáveis pelas ações (login, cadastro, etc.)
│   ├── /db                # Arquivos de conexão com o banco de dados
│   ├── /js                # Scripts JavaScript
│   └── /views             # Arquivos de visualização (HTML)
│
├── /assets                # Imagens e outros recursos estáticos
│
├── edit.php               # Página edição com PHP
└── index.php              # Página inicial da aplicação

## Como Rodar a Aplicação

### Pré-requisitos

- **PHP 7.4+**
- **MySQL**
- **Servidor Web (Apache ou Nginx)**

### Passos para Execução

1. **Configuração do Banco de Dados**:

   - Crie um banco de dados no MySQL.
   - Importe o arquivo SQL para criar as tabelas necessárias (caso fornecido).

2. **Configuração de Conexão com o Banco de Dados**:

   - Abra o arquivo `src/db/db.php` e configure as credenciais do banco de dados (como nome do banco, usuário e senha).

3. **Iniciar o Servidor PHP**:

   Execute o seguinte comando para iniciar o servidor PHP embutido:

   ```bash
   php -S localhost:8000

4. **Acesse a aplicação no navegor em**:

  http://localhost:8000