<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>Karol Galański</title>
</head>
<body>
    <div class="cont">
        <div class="top">

            <?php

                session_start();

                if( isset($_POST['haslo']) && $_POST['haslo'] =="a"){
                    $_SESSION['logowanie'] = 1;
                }

                if( isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj" ){
                    unset($_SESSION['logowanie']);
                }
                if( isset($_SESSION['logowanie']) && $_SESSION['logowanie'] == 1){
                    ?>
                    <div class="login1">
                    <h1 class='zalogowany'>ZALOGOWANY</h1>
                    <button><a href='index.php?akcja=wyloguj' class="btn-wyloguj">WYLOGUJ</a></button>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="login1">
                    <h1 class='wylogowany'>NIE ZALOGOWANY</h1>
                    </div>
                    
                    <?php
                }



                
            ?>

            <div class="linki">
                <a href="plik1.php" class="link"><i class="fas fa-sign-in-alt" id="icon"></i>LOGIN</a>
                <a href="../card-main/index.html" class="link"><i class="fas fa-clipboard" id="icon"></i>KARTA</a>
                <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-karol-galanski" class="link"><i class="fab fa-github" id="icon"></i>GITHUB</a>
                <a href="wypozyczenia.php" class="link"><i class="far fa-address-book" id="icon"></i>WYPOŻYCZENIA</a>
            </div>

        </div>
        <div class="left">

            <?php
                
                if(isset($_SESSION['logowanie'])){
                    ?>
                        <form action="insert.php" method="POST" >
                        <input type="text" name="autor" id="autor" placeholder="autor" class="formularz">
                        <input type="text" name="tytul" id="tytul" placeholder="tytul" class="formularz">
                        <input type="submit" value="Dodaj" class="btn">
                    </form>
                    <?php
                }else{
                    echo("Nie można edytować bazy danych, zaloguj się!");
                }
            ?>
                
        </div>
        <div class="main">
            <?php
                $servername = "remotemysql.com"; 
                $username = "dANiUZWfqx";
                $password = "xx3e003Jtb";
                $dbname = "dANiUZWfqx";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $result = $conn->query("SELECT id_autor_tytul, name, tytul FROM autor_tytul, autor, tytul WHERE autor_tytul.id_autor=autor.id_autor AND autor_tytul.id_tytul=tytul.id_tytul");

                echo("<table border=1>");
                echo("<tr>
                <th>id</th>
                <th>name</th>
                <th>tytul</th>");
                if(isset($_SESSION['logowanie'])){   
                    echo("<th>Usuń</th>");
                }
                echo("</tr>");

                while($row = $result->fetch_assoc() ){
                    echo("<tr>");
                    echo("<td>".$row['id_autor_tytul']."</td>");
                    echo("<td>".$row['name']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    if(isset($_SESSION['logowanie'])){
                    echo("<td>
                        <form action='delete.php' method='POST'>
                            <input type='hidden' name='id' value='".$row['id_autor_tytul']."'>
                            <input type='submit' value='X'>
                        </form>
                    </td>");
                    }
                    echo("</tr>");
                }  
                echo("</table>");

                


            ?>
        </div>
        <div class="ft">
                <h1>KAROL GALAŃSKI </h1>
                <h2>GR.1 Nr 3</h2>
        </div>
    </div>
</body>
</html>