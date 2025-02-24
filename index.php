<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
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

    form {
      background: white;
      padding: 3rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 400px;
      animation: fadeIn 0.5s ease-in-out;
    }

    label {
      display: block;
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #333;
    }

    input,
    select,
    button {
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      border-radius: 8px;
      border: 2px solid #ccc;
      margin-bottom: 10px;
      transition: all 0.3s ease-in-out;
    }

    input:focus,
    select:focus {
      border-color: #764ba2;
      outline: none;
      box-shadow: 0 0 8px rgba(118, 75, 162, 0.5);
    }

    button {
      background-color: #28a745;
      color: white;
      font-size: 1.2rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #218838;
    }

    #error {
      color: red;
      font-size: 0.9rem;
      display: none;
      margin-top: 5px;
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
  <form action="/web-services/client.php" method="POST">
    <label for="num1">Calculadora</label>
    <input type="text" name="num1" id="num1" required oninput="validarInput(this)"
      placeholder="Ingrese el primer número">
    <select name="operacion" id="operacion" required>
      <option value="">Seleccione una operación</option>
      <option value="+">Suma (+)</option>
      <option value="-">Resta (-)</option>
      <option value="*">Multiplicación (*)</option>
      <option value="/">División (/)</option>
    </select>
    <input type="text" name="num2" id="num2" required oninput="validarInput(this)"
      placeholder="Ingrese el segundo número">
    <button type="submit">Calcular</button>
    <p id="error">Solo se permiten números.</p>
  </form>
  <script>
    function validarInput(input) {
      const valor = input.value;
      const regex = /^[0-9]*$/;
      const mensajeError = document.getElementById("error");
      if (!regex.test(valor)) {
        mensajeError.style.display = "block";
        input.value = valor.slice(0, -1);
      } else {
        mensajeError.style.display = "none";
      }
    }
  </script>
</body>

</html>