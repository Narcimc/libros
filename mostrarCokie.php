<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo post</title>
    <link rel="stylesheet" href="<?php if(!empty($_COOKIE['categoria'])) echo $_COOKIE['categoria']; ?>">


</head>
<body>
    <h1>Leer Cokies</h1>

    <h2>Categoría</h2>
    <p>Categoría: <?php if (!empty($_COOKIE['categoria'])) echo $_COOKIE['categoria']; ?></p>

</body>
</html>


