<?php
// Página restrita.
session_start();


// Verifica se o usuário está logado.
if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

$cor_fundo = isset($_SESSION['cor']) ? $_SESSION ['cor'] : '#ffffff';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body style="background-color: <?php echo $cor_fundo; ?>;">


    <h2>Bem-vindo ao seu perfil, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p>Esta é a sua página personalizada de perfil.</p>


    <br>
    <a href="15d_logout.php">Logout</a>


</body>
</html>