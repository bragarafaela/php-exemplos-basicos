<?php

// Criando variáveis
$idade =19;
$temDocumento =false;

// Estrutura de decisão (Operador E)
if ($idade >= 18 && $temDocumento) {
    echo "Pode tirar a carteira";
} else {
    echo "Não pode tirar a carteira";
}

// Estrutura de decisão (Operador E)
if ($idade >= 18 || $temDocumento) {
    echo "\nPode tirar a carteira";
} else {
    echo "Não pode tirar a carteira";
}

// Operador negado !
$presente = false;

if (!$presente) {
    echo "\n0 aluno está presente";
} else {
    echo "\n0 aluno está ausente";
}

