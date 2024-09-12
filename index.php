<?php
include 'db.php';

// Função para formatar datas
function formatar_data($data) {
    if ($data === '0000-00-00' || empty($data)) {
        return 'Em contrato';
    }
    return date('d/m/Y', strtotime($data));
}

// Função para formatar valor salarial
function formatar_valor($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}
// Ordenação
$ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'id';
$direcao = isset($_GET['direcao']) ? $_GET['direcao'] : 'asc';

$ordem_valida = ['id', 'nome', 'sobrenome', 'email', 'data_contratacao', 'data_desligamento', 
'data_aniversario', 'valor_salarial'];
if (!in_array($ordem, $ordem_valida)) {
    $ordem = 'id';
}

$direcao = $direcao === 'desc' ? 'desc' : 'asc';

// Consulta SQL com ordenação
$sql = "SELECT * FROM funcionarios ORDER BY $ordem $direcao";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Funcionários</h1>
        <a href="add.php" class="btn btn-primary mb-3">Adicionar Funcionário</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><a href="?ordem=id&direcao=<?php echo $direcao === 'asc' ? 'desc' : 'asc'; ?>">ID</a></th>
                    <th><a href="?ordem=nome&direcao=<?php echo $direcao === 'asc' ? 'desc' : 'asc'; ?>">Nome</a></th>
                    <th><a href="?ordem=sobrenome&direcao=<?php echo $direcao === 'asc' ? 'desc' : 'asc'; ?>">Sobrenome</a></th>
                    <th><a href="?ordem=email&direcao=<?php echo $direcao === 'asc' ? 'desc' : 'asc'; ?>">Email</a></th>
                    <th><a href="?ordem=data_contratacao&direcao=<?php echo $direcao === 'asc' ? 'desc' : 'asc'; ?>">Data de Contratação</a></th>
                    <th><a href="?ordem=data_desligamento&direcao=<?php echo $direcao === 'asc' ? 'desc' : 'asc'; ?>">Data de Desligamento</a></th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
                    $data_contratacao = formatar_data(data: $row['data_contratacao']);
                    $data_desligamento = formatar_data(data: $row['data_desligamento']);

                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['sobrenome']}</td>
                        <td>{$row['email']}</td>
                        <td>{$data_contratacao}</td>
                        <td>{$data_desligamento}</td>
                        <td>
                            <div class='btn-group'>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                            </div>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
