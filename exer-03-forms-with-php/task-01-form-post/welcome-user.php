<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>
            <?php
                echo 'Welcome '.htmlentities($_POST['usernameBox']). '!';
            ?>
        </h1>
    </body>
</html>
