<?php
$conexao = mysqli_connect('localhost', 'root', '', 'academia');
$cSQL = "SELECT nome, entrada_saida, data_hora FROM pessoas ORDER BY ID DESC";
$dados = mysqli_query($conexao, $cSQL);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/index.js" defer></script>
    <link rel="shortcut icon" href="img/academia.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <title>Academia</title>
</head>
<body>
    <h1>Academia Entrada/Saída</h1>
    <main>
        <div>
            <label>Filtrar por:</label>
            <button id="filtroNome">Nome</button>
            <button id="filtroData">Data</button>
            <input type="date" id="data">
            <input type="text" placeholder="Nome:" id="nomePesquisa">
        </div>

        <div>
            <label>Registrar Entrada/Saída:</label>
            <input type="text" placeholder="Nome:" id="nome">
            <select id="entradaSaida">
                <option value="Entrou">Entrou</option>
                <option value="Saiu">Saiu</option>
            </select>
            <button id="registrar">Registrar</button>
        </div>

        <section>
            <table>
                <thead>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Entrada/Saída</th>
                    <th>Data e Hora</th>
                </thead>
                <tbody id="tbody">
                    <?php
                        foreach ($dados as $registro):
                            echo "<tr>".
                                    "<td><img src='img/cliente.jpg' alt='foto usuário'></td>".
                                    "<td>".$registro['nome']."</td>".
                                    "<td>".$registro['entrada_saida']."</td>".
                                    "<td>".$registro['data_hora']."</td>".
                                 "</tr>";
                        endforeach;

                        mysqli_free_result($dados);
    
                        mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>