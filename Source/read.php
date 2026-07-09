<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "monitoring";

    $con = new mysqli($servername, $username, $password, $database);

    if ($con->connect_error) {
        die("Грешка!".$con->connect_error);
    }

    $sql = "SELECT * FROM senzori ORDER BY vreme DESC LIMIT 1";
    $result = $con->query($sql);

    if ($result->num_rows>0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }
    else
        echo "Грешка!";
    $con->close();
?>