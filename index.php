<?php
include_once __DIR__ . '/Models/Food.php';
include_once __DIR__ . '/Models/Game.php';
include_once __DIR__ . '/Models/Kennel.php';

$categoryGatto = new Category('Gatto','icon-cat.png');
$categoryCane = new Category('Cane','icon-dog.png');
// var_dump($categoryGatto);
// var_dump($categoryCane);

$productFood = new Food('Croccantini per taglia media', 'croccantini-cane.jpg', 20.86, $categoryCane, 16, ['Carne di Manzo', 'Mix Verdure'],'2022-10-25');
$productFood2 = new Food('Croccantini naturali bio', 'croccantini-gatto.jpg', 4.53, $categoryGatto, -2, ['Pollo Vegano', 'Mix Verdure'],'2025-04-15');
// var_dump($productFood);

$productGame = new Game('Corde di diverse lunghezze', 'gioco-cane.jpg', 16.37, $categoryCane, 'Varibile', ['Stoffa', 'Corda']);
$productGame2 = new Game('Pallina volante', 'gioco-gatto.jpg', 29.99, $categoryGatto, '50x50cm', ['Plastica', 'Metallo','Cotone']);
// var_dump($productGame);

$productKennel = new Kennel('Cuccia con tetto', 'cuccia-cane.jpg', 114.50 , $categoryCane, '60x110x70cm', 65 , ['Legno di Betulla']);
$productKennel2 = new Kennel('Cuccia chiusa con pelo', 'cuccia-gatto.jpg', 45 , $categoryGatto, '50x60x50cm', 30 , ['Cotone']);
// var_dump($productKennel);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
    <div class="container">
        <h1 class="text-center my-3">Il tuo negozio sempre con te</h1>
        <div class="row">
            <div class="col-6 position-relative my-card">
                <div><img src="./img/<?php echo $productFood->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productFood->getImage() ?>" alt="" class="img-box"></div>
                <div class="title"><?php echo $productFood->getTitle()  ?></div>
                <div><?php echo $productFood->getWeight() . ' Kg'  ?></div>
                <div class="price"><?php echo $productFood->getPrice() . ' €'  ?></div>
                <div><?php echo $productFood->getExpirationDate()  ?></div>
                <div><?php echo '<span>Ingredienti:</span> '; foreach($productFood->getIngredients() as $ingredient) echo $ingredient . ' '?></div>
            </div>
        </div>
    </div>
</body>
</html>