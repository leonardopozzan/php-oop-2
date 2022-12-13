<?php
include_once __DIR__ . '/Models/Food.php';
include_once __DIR__ . '/Models/Game.php';
include_once __DIR__ . '/Models/Kennel.php';

$categoryGatto = new Category('Gatto');
$categoryCane = new Category('Cane');
var_dump($categoryGatto);
var_dump($categoryCane);

// $product = new Product('Croccantini', 'cane.jpg', 5.86, $categroryCane);
// var_dump($product);

$productFood = new Food('Croccantini', 'cane.jpg', 5.86, $categoryCane, -4, ['Pollo Vegano', 'Mix Verdure'],'2025-06-25');
var_dump($productFood);

$productGame = new Game('Osso Finto', 'osso.jpg', 11.51, $categoryCane, '10x40cm', ['plastica', 'gomma']);
var_dump($productGame);

$productKennel = new Game('Cuccia con tette', 'cuccia.jpg', 55 , $categoryCane, '40x90x50cm', ['legno']);
var_dump($productKennel);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='#'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel='stylesheet' href='./css/style.css'>
    <script src='https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js'></script>
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <script src='./js/script.js' defer></script>
    <title>E-Commerce</title>
</head>

<body>

</body>
</html>