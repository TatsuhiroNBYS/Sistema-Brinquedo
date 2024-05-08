<?php
    define("HOST","localhost");
    define("USUARIO","root");
    define("SENHA","");

    $conexao = new mysqli(HOST,USUARIO,SENHA);
    
    if($conexao->connect_error)
    {
        //A função die, significa que vamos matar o processo, encerrar o processo
        die("<pre>"."Não foi possível conectar-se ao MySQL. Favor contactar o Administrador !!!!". $conexao->error);
    }

    //Nome da base de dados que você deseja criar
    $nomeBD = 'provaa2_30653274_29729165_29921571_31473890_30347807';

    //Verificar se a base de dados existe
    $resultado = $conexao->query("SHOW DATABASES LIKE '$nomeBD'");

    if ($resultado->num_rows == 0){
        //Se a base de dados não existir, então a criaremos
        $sql = "CREATE DATABASE $nomeBD";

        if ($conexao->query($sql) === TRUE) {
            echo "Base de dados '$nomeBD' foi criada com sucesso.";
        } else {
            die("Erro ao criar a base de dados: ". $conexao->error);
        }
    }
    //Depois conectamos com a base de dados
    $conexao = new mysqli(HOST,USUARIO,SENHA, $nomeBD);

    if($conexao->error)
    {
        //A função die, significa que vamos matar o processo, encerrar o processo
        die("<pre>"."Não foi possível conectar-se ao MySQL. Favor contactar o Administrador !!!!". $conexao->error);
    }
?>