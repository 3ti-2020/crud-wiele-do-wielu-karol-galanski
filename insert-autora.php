<?php
    $serwername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lib";

    $conn = new mysqli($serwername, $username, $password, $dbname);

    $sql = "INSERT INTO `autor`(`id_autor`, `name`) VALUES (NULL, '".$_POST['autor']."')";

    mysqli_query($conn, $sql);

    header("Location:http://localhost/4ti%20przygotowania/zdalne%20v2/lekcja_nr1%20wiele%20do%20wielu/");

    


?>