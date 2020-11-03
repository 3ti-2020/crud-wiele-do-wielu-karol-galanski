<?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "lib";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $autor = $_POST['autor'];
    $tytul = $_POST['tytul'];

    $sql_autor = "INSERT INTO `autor`(`id_autor`, `name`) VALUES (NULL, '$autor')";

    $query1 = mysqli_query($conn, $sql_autor);

    if($query1){

        $sql_tytul = "INSERT INTO `tytul`(`id_tytul`, `tytul`) VALUES (NULL, '$tytul')";

        $query2 = mysqli_query($conn, $sql_tytul);

    }

    if($query2){

        $id_autor = "SELECT id_autor FROM `autor` WHERE name='$autor' ";
        $result1 = $conn->query($id_autor);

        while($row1 = $result1->fetch_assoc()){
            $autorid = $row1['id_autor'];

    };

        $id_tytul = "SELECT id_tytul FROM `tytul` WHERE tytul='$tytul' ";
        $result2 = $conn->query($id_tytul);

        while($row2 = $result2->fetch_assoc()){
            $tytulid = $row2['id_tytul'];
    };

    $sql_autor_tytul = "INSERT INTO `autor_tytul`(`id_autor_tytul`, `id_autor`, `id_tytul`) VALUES (NULL, '$autorid', '$tytulid')";

    $query3 = mysqli_query($conn, $sql_autor_tytul);

    }

    header("Location:http://localhost/4ti%20przygotowania/zdalne%20v2/lekcja_nr1%20wiele%20do%20wielu/");

?>