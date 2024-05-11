<?php
    header('Content-Type: application/json; charset=utf-8');

    $json = json_decode(file_get_contents("php://input"), true);

    $nome = $json['nome'];
    $entradaSaida = $json['entrada_saida'];
    date_default_timezone_set('America/Sao_Paulo');
    $dataHora = date('Y-m-d H:i:s');

    $conexao = mysqli_connect('localhost', 'root', '', 'academia');
    $cSQL = "INSERT INTO pessoas (nome, entrada_saida, data_hora) VALUES ('$nome', '$entradaSaida', '$dataHora')";

    mysqli_query($conexao, $cSQL);
    mysqli_close($conexao);

    echo json_encode(["nome" => $nome, "entrada_saida" => $entradaSaida, "data_hora" => $dataHora]);
?>