<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            session_start();

            if(isset($_GET['akcja']) && $_GET['akcja']=="wyloguj"){
                unset($_SESSION['zalogowany']);
            }

            if( !isset($_SESSION['zalogowany']) ){
                ?>

                <form action="rules.php" method="post">
                    <input type="text" name="login" placeholder="login">
                    <input type="text" name="pass" placeholder="haslo">
                    <input type="submit" value="Zaloguj">
                </form>
                <?php
            }

    ?>
</body>
</html>