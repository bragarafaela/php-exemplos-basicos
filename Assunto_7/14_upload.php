<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <?php
    //Cria e deixa vazia a variável de destino (pasta)
    $diretorio_destino = null;


    //Verifica envio do formulário
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Pasta onde as imagens serão salvas
        $diretorio_destino = 'uploads/';
    }
     //Se o diretório não existir
    if(!is_dir($diretorio_destino)) {
        //Cria a pasta com permissões 
        //de acesso total (código 0777) e possibilidade 
        //de criação de sub-pastas opção true
        mkdir($diretorio_destino, 0777, true);
    }
    // Armazenar apenas o nome da base do arquivo (EX: foto.jpg)
    $nome_arquivo = basename($_FILES['imagem']['name']);


    // Constrói o caminho completo (EX: uploads/foto.jpg)
    $caminho_completo = $diretorio_destino . $nome_arquivo;
     
    // Move o arquivo para a pasta onde será armazenada
    if(move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
        echo"<p>Upload realizado com sucesso!</p>";
        echo"<img src='$caminho_completo' alt='Imagem enviada' style='max-width: 300px;'>";
} else {
    echo"<p>Erro ao fazer upload do arquivo.</p>";
}
    ?>
</body>
</html>