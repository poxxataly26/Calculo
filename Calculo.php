<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <title>Calculadora de Salário</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: SkyBlue;
    text-align: center;
}
.container {
    width: 50%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h2 {
    text-align: center;
    color: #333;
}
form {
    margin-top: 15px;
    text-align: center;
}
label {
    display: block;
    margin-bottom: 15px;
    color: #333;
}
input[type="text"],
input[type="number"],
button {
    width: 50%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid black;
    border-radius: 100px;
    box-sizing: border-box;
    text-align: center;
}
button {
    background-color: LightCyan;
    color: black;
    border: none;
    cursor: pointer;
}
button:hover {
    background-color: LightSkyBlue;
    background-color: PowderBlue;
}
.result {
    margin-top: 50px;
    text-align: center;
    font-size: 18px;
    color: #333;
}
    </style>

</head>
<body>
<h1>Calculadora de Salário</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome_vendedor">Nome do Vendedor:</label>
        <input type="text" id="nome_vendedor" name="nome_vendedor" required><br><br>
        <label for="meta_semanal">Meta Semanal (R$):</label>
        <input type="number" id="meta_semanal" name="meta_semanal" required><br><br>
        <label for="meta_mensal">Meta Mensal (R$):</label>
        <input type="number" id="meta_mensal" name="meta_mensal" required><br><br>
        <button type="submit">Calcular Salário</button>
    </form>

    <?php

function calcularSalario($metaSemanal, $metaMensal) {
    $salarioMinimo = 1500; 
    $bonusSemanal = ($metaSemanal / 100) * 1;
    $excedenteSemanal = max(0, $metaSemanal - 20000);
    $bonusExcedenteSemanal = ($excedenteSemanal / 100) * 5;
    if ($metaSemanal >= 20000 && $metaMensal >= 80000) {
        $excedenteMensal = max(0, $metaMensal - 80000);
        $bonusExcedenteMensal = ($excedenteMensal / 100) * 10;
    } else {
        $bonusExcedenteMensal = 0;
    }
    $salarioFinal = $salarioMinimo + $bonusSemanal + $bonusExcedenteSemanal + $bonusExcedenteMensal;
    return $salarioFinal;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $metaSemanal = $_POST["meta_semanal"];
    $metaMensal = $_POST["meta_mensal"];

    $salarioFinal = calcularSalario($metaSemanal, $metaMensal);

    echo "<h2>O salário final é: R$ " . number_format($salarioFinal, 2, ',', '.') . "</h2>";
}
?>
</body>
</html>