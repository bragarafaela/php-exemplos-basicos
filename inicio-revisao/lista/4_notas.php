<?php

// notas dos 5 alunos
$notas = [7.5, 9.0, 5.5, 8.0, 10.0];
$soma = 0;
$maiorNota = $notas[0];
$menorNota = $notas[0];

foreach ($notas as $nota) {
    $soma += $nota;

    if ($nota > $maiorNota) {
        $maiorNota = $nota;
    }

    if ($nota < $menorNota) {
        $menorNota = $nota;
    }
}


$totalAlunos = count($notas);
$media = $soma / $totalAlunos;

?>