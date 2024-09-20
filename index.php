<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

//var_dump($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de marvel</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <style>
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        img {
            height: 500px;
            border-radius: 10px;
        }

        hgroup {
            text-align: center;
        }
    </style>
</head>

<body>
    <main>
        <section>
            <img src="<?= $data["poster_url"] ?>" alt="">
        </section>
        <hgroup>
            <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
            <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
        </hgroup>
    </main>
</body>

</html>