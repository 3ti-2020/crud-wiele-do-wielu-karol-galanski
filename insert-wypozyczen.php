<?php
    $servername = "remotemysql.com"; 
    $username = "dANiUZWfqx";
    $password = "xx3e003Jtb";
    $dbname = "dANiUZWfqx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `wypozyczenia`(`id_wypo`, `id_book`, `id_user`, `data_wypozyczenia`, `data_oddania`) VALUES (NULL, '".$_POST['wybrana-ksiazka']."', '".$_POST['wybrany-uzytkownik']."', '".$_POST['data-wyp']."', '".$_POST['data-odd']."')";
 
    mysqli_query($conn, $sql);

    header("Location:https://karol-galanski-wdw.herokuapp.com");

    


?>