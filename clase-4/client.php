<?php
require_once 'vendor/autoload.php';
require_once 'vendor/econea/nusoap/src/nusoap.php';

class MySOAPClient
{
  private $client;
  private $WSDL_URL = 'http://localhost/galvis-ws/clase-4/invoke.php?wsdl';

  public function __construct()
  {
    $this->client = new nusoap_client($this->WSDL_URL, true);

    $err = $this->client->getError();
    if ($err) {
      throw new Exception('Error en el constructor' . $err);
    }
  }

  public function sum(int|float $num1, int|float $num2)
  {
    $result = $this->client->call('Server.Sum', [
      'num1' => $num1,
      'num2' => $num2
    ]);

    if ($this->client->fault) {
      return ['error' => 'Fault', 'detail' => $result];
    } else {
      $err = $this->client->getError();
      if ($err) {
        return ['error' => 'Error', 'detail' => $err];
      } else {
        return ['result' => $result];
      }
    }
  }

  public function substract(int|float $num1, int|float $num2)
  {
    $result = $this->client->call('Server.Substract', [
      'num1' => $num1,
      'num2' => $num2
    ]);

    if ($this->client->fault) {
      return ['error' => 'Fault', 'detail' => $result];
    } else {
      $err = $this->client->getError();
      if ($err) {
        return ['error' => 'Error', 'detail' => $err];
      } else {
        return ['result' => $result];
      }
    }
  }

  public function multiply(int|float $num1, int|float $num2)
  {
    $result = $this->client->call('Server.Multiply', [
      'num1' => $num1,
      'num2' => $num2
    ]);

    if ($this->client->fault) {
      return ['error' => 'Fault', 'detail' => $result];
    } else {
      $err = $this->client->getError();
      if ($err) {
        return ['error' => 'Error', 'detail' => $err];
      } else {
        return ['result' => $result];
      }
    }
  }

  public function divide(int|float $num1, int|float $num2)
  {
    $result = $this->client->call('Server.Divide', [
      'num1' => $num1,
      'num2' => $num2
    ]);

    if ($this->client->fault) {
      return ['error' => 'Fault', 'detail' => $result];
    } else {
      $err = $this->client->getError();
      if ($err) {
        return ['error' => 'Error', 'detail' => $err];
      } else {
        return ['result' => $result];
      }
    }
  }
}

try {
  $SOAPClient = new MySOAPClient();
  $response = $SOAPClient->substract(6, 5);
  if (isset($response['error'])) {
    echo "<h2 style='color: red;'>Error</h2>";
    echo "<p><strong>Detalle:</strong> {$response['detail']}</p>";
  } else {
    echo "<h2 style='color: green;'>Resultado</h2>";
    echo "<p>{$response['result']}</p>";
  }
} catch (Exception $e) {
  echo '<h2>Error</h2><pre> ' . $e->getMessage() . '</pre>';
}