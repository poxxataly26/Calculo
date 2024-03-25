<!DOCTYPE html>
<html>
<head>
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
     <h2>Calculadora de Salário para Vendedores</h2>
    <form method="post" action="">
        <label for="nome">Nome do Vendedor:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="meta_semanal">Meta Semanal (R$):</label><br>
        <input type="number" id="meta_semanal" name="meta_semanal" required><br><br>

        <label for="meta_mensal">Meta Mensal (R$):</label><br>
        <input type="number" id="meta_mensal" name="meta_mensal" required><br><br>

        <button type="submit">Calcular Salário</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $meta_semanal = $_POST['meta_semanal'];
        $meta_mensal = $_POST['meta_mensal'];

        $salario_minimo = 1500;
        $meta_semanal_alcancada = $meta_semanal >= 20000; 
        $meta_mensal_alcancada = $meta_mensal >= 80000; 
        $excedente_semanal = $meta_semanal - 20000; 
        $excedente_mensal = $meta_mensal - 80000; 
        
        $bonus_semanal = $meta_semanal_alcancada ? ($meta_semanal * 0.01) : 0; 
        $bonus_excedente_semanal = $meta_semanal_alcancada ? ($excedente_semanal * 0.05) : 0; 
        $bonus_excedente_mensal = $meta_mensal_alcancada ? ($excedente_mensal * 0.10) : 0;

        $salario_final = $salario_minimo + $bonus_semanal + $bonus_excedente_semanal + $bonus_excedente_mensal;

        echo "<h3>Resultado para $nome:</h3>";
        echo "Salário Final: R$ " . number_format($salario_final, 2, ',', '.');
    }
    ?>
</body>
</html>