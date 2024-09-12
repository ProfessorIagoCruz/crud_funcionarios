<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_contratacao = $_POST['data_contratacao'];
    $data_desligamento = $_POST['data_desligamento'];
    $data_aniversario = $_POST['data_aniversario'];
    $valor_salarial = $_POST['valor_salarial'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, sobrenome, data_contratacao, data_desligamento, data_aniversario, valor_salarial, email, cpf) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $sobrenome, $data_contratacao, $data_desligamento, $data_aniversario, $valor_salarial, $email, $cpf]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Funcionário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
        .form-row {
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Funcionário</h1>
        <form method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="col-md-6">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="data_contratacao" class="form-label">Data de Contratação</label>
                    <input type="date" class="form-control" id="data_contratacao" name="data_contratacao" required>
                </div>
                <div class="col-md-4">
                    <label for="data_desligamento" class="form-label">Data de Desligamento</label>
                    <input type="date" class="form-control" id="data_desligamento" name="data_desligamento">
                </div>
                <div class="col-md-4">
                    <label for="data_aniversario" class="form-label">Data de Aniversário</label>
                    <input type="date" class="form-control" id="data_aniversario" name="data_aniversario">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="valor_salarial" class="form-label">Valor Salarial</label>
                    <input type="number" step="0.01" class="form-control" id="valor_salarial" name="valor_salarial" required>
                </div>
                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
