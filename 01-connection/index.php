<?php
    $oPdo = new \PDO('mysql:host=mysql;dbname=phppdo;', 'root', 'root');
    echo '<pre>';
    print_r($oPdo);
    echo '</pre>';