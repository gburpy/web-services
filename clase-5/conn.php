<?php

class Connection
{
  private $host = 'localhost';
  private $db = 'tienda';
  private $user = 'root';
  private $pswd = '';
  private $pdo;

  public function __construct()
  {
    try {
      $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->pswd);

      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
      die('Error en la conexión: ' . $err->getMessage());
    }
  }

  public function getConnection()
  {
    return $this->pdo;
  }
}