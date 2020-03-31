<?php
$veza = mysqli_connect("localhost", "root", "", "classicmodels");
if ($veza->connect_error) {
    die("Povezivanje neuspješno: " . $veza->connect_error);
}

if(isset($_POST['queryTextBox']) && $_POST['queryTextBox'] != NULL) {
    $insertedQuery = $_POST['queryTextBox'];
    $sql = $insertedQuery;
    if($result = mysqli_query($veza, $sql)) {
        if(mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>customerNumber</th>";
            echo "<th>customerName</th>";
            echo "<th>contactLastName</th>";
            echo "<th>contactFirstName</th>";
            echo "<tr>";

            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['customerNumber'] . "</td>";
                echo "<td>" . $row['customerName'] . "</td>";
                echo "<td>" . $row['contactLastName'] . "</td>";
                echo "<td>" . $row['contactFirstName'] . "</td>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
        else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($veza);
    }
    mysqli_close($veza);
}