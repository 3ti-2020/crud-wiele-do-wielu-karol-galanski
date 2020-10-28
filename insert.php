<?php
    $servername = "remotemysql.com"; 
    $username = "dANiUZWfqx";
    $password = "xx3e003Jtb";
    $dbname = "dANiUZWfqx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `autor_tytul`(`id_autor_tytul`, `id_autor`, `id_tytul`) VALUES (NULL, '".$_POST['wybrany-autor']."', '".$_POST['wybrany-tytul']."')";

    mysqli_query($conn, $sql);

    header("Location:http://localhost/4ti%20przygotowania/zdalne%20v2/lekcja_nr1%20wiele%20do%20wielu/");

    


?>