<?php

const DB_HOST = "localhost:3306";

const DB_NAME = "test";

const DB_USER = "root";

const DB_PASSWORD = "";

function getConnexion():PDO
{
   $pdo = new PDO(
       "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD
   );
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $pdo;
}
