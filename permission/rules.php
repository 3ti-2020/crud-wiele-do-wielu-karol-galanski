<?php

    session_start();

    $servername = "remotemysql.com"; 
    $username = "dANiUZWfqx";
    $password = "xx3e003Jtb";
    $dbname = "dANiUZWfqx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql1 = "SELECT uzytkownicy.login as login, role.name as rola, permission.name as pozwolenie FROM permission, role, uzytkownicy, permission_role WHERE uzytkownicy.role_id = role.id AND permission_role.role_id = role.id AND permission_role.permission_id = permission.id";

    $result1 = $conn->query("SELECT * FROM uzytkownicy"); 
    if(isset($_POST['login']) && isset($_POST['pass'] ) ){

        while($row = $result1->fetch_assoc()){
            if($row['login']==$_POST['login'] && $row['pass']==$_POST['pass'] ){
                $_SESSION['zalogowany'] = 1;
            }

        }
    }

    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
        echo("ZALOGOWANY");
    }

?>