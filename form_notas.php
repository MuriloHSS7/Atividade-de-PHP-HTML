<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculando a média de notas</title>
</head>
<body>

<h2>Informe o nome e as notas do aluno:</h2>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>Informe o seu nome</p><input type="text" name="nome">
    <p>Informe a 1º nota</p><input type="text" name="nota1">
    <p>Informe a 2º nota</p><input type="text" name="nota2">
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nome']) && isset($_GET['nota1']) && isset($_GET['nota2'])) {
    // Obtém os valores do formulário e converte para números
    $nome = $_GET['nome'];
    $nota1 = floatval($_GET['nota1']);
    $nota2 = floatval($_GET['nota2']);

    // Valida se as notas são números válidos
    if (!is_numeric($nota1) || !is_numeric($nota2)) {
        echo "<h3>Por favor, insira notas válidas.</h3>";
    } else {
        // Calcula a média das notas
        $media = ($nota1 + $nota2) / 2;

        echo "<h3>Nome do Aluno: $nome</h3>";
        echo "<h3>Nota 1: $nota1</h3>";
        echo "<h3>Nota 2: $nota2</h3>";
        echo "<h3>Média: $media</h3>";

        // Decide se o aluno foi aprovado, reprovado ou precisa fazer o exame final
        if ($media >= 6) {
            echo "<h3>Aluno aprovado!</h3>";
        } elseif ($media >= 4 && $media < 6) {
            echo "<h3>Aluno em exame final.</h3>";
        } else {
            echo "<h3>Aluno reprovado.</h3>";
        }
    }
}
?>
</body>
</html>