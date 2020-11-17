<?php
    $servername = "remotemysql.com"; 
    $username = "dANiUZWfqx";
    $password = "xx3e003Jtb";
    $dbname = "dANiUZWfqx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql= "DELETE FROM `wypozyczenia` WHERE id_wypo='".$_POST['id']."'";

    mysqli_query($conn, $sql);

    header("Location:https://karol-galanski-wdw.herokuapp.com/wypozyczenia.php");


?>