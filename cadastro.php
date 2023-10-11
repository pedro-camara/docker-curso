// Conexão com o banco de dados (você pode incluir o arquivo db-connect.php aqui)
// ...
<?php
if (isset($_POST['submit'])) {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // Execute uma consulta SQL preparada para inserir os dados no banco
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        // Redirecione o usuário para a página de login após o cadastro
        header("Location: login.php");
        exit();
    } else {
        // Trate qualquer erro de inserção
        echo "Erro ao cadastrar: " . $mysqli->error;
    }
}
?>
