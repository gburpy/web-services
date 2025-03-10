<?php

require_once 'conn.php';

class Server
{
  private $db;

  public function __construct()
  {
    $this->db = (new Connection())->getConnection();
  }

  public function authenticate($token)
  {
    $validToken = '__my__secret__';
    return $token === $validToken;
  }

  public function getProducts($token)
  {
    if (!$this->authenticate($token))
      return [];

    $query = $this->db->query('SELECT id, nombre, precio, stock FROM productos');
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    return array_map(function ($product) {
      return [
        'id' => (int) $product['id'],
        'nombre' => $product['nombre'],
        'precio' => (float) $product['precio'],
        'stock' => (int) $product['stock']
      ];
    }, $products);
  }

  public function getProductById($id, $token)
  {
    if (!$this->authenticate($token))
      return [];

    $stmt = $this->db->prepare('SELECT id, nombre, precio, stock FROM productos WHERE id = ?');
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product)
      return [];

    return [
      'id' => (int) $product['id'],
      'nombre' => $product['nombre'],
      'precio' => (float) $product['precio'],
      'stock' => (int) $product['stock']
    ];
  }

  public function addProduct($name, $price, $stock, $token)
  {
    if (!$this->authenticate($token))
      return [];

    $query = $this->db->prepare('INSERT INTO productos (nombre, precio, stock) VALUES(?, ?, ?)');
    $query->execute([$name, $price, $stock]);
    $lastProductId = $this->db->lastInsertId();

    //in case you want to show the created product
    $newQuery = $this->db->prepare('SELECT id, nombre, precio, stock FROM productos WHERE id = ?');
    $newQuery->execute([$lastProductId]);

    //created product fetching
    $newProduct = $newQuery->fetch(PDO::FETCH_ASSOC);

    if (!$newProduct)
      return [];

    return [
      'id' => (int) $newProduct['id'],
      'nombre' => $newProduct['nombre'],
      'precio' => (float) $newProduct['precio'],
      'stock' => (int) $newProduct['stock']
    ];
  }

  public function updateProduct($token, $id, $name = null, $price = null, $stock = null)
  {
    if (!$this->authenticate($token))
      return [];

    $query = $this->db->prepare('SELECT * FROM productos WHERE id = ?');
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_ASSOC);

    if (!$product)
      return [];

    $updates = [];
    $params = [];

    if ($name !== null) {
      $updates[] = 'nombre = ?';
      $params[] = $name;
    }

    if ($price !== null) {
      $updates[] = 'precio = ?';
      $params[] = $price;
    }

    if ($stock !== null) {
      $updates[] = 'stock = ?';
      $params[] = $stock;
    }

    if (empty($updates))
      return 'No se proporcionaron cambios';

    $sql = 'UPDATE productos SET ' . implode(', ', $updates) . ' WHERE id = ?';
    $params[] = $id;

    $_query = $this->db->prepare($sql);
    $_query->execute($params);

    return ['success' => true, 'message' => 'Producto actualizado correctamente'];
  }
}
