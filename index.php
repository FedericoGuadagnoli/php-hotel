<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>
    <title>Php Hotels</title>
</head>
<body class="bg-dark">
    <div class="container py-5">

    <form method="get">
            <div class="form-group d-flex gap-3">
                <label class="text-light fs-4" for="parking">Parking</label>
                <select class="form-control w-25 fs-4" id="parking" name="parking">
                    <option value="">All</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary my-3 fs-4">Filter</button>
        </form>
        <h1 class="text-light">Hotels</h1>
        <table class="table text-light fs-3">
            <thead>
                <tr>
                    <?php foreach(array_keys($hotels[0]) as $key) : ?>
                    <th scope="col"><?= $key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
            <?php
            $selected_parking = $_GET['parking'] ?? '';
            if ($selected_parking !== '') {
                $hotels = array_filter($hotels, function ($hotel) use ($selected_parking) {
                    return $hotel['parking'] == (bool) $selected_parking;
                });
            }
            ?>
                <?php foreach ($hotels as $group_hotel) : ?>
                    <tr>
                        <?php foreach ($group_hotel as $key => $hotel) : ?>
                            <th class="text-secondary"><?= $hotel ?></th>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>