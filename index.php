<?php
// Define la constante API_URL que contiene la URL de la API que devolverá información sobre la próxima película de Marvel.
const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializa una sesión cURL usando la URL de la API.
$ch = curl_init(API_URL);

// Configura la opción CURLOPT_RETURNTRANSFER para que cURL devuelva el resultado como una cadena en lugar de imprimirlo directamente.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecuta la solicitud cURL y almacena la respuesta (que es una cadena en formato JSON) en la variable $result.
$result = curl_exec($ch);

// Decodifica la cadena JSON a un array asociativo de PHP y lo almacena en la variable $data.
$data = json_decode($result, true);

// Cierra la sesión cURL para liberar recursos.
curl_close($ch);

// var_dump($data);  // Esta línea está comentada, pero serviría para hacer un volcado de la variable $data y ver su contenido.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Define que el documento tiene un conjunto de caracteres UTF-8 -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Asegura que la página se vea correctamente en dispositivos móviles ajustando la escala inicial -->

    <title>La próxima película de marvel</title>
    <!-- Título de la página que aparece en la pestaña del navegador -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <!-- Importa una hoja de estilos CSS externa del framework Pico CSS para darle un diseño básico y agradable a la página -->

    <style>
        /* Estilo para el contenedor principal: usa flexbox para centrar su contenido vertical y horizontalmente */
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Estilo para la imagen: fija la altura en 500px y le aplica bordes redondeados */
        img {
            height: 500px;
            border-radius: 10px;
        }

        /* Centra el texto en el bloque hgroup */
        hgroup {
            text-align: center;
        }
    </style>
</head>

<body>
    <main>
        <section>
            <!-- Muestra el póster de la película usando la URL obtenida de la API ($data["poster_url"]) -->
            <img src="<?= $data["poster_url"] ?>" alt="">
        </section>

        <hgroup>
            <!-- Muestra el título de la próxima película y cuántos días faltan para su estreno -->
            <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>

            <!-- Muestra la fecha exacta de estreno de la película -->
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>

            <!-- Muestra el título de la película que sigue después de la próxima -->
            <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
        </hgroup>
    </main>
</body>

</html>