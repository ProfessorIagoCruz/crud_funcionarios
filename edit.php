<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_contratacao = $_POST['data_contratacao'];
    $data_desligamento = $_POST['data_desligamento'];
    $data_aniversario = $_POST['data_aniversario'];
    $valor_salarial = $_POST['valor_salarial'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $stmt = $pdo->prepare("UPDATE funcionarios SET nome = ?, sobrenome = ?, data_contratacao = ?, data_desligamento = ?, data_aniversario = ?, valor_salarial = ?, email = ?, cpf = ? WHERE id = ?");
    $stmt->execute([$nome, $sobrenome, $data_contratacao, $data_desligamento, $data_aniversario, $valor_salarial, $email, $cpf, $id]);

    header('Location: index.php');
}

$stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE id = ?");
$stmt->execute([$id]);
$funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Funcionário</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($funcionario['nome']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo htmlspecialchars($funcionario['sobrenome']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_contratacao" class="form-label">Data de Contratação</label>
                <input type="date" class="form-control" id="data_contratacao" name="data_contratacao" value="<?php echo htmlspecialchars($funcionario['data_contratacao']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_desligamento" class="form-label">Data de Desligamento</label>
                <input type="date" class="form-control" id="data_desligamento" name="data_desligamento" value="<?php echo htmlspecialchars($funcionario['data_desligamento']); ?>">
            </div>
            <div class="mb-3">
                <label for="data_aniversario" class="form-label">Data de Aniversário</label>
                <input type="date" class="form-control" id="data_aniversario" name="data_aniversario" value="<?php echo htmlspecialchars($funcionario['data_aniversario']); ?>">
            </div>
            <div class="mb-3">
                <label for="valor_salarial" class="form-label">Valor Salarial</label>
                <input type="number" step="0.01" class="form-control" id="valor_salarial" name="valor_salarial" value="<?php echo htmlspecialchars($funcionario['valor_salarial']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($funcionario['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($funcionario['cpf']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
