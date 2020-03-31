<?php
$veza = mysqli_connect("localhost", "root", "", "luka_savic");
if ($veza->connect_error) {
    die("Povezivanje neuspješno: " . $veza->connect_error);
}
echo "Uspješno spojeno!";
echo "<br><br>";
echo "<h3>RECEPCIJA</h3>";
$sql = "SELECT ID_gosta, Ime_gosta, Cijena_sobe, Doručak FROM recepcija";
if($result = mysqli_query($veza, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>ID_gosta</th>";
            echo "<th>Ime_gosta</th>";
            echo "<th>Cijena_sobe</th>";
            echo "<th>Doručak</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID_gosta'] . "</td>";
            echo "<td>" . $row['Ime_gosta'] . "</td>";
            echo "<td>" . $row['Cijena_sobe'] . "</td>";
            echo "<td>" . $row['Doručak'] . "</td>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($veza);
}
echo "<br><br>";
echo "<h3>SOBE</h3>";
$sql2 = "SELECT ID_sobe, Recepcija_ID, Broj_posteljina FROM sobe";
if($result2 = mysqli_query($veza, $sql2)) {
    if(mysqli_num_rows($result2) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID_sobe</th>";
        echo "<th>Recepcija_ID</th>";
        echo "<th>Broj_posteljina</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td>" . $row['ID_sobe'] . "</td>";
            echo "<td>" . $row['Recepcija_ID'] . "</td>";
            echo "<td>" . $row['Broj_posteljina'] . "</td>";
        }
        echo "</table>";
        mysqli_free_result($result2);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($veza);
}
mysqli_close($veza);