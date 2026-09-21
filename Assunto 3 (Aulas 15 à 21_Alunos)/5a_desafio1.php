<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>
    <style>
        h1 {
            font-family: serif;
            color: white;
        }
        body {
            background-image: url(https://videocdn.cdnpk.net/videos/dcc21591-6404-551f-bd92-8b1ef09aac36/horizontal/thumbnails/large.jpg?semt=ais_hybrid&item_id=3831219&w=740&q=80);
            background-size: cover;
            font-family: serif;
        }
        input[type="text"], input[type="number"] {
            background-color: #facce5; 
            border: 2px solid #FDFBF7; 
            padding: 5px;             
            border-radius: 2px;        
        }
        .sucesso { color: #d4edda; background-color: #155724; padding: 10px; margin-top: 10px; }
        .erro { color: #f8d7da; background-color: #721c24; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>

    <?php
    $mensagem = '';
    $statusClasse = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome'] ?? '');
        $anoNascimento = filter_input(INPUT_POST, 'ano_nascimento', FILTER_VALIDATE_INT);
        $anoAtual = (int) date('Y');

        if (!empty($nome) && $anoNascimento && $anoNascimento <= $anoAtual) {
            $idade = $anoAtual - $anoNascimento;

            if ($idade >= 18) {
                $mensagem = "Acesso permitido, " . htmlspecialchars($nome) . "!";
                $statusClasse = "sucesso";

                $registro = date('Y-m-d H:i:s') . " | Nome: {$nome} | Idade: {$idade} anos" . PHP_EOL;
                file_put_contents('log_acessos.txt', $registro, FILE_APPEND | LOCK_EX);
            } else {
                $mensagem = "Acesso negado, " . htmlspecialchars($nome) . "!";
                $statusClasse = "erro";
            }
        } else {
            $mensagem = "Por favor, preencha todos os campos corretamente.";
            $statusClasse = "erro";
        }
    }
    ?>

    <h1>Verificador de maioridade ₊˚⊹౨ৎ ₊˚⊹</h1>

    <!-- Formulario Único -->
    <form method="post" action="">
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required>

        <label for="ano_nascimento">Ano de nascimento: </label>
        <input type="number" id="ano_nascimento" name="ano_nascimento" required>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if (!empty($mensagem)): ?>
        <div class="<?= $statusClasse ?>">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

</body>
</html>