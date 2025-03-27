<?php
// auteur: Elwin Mulder
// Function: functies

function CrudBieren(){

    $txt = "
    <h1>Crud Bieren</h1>
    <nav>
    <a href= 'insert_beer.php'>Nieuw biertje toevoegen</a>
    </nav> ";
    echo $txt;
    $result = GetData("bier");
    PrintCrudBier($result);
}


function GetData($table) {
  // Connect de database
  $conn = ConnectDb();

  //Select data uit de opgegeven table methode prepare
  $query = $conn ->prepare("SELECT * FROM $table");
  $query->execute();
  $result = $query->fetchAll();

  //var_dump($result);
  return $result;
}

//functie: connecten van de database
function ConnectDb(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "biershop2";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $conn;

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

function PrintCrudBier($result){
  // Zet de hele table in een variabele en print hem 1 keer
  $table = "<table border='1px'>";

  //haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";  
    }

  // print elke rij
  foreach ($result as $row){

    $table .= "<tr>";
    //print elke kolom
    foreach ($row as $cell){
    $table .= "<td>" . $cell . "</td>";

  }
  //twee extra kolommen
    $table .= "<td>
    <form action='update_bier.php' method='post'>
    <input type='hidden' name='biercode' value='$row[biercode]'>
    <input type='submit' value='Wijzigen'>
    </td>";
    $table .= "<td>
    <a href='delete_bier.php?biercode=$row[biercode]'>Delete</a>
    </td>";
  }

  $table .= "</tr>";

  $table.= "</table>";

  echo $table;
}

function insert_bier($post){
try {

  $conn = ConnectDb();
  
  $query = $conn->prepare("
  INSERT INTO bier (naam, soort, stijl, alchohol, brouwcode)
  VALUES (:naam, :soort, :stijl, :alchohol, :brouwcode)");
  
  $query->execute(
      [
          ':naam'=>$_POST['naam'],
          ':soort'=>$_POST['soort'],
          ':stijl'=>$_POST['stijl'],
          ':alchohol'=>$_POST['alchohol'],
          ':brouwcode'=>$_POST['brouwcode']
      ]
  );
  
  }  
  catch(PDOException $e) {
  echo "Insert failed: " . $e->getMessage();
  }
}

function DeleteBier($biercode){
  echo "Delete row<br>";

  try {
      // Maak verbinding met de database
      $conn = ConnectDb();

      // SQL-query om bier te verwijderen met opgegeven biercode
      $query = $conn->prepare("DELETE FROM bier WHERE bier.biercode = :biercode");

      // Voer de query uit met de biercode
      $query->execute([':biercode' => $biercode]);

      // Controleer of er een rij is verwijderd
      if ($query->rowCount() > 0) {
          echo "Bier met biercode " . $biercode . " is verwijderd.";
      } else {
          echo "Geen bier gevonden met biercode " . $biercode . ".";
      }
  } catch(PDOException $e) {
      // Foutafhandeling
      echo "Delete failed: " . $e->getMessage();
      return;
  }
}
?>

