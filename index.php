<?php


const API_URL = "https://www.whenisthenextmcufilm.com/api";

function ExecuteRequest()
{
    # INICIALIZAR UNA API
    $ch = curl_init(API_URL);

    // RECIBIR PETICION
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //EJECUCION DE LA PETICION
    $resultado = curl_exec($ch);

    //TRANSFORMACION DE DATOS JSON

    $data = json_decode($resultado, true);

    // CERRAR

    curl_close($ch);

    return $data;
}

$datos_pelicula = ExecuteRequest();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
    <title>Marvel</title>
</head>

<body>

<main>
    <section class="container-items">
        <img src="<?= $datos_pelicula["poster_url"] ?>" width="300px" style ="border-radius: 16px;">
        <h1>
            <?= $datos_pelicula["title"]?> faltan <?= $datos_pelicula["days_until"]?> dias para su estreno
        </h1>

        <p>
            Descripcion: <span><?= $datos_pelicula["overview"]?></span>
        </p>

        <p>
            Tipo: <strong><?= $datos_pelicula["type"]?></strong>
        </p>

        <p>
            Fecha de lanzamiento: <strong><?= $datos_pelicula["release_date"]?></strong>
        </p>

        <p>
            ID: <strong><?= $datos_pelicula["following_production"]["id"]?></strong>
        </p>

        <button>
            <a href="https://www.imdb.com/video/vi419415577/?playlistId=tt6263850&ref_=tt_ov_vi">Trailer</a>
        </button>

    </section>
</main>

</body>

</html>