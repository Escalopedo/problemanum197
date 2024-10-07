<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X2aX1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Descodificador de Mensajes</h2>
        <h5 class="text-center mb-4">Alex Ventura y Eric Alcázar</h5>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Transformar X2 a X1</h3>
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

                    // función para transformar de x2 a x1
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

                    // llamamos a la función para transformar de x2 a x1
                    $x1 = transformar_x2_a_x1($x2);
                    echo "<div class='alert alert-success'>Resultado X1 => $x1</div>";
                }
                ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Transformar X1 a X</h3>
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

                    // función para transformar de x1 a x
                    function descifrar_x1_a_x($x1) {
                        // array con las vocales
                        $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
                        // variable para almacenar el resultado final
                        $x = '';
                        // variable temporal para acumular letras que no son vocales
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

                    // llamamos a la función para transformar de x1 a x
                    $x = descifrar_x1_a_x($x1);
                    // mostramos el resultado en la página
                    echo "<div class='alert alert-success'>Resultado X => $x</div>";
                }
                ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Transformar X2 a X</h3>
                <form method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="mensaje_x2_directo" class="form-label">Ingresa el mensaje cifrado X2:</label>
                        <input type="text" id="mensaje_x2_directo" name="mensaje_x2_directo" class="form-control" required>
                    </div>
                    <button type="submit" name="submit_x2_to_x" class="btn btn-primary">Descodificar X2 a X</button>
                </form>

                <?php
                // verificamos que haya sido enviado el formulario
                if (isset($_POST['submit_x2_to_x'])) {
                    // obtenemos el valor ingresado por el usuario
                    $x2 = $_POST["mensaje_x2_directo"];

                    // función única para transformar de x2 a x directamente
                    function transformar_x2_a_x($x2) {
                        // paso 1: transformar de x2 a x1
                        $num_caracteres = strlen($x2); // obtenemos la longitud del mensaje
                        $x1 = array_fill(0, $num_caracteres, ''); // creamos un array vacío
                        $izquierda = 0;  // puntero para la izquierda
                        $derecha = $num_caracteres - 1;  // puntero para la derecha

                        // recorremos cada letra de x2 para generar x1
                        for ($i = 0; $i < $num_caracteres; $i++) {
                            if ($i % 2 == 0) {
                                $x1[$izquierda++] = $x2[$i]; // letras en posiciones pares van a la izquierda
                            } else {
                                $x1[$derecha--] = $x2[$i]; // letras en posiciones impares van a la derecha
                            }
                        }

                        // convertimos el array de x1 en cadena
                        $x1 = implode('', $x1);

                        // paso 2: transformar de x1 a x
                        $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']; // vocales a buscar
                        $x = ''; // variable para almacenar el resultado final (x)
                        $temp = ''; // variable temporal para acumular letras entre vocales

                        // recorremos cada letra de x1 para generar x
                        for ($i = 0; $i < strlen($x1); $i++) {
                            $letra = $x1[$i]; // obtenemos la letra actual

                            // si la letra es vocal
                            if (in_array($letra, $vocales)) {
                                // invertimos el contenido de temp y lo añadimos junto con la vocal
                                $x .= strrev($temp) . $letra;
                                $temp = ''; // reiniciamos temp
                            } else {
                                // si no es vocal, añadimos la letra a temp
                                $temp .= $letra;
                            }
                        }

                        // añadimos el contenido invertido de temp (lo que quedó al final)
                        $x .= strrev($temp);

                        // devolvemos el mensaje completamente descifrado (x)
                        return $x;
                    }

                    // llamamos a la función para transformar de x2 a x
                    $x = transformar_x2_a_x($x2);
                    // mostramos el resultado en la página
                    echo "<div class='alert alert-success'>Resultado X => $x</div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
