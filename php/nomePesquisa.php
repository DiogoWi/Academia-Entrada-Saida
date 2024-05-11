<?php
    $nome = file_get_contents("php://input");

    $conexao = mysqli_connect('localhost', 'root', '', 'academia');
    $cSQL = "SELECT nome, entrada_saida, data_hora FROM pessoas WHERE nome LIKE '$nome%' ORDER BY nome";

    $dados = mysqli_query($conexao, $cSQL);
    $pessoas = "";

    foreach ($dados as $registro):
        $pessoas .=  "<tr>".
                        "<td><img src='img/cliente.jpg' alt='foto usuário'></td>".
                        "<td>".$registro['nome']."</td>".
                        "<td>".$registro['entrada_saida']."</td>".
                        "<td>".$registro['data_hora']."</td>".
                    "</tr>";
    endforeach;

    mysqli_free_result($dados);
    mysqli_close($conexao);

    echo $pessoas;
?>