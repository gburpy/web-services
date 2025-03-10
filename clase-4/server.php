<?php
class Server
{
  private $num1;
  private $num2;
  private $result;


  public function Sum(int|float $num1 = null, int|float $num2 = null)
  {
    try {
      if (!is_numeric($num1) || !is_numeric($num2))
        throw new InvalidArgumentException('Error: los parámetros deben ser números.');

      $result = $num1 + $num2;

      return 'El resultado de la suma de ' . $num1 . ' + ' . $num2 . ' es ' . $result;

    } catch (InvalidArgumentException $err) {
      return [
        'Error ' => $err->getMessage(),
        'Código ' => $err->getCode(),
        'Línea ' => $err->getLine(),
      ];
    }
  }

  public function Substract(int|float $num1 = null, int|float $num2 = null)
  {
    try {
      if ($num1 === null || $num2 === null)
        throw new InvalidArgumentException('Error: los parámetros no pueden ser nulos.');

      $result = $num1 - $num2;
      return sprintf("%s - %s = %s", $num1, $num2, $result);

    } catch (InvalidArgumentException $err) {
      return [
        'Error' => $err->getMessage(),
        'Código' => $err->getCode(),
        'Línea' => $err->getLine(),
      ];
    }
  }
  public function Multiply(int|float $num1 = null, int|float $num2 = null)
  {
    try {
      if (!is_numeric($num1) || !is_numeric($num2))
        throw new InvalidArgumentException('Error: los parámetros deben ser números.');

      $result = $num1 * $num2;

      return sprintf("%s * %s = %s", $num1, $num2, $result);

    } catch (InvalidArgumentException $err) {
      return [
        'Error' => $err->getMessage(),
        'Código' => $err->getCode(),
        'Línea' => $err->getLine(),
      ];
    }
  }

  public function Divide(int|float $num1 = null, int|float $num2 = null)
  {
    try {
      if (!is_numeric($num1) || !is_numeric($num2))
        return 'Los argumentos deben ser números.';


      if ($num2 === 0.0 || $num2 === 0)
        return 'No se puede dividir entre cero.';

      $result = $num1 / $num2;

      return sprintf("%s / %s = %s", $num1, $num2, $result);

    } catch (InvalidArgumentException $err) {
      return [
        'Error' => $err->getMessage(),
        'Código' => $err->getCode(),
        'Línea' => $err->getLine(),
      ];
    }
  }
}
