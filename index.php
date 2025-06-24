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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>php-hotel</title>
</head>
<body>
    <h1 class="text-center m-5">php hotel</h1>
    <h3 class="text-center m-5">trova l'hotel ideale per le tue esigenze!</h3>

    <!-- form -->
    <form action="index.php" method="get" class="text-center mb-5 p-2 d-flex justify-content-between border rounded-2 container">
        <div class="d-flex align-items-center gap-2">
            <label for="parcheggio">con parcheggio</label>
            <input type="checkbox" name="parcheggio" id="parcheggio">
        </div>
        <div class="d-flex align-items-center gap-2">
            <label for="stelle">stelle hotel</label>
            <input type="number" name="stelle" id="stelle" min="1" max="5">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">invia</button>
        </div>
    </form>



<!-- tabella -->
<div class="p-2 border container rounded-2 bg-primary-subtle">
<table class="table table-striped table-primary">
<thead>
  <tr>
    <th scope="col">Hotel</th>
    <th scope="col">descrizione</th>
    <th scope="col">parcheggio</th>
    <th scope="col">voto</th>
    <th scope="col">distanza dal centro</th>
  </tr>
</thead>
<tbody>
    <?php
        //se il parametro esiste e non è un valore nullo...
        // la variabile parcheggio sarà true, altrimenti sarà false
        isset($_GET["parcheggio"]) && $_GET["parcheggio"] == "on" ? $parcheggio = true : $parcheggio = false;
        // la variabile stelle sarà il numero effettivo di stelle inserite dall'utente, altrimenti sarà zero
        isset($_GET["stelle"]) && $_GET["stelle"] <= 5 && is_numeric($_GET["stelle"]) ? $stelle = $_GET["stelle"] : $stelle = 0;

        // itero per ogni elemento di hotels(array che contiene tutte le info di ogni hotel)
        foreach ($hotels as $hotel){

            // filtro stelle, se è stato inserito toglierà gli hotel con un numero di stelle insufficienti, altrimenti verranno visualizzati tutti
            if($hotel["vote"] >= $stelle){

                // nel caso il filtro per parcheggio sia attivo
                if($parcheggio){
                    // se l hotel ha il parcheggio...
                    if($hotel["parking"] == true){

                        echo "<tr>";

                            // itera su ogni elemento di quell hotel
                            foreach($hotel as $info){
                                // se il valore è true sostituisci il risultato (che sarebbe 1, con presente)
                                if($info === true){

                                    echo "<td>presente</td>";

                                }
                                // altrimenti stampa l'informazione
                                else{

                                echo "<td>$info</td>";

                                }
                            }

                        echo "</tr>";

                    }
                // se il filtro parcheggio non è attivo
                }else{
                    // itera su ogni elemento di quell hotel
                    foreach($hotel as $info){
                                // se il valore è true sostituisci il risultato (che sarebbe 1, con presente)
                                if($info === true){

                                    echo "<td>presente</td>";

                                }
                                // se il valore è false sostituisci il risultato (che sarebbe vuto, con assente)
                                else if($info === false) {

                                    echo "<td>assente</td>";
                                        
                                }
                                // altrimenti stampa l'informazione
                                else{

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
</div>
</body>
</html>