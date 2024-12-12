<?php

$leeftijd = (int)readline("Wat is je leeftijd? ");


if ($leeftijd >= 16) {
    echo "Je mag een scooter rijbewijs halen.\n";
} else {
    echo "Je mag geen scooter rijbewijs halen, je moet minstens 16 jaar zijn.\n";
}


if ($leeftijd >= 18) {
 
    $heeft_stempas = readline("Heb je een stempas ontvangen? (ja/nee): ");


    $heeft_stempas = strtolower($heeft_stempas) == 'ja';

    if ($heeft_stempas) {
        echo "Je mag stemmen, omdat je 18 jaar of ouder bent en een stempas hebt ontvangen.\n";
    } else {
        echo "Je mag niet stemmen, omdat je geen stempas hebt ontvangen.\n";
    }
} else {
    echo "Je mag niet stemmen, je moet minstens 18 jaar zijn.\n";
}
?>
