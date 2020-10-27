<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Karol Galański</title>
</head>
<body>
    <div class="cont">
        <div class="top">

            <?php
                $servername = "localhost"; 
                $username = "root";
                $password = "";
                $dbname = "lib";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $result2 = $conn->query("SELECT * FROM autor");

                echo("<form action='insert.php' method='POST'>");
                echo("<select name='wybrany-autor'>");
                while($row=$result2->fetch_assoc() ){
                    echo("<option value='".$row['id_autor']."'>".$row['name']."</option>");
                }
                echo("</select>");

                $result3 = $conn->query("SELECT * FROM tytul");

                echo("<select name='wybrany-tytul'>");
                while($row=$result3->fetch_assoc() ){
                    echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                }
                echo("</select>");
                // echo("<input type='text' name='zamowienie' placeholder='nr. zamowienia'>");
                echo("<input type='submit' value='wyslij wybrane wartosci'>");
                echo("</form>");

            ?>
        </div>
        <div class="left">
                <form action="insert-autora.php" method="post" class="formularz">
                    <input type="text" name="autor" id="podaj nowego autora">
                    <input type="submit" value="Dodaj Autora">
                </form>

                <form action="insert-tytul.php" method="post" class="formularz">
                    <input type="text" name="tytul" id="podaj nowy tytul">
                    <input type="submit" value="Dodaj Tytul">
                </form>
        </div>
        <div class="main">
            <?php
                $serwername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "lib";

                $conn = new mysqli($serwername, $username, $password, $dbname);

                $result = $conn->query("SELECT * FROM `ksiazki`");

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
        <div class="ft"></div>
    </div>
</body>
</html>