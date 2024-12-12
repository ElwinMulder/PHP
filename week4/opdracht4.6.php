<?php

$huidig_uur = date("H");


$temperatuur = (float)readline("Voer de huidige temperatuur in (in graden Celsius): ");
$luchtvochtigheid = (float)readline("Voer de huidige luchtvochtigheid in (in percentage): ");


if ($huidig_uur == 17 || ($temperatuur < 20 && $luchtvochtigheid < 85)) {
    echo "De airco is uit.\n";
} else {
    echo "De airco is aan.\n";
}
?>