<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Painel</title>
</head>
<body class="bg-cover center body-main">
<div class=" p-20 bg-gray-800 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-50 border-gray-100 text-center flex items-center justify-center">
    <p class="text-white"> Bem vindo ao Painel, <?php echo $_SESSION['nome'] ?></p>
    <div class="absolute top-4 right-4">
        <a href="logout.php" class="text-white hover:text-blue-700">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</div>

</body>
</html>