// Função para deletar usuário
function deleteUser(id) {

    if (confirm("Tem certeza que deseja excluir este usuário?")) {
        fetch('src/controllers/DeleteUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                idUser: id
            })
        }).then(response => response.json())
        location.reload();
    }

}

// Função para editar usuário
function editUser(id, nome, email) {

    const url = `/edit.php?id=${id}&nome=${encodeURIComponent(nome)}&email=${encodeURIComponent(email)}`;
    window.location.href = url;
}
