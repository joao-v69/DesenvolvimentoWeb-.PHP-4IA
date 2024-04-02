<?php

   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '';
$bdBanco = 'tarefas';


$link = mysql_connect('localhost', 'root', 'root');
mysql_set_charset('utf8',$link);

if (!$link) {
   die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);

function buscar_tarefas($link) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($link, $sqlBusca);


    $tarefas = array();


    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }


    return $tarefas;
}


function gravar_tarefa($link, $tarefa) {
    $sqlGravar = "
        INSERT INTO tarefas
        (nome, descricao, prioridade, prazo, concluida)
        VALUES
        (
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            {$tarefa['prioridade']},
            '{$tarefa['prazo']}',
            {$tarefa['concluida']}
        )
    ";


    mysqli_query($link, $sqlGravar);
}
?>
