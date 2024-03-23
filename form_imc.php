<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculando o IMC</title>
</head>
<body>
    
<h2>Calculadora de IMC</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="peso">Peso (kg):</label><br>
        <input type="number" step="0.01" id="peso" name="peso"><br><br>
        <label for="altura">Altura (metros):</label><br>
        <input type="number" step="0.01" id="altura" name="altura"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    // Função para calcular o IMC
    function calcularIMC($peso, $altura) {
        return $peso / ($altura * $altura);
    }

    // Verifica se os dados foram submetidos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores do formulário
        $nome = $_POST['nome'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Calcula o IMC
        $imc = calcularIMC($peso, $altura);

        // Exibe o IMC e a classificação correspondente
        echo "<p>$nome, seu IMC é: " . number_format($imc, 2) . ". ";

        if ($imc < 18.5) {
            echo "Você está abaixo do peso.</p>";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            echo "Você está com peso normal.</p>";
        } elseif ($imc >= 24.9 && $imc < 29.9) {
            echo "Você está acima do peso.</p>";
        } elseif ($imc >= 29.9 && $imc < 34.9) {
            echo "Você está com obesidade tipo I.</p>";
        } elseif ($imc >= 34.9 && $imc < 39.9) {
            echo "Você está com obesidade tipo II.</p>";
        } else {
            echo "Você está com obesidade tipo III.</p>";
        }
    }
    ?>


</body>
</html>