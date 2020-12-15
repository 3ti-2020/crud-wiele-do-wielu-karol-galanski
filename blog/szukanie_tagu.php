<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo.png">
    <title>GAMES BLOG</title>
</head>
<body>
    <div class="cont">
        <div class="head">
            <h1><a href="index.php" class='blog_title'>GAMES BLOG</a></h1>
            
        </div>
        <div class="main">
            <?php
                $servername = "remotemysql.com"; 
                $username = "dANiUZWfqx";
                $password = "xx3e003Jtb";
                $dbname = "dANiUZWfqx";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $result1 = $conn->query("SELECT DISTINCT * FROM blog_post JOIN blog_post_tag ON blog_post.id_post=blog_post_tag.id_post JOIN blog_tag ON blog_post_tag.id_tag=blog_tag.id_tag WHERE blog_tag.tag = '".$_POST['szukaj_tag']."'");
                while($row1 = $result1->fetch_assoc() ){
                    echo("<article class='post'>");
                    echo("<h2 class='tytul'>".$row1['tytul']."</h2>");
                    echo("<img src='".$row1['zdj']."' class='zdj'>");
                    echo("<p class='tresc'>");
                    echo($row1['tresc']);
                    echo("</p>");
                    echo("<div class='tagi'>");
                    echo("<h3 class='tag'>");
                        $result2 = $conn->query("SELECT * FROM blog_tag JOIN blog_post_tag ON blog_tag.id_tag=blog_post_tag.id_tag WHERE blog_post_tag.id_post=".$row1['id_post']);
                        while($row2 = $result2->fetch_assoc()){
                            // echo("#".$row2['tag']);
                            echo("<form action='szukanie_tagu.php' method='post' class='form_tag'>
                                #<input type='submit' class='in_tag' name='szukaj_tag' value='".$row2['tag']."'>
                                </form>");
                        }
                        
                    echo("</h3>");
                    echo("</div>");
                    echo("</article>");
                }


            ?>  
        </div>
    </div>
</body>
</html>