<?php

    var_dump($_POST); // Dit toont de verzonden gegevens voor debugging

    require_once('function.php');

    // Controleer of het formulier is ingediend en of de knop is ingedrukt
    if (isset($_POST) && isset($_POST['btn_ins'])) {

        // Zorg ervoor dat de insert_bier functie correct is gedefinieerd in function.php
        insert_bier($_POST);

        // Bevestig dat het bier is toegevoegd
        echo '<script>alert("Biernaam: ' . $_POST['naam'] . ' is toegevoegd")</script>';
    }
?>

<html>

    <body>
        <h1>Insert Bier</h1>
        <form action="insert_bier.php" method="post">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required><br><br>

            <label for="soort">Soort:</label>
            <input type="text" id="soort" name="soort" required><br><br>

            <label for="stijl">Stijl:</label>
            <input type="text" id="stijl" name="stijl" required><br><br>

            <label for="percentage">Alcoholpercentage (%):</label>
            <input type="number" id="percentage" name="percentage" step="0.1" required><br><br>

            <label for="code">Brouwcode:</label>
            <input type="number" id="code" name="code" step="1" required><br><br>

            <!-- Verander de naam van de button naar 'btn_ins' om overeen te komen met de check in PHP -->
            <button type="submit" name="btn_ins">Toevoegen</button><br><br>

            <a href="http://localhost/crud_bier/crud_bieren.php">Home</a>
        </form>
    </body>
</html>



