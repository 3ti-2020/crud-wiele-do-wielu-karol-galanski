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
                <a href="index.php" class="link"><i class="fas fa-home" id="icon"></i>MAIN</a>
            </div>

        </div>
        <div class="left">

        <?php
                $servername = "remotemysql.com"; 
                $username = "dANiUZWfqx";
                $password = "xx3e003Jtb";
                $dbname = "dANiUZWfqx";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $result2 = $conn->query("SELECT id_autor_tytul, name, tytul FROM autor_tytul, autor, tytul WHERE autor_tytul.id_autor=autor.id_autor AND autor_tytul.id_tytul=tytul.id_tytul");

                if(isset($_SESSION['logowanie'])){
                echo("<form action='insert-wypozyczen.php' method='POST'>");
                echo("<select name='wybrana-ksiazka' class='formularz-wyp'>");
                while($row=$result2->fetch_assoc() ){
                    echo("<option value='".$row['id_autor_tytul']."'>".$row['tytul']."</option>");
                }
                echo("</select>");

                $result3 = $conn->query("SELECT * FROM uzytkownicy");

                echo("<select name='wybrany-uzytkownik' class='formularz-wyp'>");
                while($row=$result3->fetch_assoc() ){
                    echo("<option value='".$row['id_user']."'>".$row['login']."</option>");
                }
                echo("</select>");
                echo("<h3>Data Wypożyczenia:");
                echo("<input type='date' name='data-wyp' id='data-wyp' placeholder='Data Wypożyczenia' class='formularz-wyp'>");
                echo("<h3>Data Oddania:");
                echo("<input type='date' name='data-odd' id='data-odd' placeholder='Data Oddania' class='formularz-wyp'>");
                
                echo("<input type='submit' value='Wyślij ' class='btn-wyp'>");
                echo("</form>");
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

                $result = $conn->query("SELECT id_wypo, name, tytul, login, data_wypozyczenia, data_oddania, datediff(data_oddania, CURRENT_DATE) as dni FROM autor_tytul, autor, tytul, wypozyczenia, uzytkownicy WHERE autor_tytul.id_autor=autor.id_autor AND autor_tytul.id_tytul=tytul.id_tytul AND wypozyczenia.id_book=autor_tytul.id_autor_tytul AND wypozyczenia.id_user=uzytkownicy.id_user");

                echo("<table border=1>");
                echo("
                <th>Autor</th>
                <th>Tytul</th>
                <th>User</th>
                <th>Data Wypożyczenia</th>
                <th>Data Planowanego Oddania</th>");
                if(isset($_SESSION['logowanie'])){
                    echo("<th>Dni Do Oddania</th>");
                    // echo("<th>Oddaj</th>");
                    echo("<th>Usuń</th>");
                }

                while($row = $result->fetch_assoc() ){
                    echo("<tr>");
                    echo("<td>".$row['name']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("<td>".$row['login']."</td>");
                    echo("<td>".$row['data_wypozyczenia']."</td>");
                    echo("<td>".$row['data_oddania']."</td>");
                    // if($row['data_oddania'] != NULL){
                    //     echo("<td class='oddana'>".$row['data_oddania']."</td>");
                    // }else{
                    //     echo("<td class='dooddania'>Do Oddania</td>");

                    // } ;
                    if(isset($_SESSION['logowanie'])){
                        if($row['dni'] <= 0){
                            echo("<td class='po-terminie'>".$row['dni']." Po Terminie</td>");
                        } elseif($row['dni'] >= 0 && $row['dni'] <= 3){
                            echo("<td class='przed-term'>".$row['dni']."</td>");
                        }elseif($row['dni'] >= 3){
                            echo("<td class='ok-termin'>".$row['dni']."</td>");
                        }
                    // echo("<td>
                    //     <form action='update.php' method='POST'>
                    //         <input type='hidden' name='id' value='".$row['id_wypo']."'>
                    //         <input type='submit' value='Oddaj'>
                    //     </form>
                    // </td>");
                    echo("<td>
                        <form action='delete-wypo.php' method='POST'>
                            <input type='hidden' name='id' value='".$row['id_wypo']."'>
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