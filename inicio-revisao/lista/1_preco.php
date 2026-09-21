<?php 
$preco = $_GET["preco"];
$quantidade = $_GET["quantidade"];

if (isset($preco) && isset($quantidade)) {
    $preco = (Float)$preco;
    $quantidade = (Float)$quantidade;

    $valorTotal = $preco * $quantidade;

    if ($valorTotal >= 200) {
        $desconto = (($valorTotal * 0.1) + $valorTotal);
        echo "Valor com desconto: $desconto <br>";
    } else {
        echo "valorTotal: $valorTotal <br>";
    }
} else {
    echo "Forneça os valores";
}
?>