<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "monitoring";

    $con = new mysqli($servername, $username, $password, $database);

    if ($con->connect_error) {
        die("Грешка!".$con->connect_error);
    }

    $temp = $_GET['t'];
    $hum = $_GET['h'];

    $sql = "INSERT INTO senzori(temperatura, vlaga) VALUES ('$temp', '$hum')";

    if($con->query($sql) === TRUE) {
        echo "Податоците се успешно зачувани";
    }
    else
        echo "Грешка!";

    $con->close();
?>
