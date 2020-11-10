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

                if( isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj" ){
                    unset($_SESSION['logowanie']);
                }

                if( !isset($_SESSION['logowanie']) ){
                ?>  

                    <form action="index.php" method="post" class="logowanie">
                        <input type="text" name="login" placeholder="podaj login">
                        <input type="text" name="haslo" placeholder="podaj haslo">
                        <input type="submit" value="Zaloguj">
                    </form>
                <?php
                }else{
                    ?>
                    <div class="login">
                    <h1 class='zalogowany'>ZALOGOWANY</h1>
                    <button><a href='index.php?akcja=wyloguj' class="btn-wyloguj">WYLOGUJ</a></button>
                    </div>
                    <?php
                }

            ?>

            <div class="linki">
                <a href="index.php" class="link"><i class="fas fa-home" id="icon"></i>MAIN</a>
                <a href="../card-main/index.html" class="link"><i class="fas fa-clipboard" id="icon"></i>KARTA</a>
                <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-karol-galanski" class="link"><i class="fab fa-github" id="icon"></i>GITHUB</a>
                <a href="wypozyczenia.php" class="link"><i class="far fa-address-book" id="icon"></i>WYPOŻYCZENIA</a>
            </div>

        </div>
        <div class="left">

            <?php
                
                if(isset($_SESSION['logowanie'])){
                    ?>
                        <form action="insert.php" method="POST">
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
                echo("
                <th>id</th>
                <th>name</th>
                <th>tytul</th>
                ");

                while($row = $result->fetch_assoc() ){
                    echo("<tr>");
                    echo("<td>".$row['id_autor_tytul']."</td>");
                    echo("<td>".$row['name']."</td>");
                    echo("<td>".$row['tytul']."</td>");
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