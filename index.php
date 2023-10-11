<?php
include('db-connect.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo "Preencha seu e-mail";
    }else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha";
    }else{

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            

        }else{
            echo "Falha no Login, E-mail ou Senha incorreto!";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Login</title>
</head>
<body class="center bg-gray-100 body-login">
    <div class=" p-20 bg-gray-800 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-50 border-gray-100 text-center animate-fadeIn">
        <h1 class="text-2xl font-semibold mb-4 text-white">LOGIN</h1>
        <form id="login-form" action="login.php" method="POST" class="mb-4">
            <p>
                <label for="username" class="text-white">E-mail</label>
                <input type="text" name="email" class="block mx-auto shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
            </p>
            <p>
                <label for="password" class="text-white">Senha</label>
                <input type="password" name="senha" class="block mx-auto shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
            </p>
            <p>
                <div class="flex justify-between">
                    <button type="submit" class="button mx-auto">Entrar</button>
                    <a href="#" class="button mx-auto" id="show-registration">Cadastre-se</a>
                </div>
            </p>
        </form>

        <form id="registration-form" action="cadastro.php" method="POST" class="mb-4 hidden">
            <p>
                <!-- Adicione campos de cadastro aqui -->
                <label for="username" class="text-white">Nome</label>
                <input type="text" name="nome" class="block mx-auto shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
                <label for="email" class="text-white">E-mail</label>
                <input type="text" name="nome" class="block mx-auto shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
                <label for="senha" class="text-white">Senha</label>
                <input type="password" name="nome" class="block mx-auto shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
                <label for="senha" class="text-white">Repita a Senha</label>
                <input type="password" name="nome" class="block mx-auto shadow appearance-none border rounded w-64 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br><br>
                
                <!-- Adicione mais campos, como email, senha, etc. -->
            </p>
            <p>
                <div class="flex justify-between">
                    <button type="submit" class="button mx-auto">Cadastrar</button>
                    <a href="#" class="button mx-auto" id="show-login">Voltar para o Login</a>
                </div>
            </p>
        </form>
    </div>

    <script>
        document.getElementById('show-registration').addEventListener('click', function() {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('registration-form').classList.remove('hidden');
        });

        document.getElementById('show-login').addEventListener('click', function() {
            document.getElementById('registration-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
        });
    </script>
</body>
</html>