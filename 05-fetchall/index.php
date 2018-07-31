<?php
/**
 * fetchAll
 * FETCH_ASSOC - Devolve os dados no formato associativo (índice com nome e valor)
 * FETCH_BOTH  - (Padrão) - Devolve os dados no formato de índice associativo e numérico
 * FETCH_OBJ   - Devolve as informações no formato de objeto (stdClass)
 * FETCH_CLASS - Devolve as informações no formato de objeto. O mesmo recebe um segundo argumento, que indica o arquivo da
 *               classe que desejamos setar, caso não seja indicado o argumento será retornado um stdClass.
 */

try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');

    $query = 'SELECT * FROM `products`';
    $statement = $oPdo->query($query);
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement = $oPdo->query($query);
    $products = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');

    $product = $products[0];

    echo '<pre>';
    var_dump($statement, $list, $products, $product->getId(), $product->getDescription());
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