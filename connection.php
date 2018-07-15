<?php
try {
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');
    echo '<pre>';
    print_r($oPdo);
    echo '</pre>';
} catch(\PDOException $exception) {
    echo 'Error!<br>Message: ', $exception->getMessage(), '<br>Code: ', $exception->getCode();
}