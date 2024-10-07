<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformar X1 a X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Transformar X1 a X</h2>
        <h5 class="text-center mb-4">Alex Ventura y Eric Alcázar</h5>

        <div class="card mb-4">
            <div class="card-body">
                <form method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="mensaje_x1" class="form-label">Ingresa el mensaje cifrado X1:</label>
                        <input type="text" id="mensaje_x1" name="mensaje_x1" class="form-control" required>
                    </div>
                    <button type="submit" name="submit_x1_to_x" class="btn btn-primary">Descodificar X1 a X</button>
                </form>

                <?php
                // verificamos que haya sido enviado el formulario
                if (isset($_POST['submit_x1_to_x'])) {
                    $x1 = $_POST["mensaje_x1"];

                    // función para transformar de X1 a X
                    function descifrar_x1_a_x($x1) {
                        // array con las vocales
                        $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
                        // variable para almacenar el resultado final
                        $x = '';
                        // cariable temporal para acumular letras que no son vocales
                        $temp = '';

                        // recorremos el texto letra por letra
                        for ($i = 0; $i < strlen($x1); $i++) {
                            // obtenemos la letra actual
                            $letra = $x1[$i];

                            // si la letra es una vocal
                            if (in_array($letra, $vocales)) {
                                // añadimos el contenido invertido de $temp seguido de la vocal
                                $x .= strrev($temp) . $letra;
                                // reiniciamos la variable $temp
                                $temp = '';
                            } else {
                                // si no es una vocal, la guardamos en $temp
                                $temp .= $letra;
                            }
                        }

                        // añadimos lo que queda en $temp (si es que hay algo)
                        $x .= strrev($temp);
                        return $x;
                    }

                    // llamamos a la función para transformar de X1 a X
                    $x = descifrar_x1_a_x($x1);
                    echo "<div class='alert alert-success'>Resultado X => $x</div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
