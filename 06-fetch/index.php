<?php
/**
 * fetch
 * Geralmente utilizado quando é retornado apenas um registro.
 * FETCH_ASSOC - Devolve os dados no formato associativo (índice com nome e valor)
 * FETCH_BOTH  - (Padrão) - Devolve os dados no formato de índice associativo e numérico
 * FETCH_OBJ   - Devolve as informações no formato de objeto (stdClass)
 * FETCH_CLASS - Nesse caso a sua utilização diferencia do método fetchAll.
 *               Exemplos no link: https://phpdelusions.net/pdo/objects
 */

try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');

    $query = 'SELECT * FROM `products` WHERE id = ' . rand(1, 6) . ';';
    $statement = $oPdo->query($query);
    $list = $statement->fetch(PDO::FETCH_ASSOC);

    $statement = $oPdo->query($query);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Product');
    $product = $statement->fetch();

    echo '<pre>';
    var_dump($statement, $list, $product, $product->getId(), $product->getDescription());
    echo '</pre>';

} catch(\PDOException $exception) {
    echo 'Error!<br>Message: ', $exception->getMessage(), '<br>Code: ', $exception->getCode();
}

class Product
{
    private $id, $description, $name;

    public function getId() : int
    {
        return (int)$this->id;
    }

    public function getDescription() : string
    {
        return trim($this->description);
    }

    public function getName() : string
    {
        return trim($this->name);
    }
}