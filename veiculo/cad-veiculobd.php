<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $marca              = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_SPECIAL_CHARS);
    $modelo             = filter_input(INPUT_POST, "modelo", FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo               = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
    $carga              = filter_input(INPUT_POST, "carga", FILTER_SANITIZE_SPECIAL_CHARS);
    $renavam            = filter_input(INPUT_POST, "renavam", FILTER_SANITIZE_SPECIAL_CHARS);
    $placa              = filter_input(INPUT_POST, "placa", FILTER_SANITIZE_SPECIAL_CHARS);
    $conservacao        = filter_input(INPUT_POST, "conservacao", FILTER_SANITIZE_SPECIAL_CHARS);
    $licenciamento      = filter_input(INPUT_POST, "licenciamento", FILTER_SANITIZE_SPECIAL_CHARS);
    $combustivel        = filter_input(INPUT_POST, "combustivel", FILTER_SANITIZE_SPECIAL_CHARS);
    $ano                = filter_input(INPUT_POST, "ano", FILTER_SANITIZE_SPECIAL_CHARS);
    

    
    try {
        require_once('../_conexao.php');

        $comandoSQL = $conexao->prepare("
            INSERT INTO ecologistica.veiculo (
                `marca`,
                `modelo`
                `tipo`,
                `carga`
                `renavam`,
                `placa`,
                `conservacao`,
                `licenciamento`,
                `combustivel`,
                `ano`
            ) VALUES (
                :marca,
                :modelo,
                :tipo,
                :carga,
                :renavam,
                :placa,
                :conservacao,
                :licenciamento,
                :combustivel,
                :ano
            )
        ");

        $comandoSQL->bindParam(":marca", $marca, PDO::PARAM_STR);
        $comandoSQL->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $comandoSQL->bindParam(":tipo", $tipo, PDO::PARAM_STR);
        $comandoSQL->bindParam(":carga", $carga, PDO::PARAM_STR);
        $comandoSQL->bindParam(":renavam", $renavam, PDO::PARAM_STR);
        $comandoSQL->bindParam(":placa", $placa, PDO::PARAM_STR);
        $comandoSQL->bindParam(":conservacao", $consercacao, PDO::PARAM_STR);
        $comandoSQL->bindParam(":licenciamento", $licenciamento, PDO::PARAM_STR);
        $comandoSQL->bindParam(":combustivel", $combustivel, PDO::PARAM_STR);
        $comandoSQL->bindParam(":combustivel", $combustivel, PDO::PARAM_STR);
        $comandoSQL->bindParam(":ano", $ano, PDO::PARAM_STR);

        $comandoSQL->execute();

        if ($comandoSQL->rowCount() > 0) {
            header('Location: ./view-veiculo.php');
            exit();
        } else {
            echo "Erro no cadastro de veículos";
        }
    } catch (PDOException $erro) {
        echo "Erro no cadastro de veículos: " . $erro->getMessage();
    }
}