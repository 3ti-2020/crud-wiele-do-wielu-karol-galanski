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

        </div>
        <div class="left">
                <form action="insert.php" method="POST" class="formularz">
                    <input type="text" name="autor" id="autor" placeholder="autor">
                    <input type="text" name="tytul" id="tytul" placeholder="tytul">
                    <input type="submit" value="Dodaj">
                </form>
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