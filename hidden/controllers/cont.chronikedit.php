<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: chronikedit");
}
    $link = $sql_con or die("Error " . mysqli_error($link));

    $sql = "select count(*) as anzahl from HLBchronik";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_assoc($result);


    //Übergibt den Wert der Postvariablen an die Session, da über die Sessionvariable der Dateninhalt gesteuer wird
    if (isset($_POST['dataMark'])) {
        $_SESSION['dataMark'] = $_POST["dataMark"];
    }


    if (!isset($_SESSION['pageNumber']) && !isset($_SESSION['pageSize'])) {
        $_SESSION['pageNumber'] = 0;
        $_SESSION['pageSize'] = 1;
    }

$pageNumber = $_SESSION['pageNumber'];
$pageSize = $_SESSION['pageSize'];
$table = 'HLBchronik';
$tableID = 'ID';


    // Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
    // die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
    // Tabelle editiert werden.
if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 0) {
    echo "load";
    $query = "SELECT * FROM $table ORDER BY $tableID DESC LIMIT 1 OFFSET $pageNumber";

    //execute the query.
    $result = $link->query($query) or die("Fehler in der Anfrage HLB Chronik.." . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    $_SESSION['ID'] = $data['anzahl'] - $pageNumber;


    echo "PN" . $_SESSION['pageNumber'];
    echo "PS" . $_SESSION['pageSize'];
    echo "PID" . $_SESSION['ID'];

//        if(isset($_SESSION["info"])){
//            echo $_SESSION["info"];
//            $_SESSION["info"] = null;
//        }
    }




    //Vorheriger Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 7) {
        if ($_SESSION['pageNumber'] < $data['anzahl']-1) {
            $_SESSION['pageNumber']++;
        }
    }
    //Nächster Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 5) {
        if ($_SESSION['pageNumber'] > 0) {
            $_SESSION['pageNumber']--;
        }
    }
    //Aktualisierung des Datensatzes
    if (isset($_SESSION['dataMark']) && $_SESSION['dataMark'] == 3) {
        $query = "UPDATE HLBchronik SET released = '$_POST[released]', Datum = '$_POST[Datum]', KG = '$_POST[KG]', KVE = '$_POST[KVE]', KM = '$_POST[KM]', KHI = '$_POST[KHI]', K = '$_POST[K]', Headline = '$_POST[Headline]', Text1 = '$_POST[Text1]', Text2 = '$_POST[Text2]', Text3 = '$_POST[Text3]', Text4 = '$_POST[Text4]', Text5 = '$_POST[Text5]', WHERE HLBchronik . ID = " . $_SESSION['ID'] . "";

        //execute the query
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

        $_SESSION["info"] = "Erfolgreich geändert!";


    }
    //Neuer Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 1) {

        $query = "INSERT INTO HLBchronik (ID, released, Datum, KG, KVE, KM, KHI, K, Headline, Text1, Text2, Text3, Text4, Text5) VALUES ('', '', '', '', '', '', '', '', '', '', '', '')";

        $result = $link->query($query) or die("Fehler in der Anfrage.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

    //Kopie des Datensatzes
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 2) {

        $query = "INSERT INTO HLBchronik (ID, released, Datum, KG, KVE, KM, KHI, K, Headline, Text1, Text2, Text3, Text4, Text5) VALUES ('', '" . $_POST[released] ."', '" . $_POST['Datum'] ."', '" . $_POST[KG] ."', '" . $_POST[KVE] ."', '" . $_POST[KM] ."', '" . $_POST[KHI] ."', '" . $_POST[K] ."', '" . $_POST[Headline] ."', '" . $_POST['Text1'] ."', '" . $_POST['Text2'] ."', '" . $_POST['Text3'] ."', '" . $_POST['Text4'] ."', '" . $_POST['Text5'] ."')";

        $result = $link->query($query) or die("Fehler in der Copyzugriff.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

$_SESSION['dataMark'] = 0;

?>
