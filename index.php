<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação do Ano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            margin: 0;
            transition: background-color 0.5s ease;
        }
        img {
            max-width: 300px;
            margin-top: 20px;
        }
    </style>
</head>
<body style="background-color: 
<?php

echo isset($_POST['cor_fundo']) ? $_POST['cor_fundo'] : '#ffffff';
?>">

    <h1>Descubra a Estação do Ano</h1>
    <form method="POST">
        <label for="data">Selecione uma data:</label>
        <input type="date" id="data" name="data" required>
        <button type="submit">Ver Estação</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['data'])) {
        $data = $_POST['data'];
        $dia = (int)date('d', strtotime($data));
        $mes = (int)date('m', strtotime($data));

        
        $estacao = '';
        $imagem = '';
        $corFundo = '';

        if (($mes == 12 && $dia >= 21) || $mes == 1 || $mes == 2 || ($mes == 3 && $dia < 20)) {
            $estacao = 'Verão';
            $imagem = 'https://www.blusaude.com.br/images/blog/verao-alimentacao.jpg'; 
            $corFundo = '#FFD700'; 
        } elseif (($mes == 3 && $dia >= 20) || $mes == 4 || $mes == 5 || ($mes == 6 && $dia < 21)) {
            $estacao = 'Outono';
            $imagem = 'https://static.mundoeducacao.uol.com.br/mundoeducacao/2020/11/folhas.jpg'; 
            $corFundo = '#FF8C00'; 
        } elseif (($mes == 6 && $dia >= 21) || $mes == 7 || $mes == 8 || ($mes == 9 && $dia < 23)) {
            $estacao = 'Inverno';
            $imagem = 'https://www.infoescola.com/wp-content/uploads/2008/10/inverno-450x334.jpg';
            $corFundo = '#87CEFA';
        } elseif (($mes == 9 && $dia >= 23) || $mes == 10 || $mes == 11 || ($mes == 12 && $dia < 21)) {
            $estacao = 'Primavera';
            $imagem = 'https://www.clinicameitan.com.br/wp-content/uploads/primavera-caracteristicas-periodo-e-curiosidades.jpg'; 
            $corFundo = '#98FB98'; 
        }

        
        echo "<script>
            document.body.style.backgroundColor = '$corFundo';
        </script>";

        
        echo "<h2>Estação: $estacao</h2>";
        echo "<img src='$imagem' alt='Imagem da estação: $estacao'>";
        echo "<form method='POST'><input type='hidden' name='cor_fundo' value='$corFundo'></form>";
    }
    ?>
</body>
</html>