<?php
/**
 * QUERY ON THE RUN
 */

try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');

    $query = 'SELECT * FROM `products`;';

    foreach($oPdo->query($query) as $product) {
        echo $product['id'], ' | Description: ', $product['description'], ' | Name: ', $product['name'], '<br>';
    }

} catch(\PDOException $exception) {
    echo 'Error!<br>Message: ', $exception->getMessage(), '<br>Code: ', $exception->getCode();
}