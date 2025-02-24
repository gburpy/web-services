<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .container {
      background: white;
      padding: 3rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 400px;
      animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 1rem;
    }

    p {
      font-size: 1.2rem;
      color: #666;
    }

    .result {
      font-size: 2rem;
      font-weight: bold;
      color: #007BFF;
      background: #EAF2FF;
      padding: 10px;
      border-radius: 8px;
      margin-top: 10px;
    }

    .back-button {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 20px;
      font-size: 1rem;
      color: white;
      background: #007BFF;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      transition: background 0.3s;
    }

    .back-button:hover {
      background: #0056b3;
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
  </style>
</head>

<body>
  <div class="container">
    <h2><?php echo $saludo; ?></h2>
    <p>El resultado de <b><?php echo "$numero1 $operador $numero2"; ?></b> es:</p>
    <div class="result">
      <?php echo $resultado; ?>
    </div>
    <a href="index.php" class="back-button">Volver</a>
  </div>
</body>

</html>