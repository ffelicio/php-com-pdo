<?php
/**
 * QUERY
 * Esse comando retorna um PDOStatement
 * O comando fetchAll retorna uma lista de dados contendo os dados conforme abaixo.
 * array(1) {
    [0]=>
        array(6) {
            ["id"] => string(1) "1"
            [0] => string(1) "1"
            ["description"] => string(10) "PHP Course"
            [1] => string(10) "PHP Course"
            ["name"] => string(31) "PHP course at the Schoof Of Net"
            [2] => string(31) "PHP course at the Schoof Of Net"
        }
    }
 * Os dados retornam no formato de array com índice associativo e numérico
 */

try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');

    $query = 'SELECT * FROM `products`';
    $statement = $oPdo->query($query);
    $list = $statement->fetchAll();

    echo '<pre>';
    var_dump($statement, $list);
    echo '</pre>';

} catch(\PDOException $exception) {
    echo 'Error!<br>Message: ', $exception->getMessage(), '<br>Code: ', $exception->getCode();
}