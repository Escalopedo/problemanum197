<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformar X2 a X1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Transformar X2 a X1</h2>
        <h5 class="text-center mb-4">Alex Ventura y Eric Alcázar</h5>

        <div class="card mb-4">
            <div class="card-body">
                <form method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="mensaje_x2" class="form-label">Ingresa el mensaje cifrado X2:</label>
                        <input type="text" id="mensaje_x2" name="mensaje_x2" class="form-control" required>
                    </div>
                    <button type="submit" name="submit_x2_to_x1" class="btn btn-primary">Descodificar X2 a X1</button>
                </form>

                <?php
                // verificamos que haya sido enviado el formulario
                if (isset($_POST['submit_x2_to_x1'])) {
                    $x2 = $_POST["mensaje_x2"];

                    // función para transformar de X2 a X1
                    function transformar_x2_a_x1($x2) {
                        // obtenemos el número de caracteres del texto
                        $num_caracteres = strlen($x2);
                        // creamos un array vacío donde se guarda el mensaje transformado
                        $x1 = array_fill(0, $num_caracteres, '');
                        // inicializamos las variables izquierda y derecha
                        $izquierda = 0;
                        $derecha = $num_caracteres - 1;

                        // recorremos los caracteres del texto
                        for ($i = 0; $i < $num_caracteres; $i++) {
                            // si la posición es par, la letra va al principio (izquierda)
                            if ($i % 2 == 0) {
                                $x1[$izquierda++] = $x2[$i];
                            } 
                            // si la posición es impar, la letra va al final (derecha)
                            else {
                                $x1[$derecha--] = $x2[$i];
                            }
                        }
                        // convertimos el array en texto
                        return implode('', $x1);
                    }

                    // llamamos a la función para transformar de X2 a X1
                    $x1 = transformar_x2_a_x1($x2);
                    echo "<div class='alert alert-success'>Resultado X1 => $x1</div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
