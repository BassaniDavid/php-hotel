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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>php-hotel</title>
</head>
<body>
    <h1 class="text-center m-5">php hotel</h1>
    <h3 class="text-center m-5">trova l'hotel ideale per le tue esigenze!</h3>

    <!-- form -->
    <form action="index.php" method="get">
        <label for="">con parcheggio</label>
        <input type="checkbox" name="parcheggio" id="">
        <label for="">stelle hotel</label>
        <input type="number" name="stelle" id="" min="1" max="5">
        <button type="submit">invia</button>
    </form>



<!-- tabella -->
<table class="table container table-striped border">
<thead>
  <tr>
    <th scope="col">Hotel</th>
    <th scope="col">description</th>
    <th scope="col">parking</th>
    <th scope="col">vote</th>
    <th scope="col">distance to center</th>
  </tr>
</thead>
<tbody>
    <?php
        isset($_GET["parcheggio"]) ? $parcheggio = true : $parcheggio = false;
        isset($_GET["stelle"]) ? $stelle = $_GET["stelle"] : $stelle = 0;

        foreach ($hotels as $hotel){

            // filtro stelle
            if($hotel["vote"] >= $stelle){

                // nel caso il filtro per parcheggio sia attivo
                if($parcheggio){
                    if($hotel["parking"] == true){

                        echo "<tr>";

                            foreach($hotel as $info){
                                if($info === true){

                                    echo "<td>presente</td>";

                                } else if($info === false) {

                                    echo "<td>assente</td>";

                                }else{

                                echo "<td>$info</td>";

                                }
                            }

                        echo "</tr>";

                    }
                }else{

                    foreach($hotel as $info){

                                if($info === true){

                                    echo "<td>presente</td>";

                                } else if($info === false) {

                                    echo "<td>assente</td>";
                                        
                                }else{

                                echo "<td>$info</td>";

                                }
                    }

                    echo "</tr>";
                    
                }

            }

        }
    ?>
</tbody>
</table>
</body>
</html>