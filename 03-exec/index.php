<?php
/**
 * EXEC
 * O comando serve para manipular e criar tabelas, inserir registros, atualizar dados, deletar tabelas ou registros.
 * Retorna o número de linhas afetadas.
 * Caso haja a exclusão de 3 registros de uma tabela, o comando irá retornar 3.
 */

try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');

    // $query = 'INSERT INTO `products`(name, description) VALUES ("Javascript Course", "Javascript Course at the School Of Net"), ("Erlang Course", "Erlang Course at the School Of Net");';

    $query = 'UPDATE `products` SET name = "Golang Course", description = "Golang Course at the School Of Net" WHERE id = 6;';

    $retorno = $oPdo->exec($query);
    print_r($retorno);
} catch(\PDOException $exception) {
    echo 'Error!<br>Message: ', $exception->getMessage(), '<br>Code: ', $exception->getCode();
}