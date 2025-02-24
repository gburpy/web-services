<?php


require('conn.php');

class serverSoap extends Connection
{

  public function saludar($name)
  {
    return 'Hola ' . $name . '!';
  }

  public function operacion($num1, $num2)
  {
    return $num1 + $num2;
  }

  public function analisis($num1, $num2, $operador)
  {
    if (!in_array($operador, ['+', '-', '*', '/', '%'])) {
      return "Operador inválido";
    }

    return eval ("return $num1 $operador $num2;");

  }

  public function getProduct()
  {

    $query = "SELECT * FROM producto";

    $result = mysqli_query($this->db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      return $row['nombre'];
    }

    $result->close();
  }

  public function validarUsuario($USUARIO, $CLAVE)
  {

    $consulta = "SELECT * FROM USUARIOS WHERE USUARIO = '$USUARIO' AND CLAVE = '$CLAVE'";

    $resultado = $this->db->query($consulta);

    if ($resultado->num_rows > 0) {

      return "Los datos son validos";
    } else {

      return "Los datos no coinciden con nada";
    }


  }

}

$options = array('uri' => 'http://localhost/web-services/part-2/');
$server = new SoapServer(NULL, $options);
$server->setClass('serverSoap');
$server->handle();

?>