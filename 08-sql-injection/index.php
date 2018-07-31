<?php
/**
 * SQL INJECTION
 * Da forma abaixo há o risco de sql injection devido a não haver tratamento no recebimento do parâmetro vindo da url.
 * Caso o usuário conheça a estrutura de dados, o mesmo poderia fazer da seguinte forma caso queira apagar os dados das tabelas.
 * Exemplo:
 * SELECT * FROM `tabela` WHERE id = ' . $_GET['id']
 * ----> SELECT * FROM `tabela` WHERE id = 1' (valor vindo da url)
 * --------> SELECT * FROM `tabela` WHERE id = 1; delete from tabela;'. Nesta instrução há a exclusão de todos os registros da tabela.
 * Como não houve o tratamento, o usuário pode passar a instrução via url. Na instrução há a concatenação do recebimento do id com a
 * instrução delete.
 */

try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');

    $query = 'SELECT * FROM `products` WHERE id = ' . $_GET['id'];
    $statement = $oPdo->query($query);
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($statement, $list);
    echo '</pre>';

} catch(\PDOException $exception) {
    echo 'Error!<br>Message: ', $exception->getMessage(), '<br>Code: ', $exception->getCode();
}