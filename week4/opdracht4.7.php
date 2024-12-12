<?php

$telefoon_prijs = 1000;


$spaargeld = (float)readline("Hoeveel spaargeld heb je? ");


$verschil = $spaargeld - $telefoon_prijs;


if ($verschil >= 0) {
    echo "Je hebt genoeg geld voor de telefoon. Je hebt €$verschil over voor een hoesje.\n";
} else {
    if ($verschil > -250) {
        echo "Je komt bijna rond! Je mist €" . abs($verschil) . ". Nog een beetje sparen!\n";
    } else {
        echo "Je komt €" . abs($verschil) . " te kort. Misschien is het tijd om een baantje te zoeken.\n";
    }
}
?>