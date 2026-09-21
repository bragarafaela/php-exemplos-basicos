<?php

$media = $_GET["media"];
$faltas = $_GET["faltas"];

if (isset($media) && (isset($faltas))) {
    $media = (float)$media;
    $faltas = (float)$faltas;
    if (($media >= 6) && ($faltas <= 15)) {
        echo "Aprovado!";
    } else {
        echo "Reprovado!";
    }
} else {
    echo "Por favor, forneça os valores.";
}
?>