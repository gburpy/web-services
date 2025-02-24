<?php

$options = array(
  'location' => 'http://localhost:8000/web-services/part-2/server.php',
  'uri' => 'http://localhost:8000/web-services/part-2/'
);

$client = new SoapClient(NULL, $options);

$usuarios = $_POST['username'];
$claves = $_POST['password'];

$resultado = $client->validarUsuario($usuarios, $claves);

?><!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(to right, #74b9ff, #0984e3);
      font-family: 'Poppins', sans-serif;
    }

    .container {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
      text-align: center;
      width: 90%;
      max-width: 420px;
      animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
      color: #2d3436;
      font-size: 24px;
      margin-bottom: 15px;
      font-weight: 600;
    }

    .message {
      font-size: 18px;
      font-weight: bold;
      padding: 15px;
      border-radius: 8px;
      width: 100%;
      margin-top: 15px;
      text-align: center;
      opacity: 0;
      transform: translateY(-10px);
      animation: fadeInUp 0.5s ease-in-out forwards;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border: 2px solid #c3e6cb;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 2px solid #f5c6cb;
    }

    .hidden {
      display: none;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 24px;
      font-size: 16px;
      text-decoration: none;
      color: white;
      background: #0984e3;
      border-radius: 8px;
      transition: all 0.3s ease-in-out;
      font-weight: 500;
    }

    .btn:hover {
      background: #0652DD;
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>Iniciar Sesión</h2>
    <form action="client.php" method="POST">
      <label for="username">Usuario</label>
      <input type="text" name="username" id="username" required>

      <label for="password">Clave</label>
      <input type="password" name="password" id="password" required>

      <button type="submit" class="btn">Mandar</button>
    </form>
  </div>

</body>

</html>