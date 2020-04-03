<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>meld je hier ziek</title>

</head>
<body>
    <h1>Ziekmelden</h1>

    <form method="POST">
        <h5>Naam: </h5><input type="text" placeholder="type here..." name="TxtNaam"></br>
        <h5>Klas: </h5><input type="text" placeholder="type here..." name="TxtKlas"></br>
        <h5>Ziektedatum: </h5><input type="text" placeholder="type here..." name="Txtziektedatum"></br>
        <h5>Betermelddatum: </h5><input type="text" placeholder="type here..." name="Txtbetermelddatum"></br>
        <h5>status: </h5><input type="text" placeholder="type here..." name="Txtstatus"></br>
        <button type="submit" name="btnSave">ziekmelden</button>


    </form>
    <?php


    $host = "localhost";
    $dbnaam = "ziekmeldingen";
    $gebruiker = "root";
    $wachtwoord = "";

    try{
        $con = new PDO("mysql:host=$host;dbname=$dbnaam", $gebruiker, $wachtwoord);
    }catch(PDOException $ex){

    echo "<hr/>";
    echo "ERROR: Verbinding mislukt: $ex";
    echo "<hr/>";
    }


    if(isset($_POST["btnSave"])){

        $Naam = $_POST["TxtNaam"];
        $Klas = $_POST["TxtKlas"];
        $ziektedatum = $_POST["Txtziektedatum"];
        $betermelddatum = $_POST["Txtbetermelddatum"];
        $status = $_POST["Txtstatus"];

        $query = "INSERT INTO registratie (Naam, Klas, ziektedatum, betermelddatum, status) VALUES ".
            "('$Naam', '$Klas', '$ziektedatum', '$betermelddatum', '$status')";

        $stm = $con->prepare($query);

        if($stm->execute()){
            echo "Succesvol verzonden!";
        } else {
            echo "Error mislukt";
        }
    }
    ?>
</body>
</html>


