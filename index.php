<?php
include_once __DIR__ . '/Models/Food.php';
include_once __DIR__ . '/Models/Game.php';
include_once __DIR__ . '/Models/Kennel.php';
include_once __DIR__ . '/Models/User.php';

if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['cardNumber']) && isset($_POST['expireDate'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cardNumber = $_POST['cardNumber'];
    $expireDate = $_POST['expireDate'];
    $paymentCard = new PaymentCard($cardNumber,$expireDate);
    $user = new User($email,$password,$paymentCard);
}


$categoryGatto = new Category('Gatto','icon-cat.png');
$categoryCane = new Category('Cane','icon-dog.png');
// var_dump($categoryGatto);
// var_dump($categoryCane);

$productFood = new Food('Croccantini per taglia media', 'croccantini-cane.jpg', -20.86, $categoryCane, 16, ['Carne di Manzo', 'Mix Verdure'],'2022-10-25');
$productFood2 = new Food('Croccantini naturali bio', 'croccantini-gatto.jpg', 4.53, $categoryGatto, -2, ['Pollo Vegano', 'Mix Verdure'],'2025-04-15');
// var_dump($productFood);

$productGame = new Game('Corde di diverse lunghezze', 'gioco-cane.jpg', 16.37, $categoryCane, 'Variabile', ['Stoffa', 'Corda']);
$productGame2 = new Game('Pallina volante', 'gioco-gatto.jpg', 29.99, $categoryGatto, '50x50cm', ['Plastica', 'Metallo','Cotone']);
// var_dump($productGame);

$productKennel = new Kennel('Cuccia con tetto', '', -114.50 , $categoryCane, '60x110x70cm', 65 , ['Legno di Betulla']);
$productKennel2 = new Kennel('Cuccia chiusa con pelo', 'cuccia-gatto.jpg', 45 , $categoryGatto, '', 30 , []);
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
    <div class="container" id="app">
        <h1 class="text-center my-5 text-uppercase">Il tuo negozio sempre con te</h1>
        <div class="form" v-if="viewForm != 'guest' && viewForm != 'userLogged'">
            <div class="inner-form">
                <div v-show="viewForm == 'login'">
                    <button class="btn btn-dark me-5" @click="setView('guest')">Entra come Ospite</button>
                    <button class="btn btn-dark ms-5 " @click="setView('user')">Registrati</button>
                </div>
                <div v-show="viewForm == 'user'">
                    <form action="index.php" method="post">
                        <div class="row">
                            <label for="" class="p-0">Indirizzo e-mail</label>
                            <input type="email" class="p-0" required name="email">
                            <label for="" class="p-0">Password</label>
                            <input type="text" class="p-0" required name="password">
                        </div>
                        <div class="row">
                            <label for="" class="p-0">Numero della carta</label>
                            <input type="text" class="p-0" required name="cardNumber">
                            <label for="" class="p-0">Data di scadenza della carta</label>
                            <input type="text" class="p-0" required name="expireDate">
                        </div>
                        <button class="btn btn-dark mt-2 w-100" @click.prevent="setView('userLogged')">Invia</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" v-if="viewForm == 'guest' || viewForm == 'userLogged'">
            <div class="my-card">
                <div><img src="./img/<?php echo $productFood->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productFood->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $productFood->getTitle()  ?></div>
                    <div>
                        <?php 
                        if($productFood->getAvaliable()){
                            echo "<span class='text-success'>Available</span>";
                        }else{
                            echo "<span class='text-danger'>Not Available</span>";
                        }
                        ?>
                    </div>
                    <div class="price"><?php echo $productFood->getPrice() . ' €'  ?></div>
                    <div><?php echo ($productFood->getWeight()) ? ($productFood->getWeight() . ' Kg') : 'Leggero'?></div>
                    <div><?php echo $productFood->getExpirationDate()  ?></div>
                    <div><?php echo '<span>Ingredienti:</span> '; foreach($productFood->getIngredients() as $ingredient) echo $ingredient . ' '?></div>
                </div>
            </div>
            <div class="my-card">
                <div><img src="./img/<?php echo $productFood2->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productFood2->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $productFood2->getTitle()  ?></div>
                    <div>
                        <?php 
                        if($productFood2->getAvaliable()){
                            echo "<span class='text-success'>Available</span>";
                        }else{
                            echo "<span class='text-danger'>Not Available</span>";
                        }
                        ?>
                    </div>
                    <div class="price"><?php echo $productFood2->getPrice() . ' €'  ?></div>
                    <div><?php echo ($productFood2->getWeight()) ? ($productFood2->getWeight() . ' Kg') : 'Leggero'?></div>
                    <div><?php echo $productFood2->getExpirationDate()  ?></div>
                    <div><?php echo '<span>Ingredienti:</span> '; foreach($productFood2->getIngredients() as $ingredient) echo $ingredient . ' '?></div>
                </div>
            </div>
            <div class="my-card">
                <div><img src="./img/<?php echo $productGame->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productGame->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $productGame->getTitle()  ?></div>
                    <div>
                        <?php 
                        if($productGame->getAvaliable()){
                            echo "<span class='text-success'>Available</span>";
                        }else{
                            echo "<span class='text-danger'>Not Available</span>";
                        }
                        ?>
                    </div>
                    <div class="price"><?php echo $productGame->getPrice() . ' €'  ?></div>
                    <div><?php echo '<span>Dimensioni:</span> ' . $productGame->getsize()  ?></div>
                    <div><?php echo '<span>Materiali:</span> '; foreach($productGame->getmaterial() as $ingredient) echo $ingredient . ' '?></div>
                </div>
            </div>
            <div class="my-card">
                <div><img src="./img/<?php echo $productGame2->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productGame2->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $productGame2->getTitle()  ?></div>
                    <div>
                        <?php 
                        if($productGame2->getAvaliable()){
                            echo "<span class='text-success'>Available</span>";
                        }else{
                            echo "<span class='text-danger'>Not Available</span>";
                        }
                        ?>
                    </div>
                    <div class="price"><?php echo $productGame2->getPrice() . ' €'  ?></div>
                    <div><?php echo '<span>Dimensioni:</span> ' . $productGame2->getsize()  ?></div>
                    <div><?php echo '<span>Materiali:</span> '; foreach($productGame2->getmaterial() as $ingredient) echo $ingredient . ' '?></div>
                </div>
            </div>
            <div class="my-card">
                <div><img src="./img/<?php echo $productKennel->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productKennel->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $productKennel->getTitle()  ?></div>
                    <div>
                        <?php 
                        if($productKennel->getAvaliable()){
                            echo "<span class='text-success'>Available</span>";
                        }else{
                            echo "<span class='text-danger'>Not Available</span>";
                        }
                        ?>
                    </div>
                    <div class="price"><?php echo $productKennel->getPrice() . ' €'  ?></div>
                    <div><?php echo ($productKennel->getWeight()) ? ($productKennel->getWeight() . ' Kg') : 'Leggero'?></div>
                    <div><?php echo '<span>Dimensioni:</span> ' . $productKennel->getsize()  ?></div>
                    <div><?php echo '<span>Materiali:</span> '; foreach($productKennel->getmaterial() as $ingredient) echo $ingredient . ' '?></div>
                </div>
            </div>
            <div class="my-card">
                <div><img src="./img/<?php echo $productKennel2->category->getIcon() ?>" alt="" class="logo"></div>
                <div><img src="./img/<?php echo $productKennel2->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $productKennel2->getTitle()  ?></div>
                    <div>
                        <?php 
                        if($productKennel2->getAvaliable()){
                            echo "<span class='text-success'>Available</span>";
                        }else{
                            echo "<span class='text-danger'>Not Available</span>";
                        }
                        ?>
                    </div>
                    <div class="price"><?php echo $productKennel2->getPrice() . ' €'  ?></div>
                    <div><?php echo ($productKennel2->getWeight()) ? ($productKennel2->getWeight() . ' Kg') : 'Leggero'?></div>
                    <div><?php echo '<span>Dimensioni:</span> ' . $productKennel2->getsize()  ?></div>
                    <div><?php echo '<span>Materiali:</span> '; foreach($productKennel2->getmaterial() as $ingredient) echo $ingredient . ' '?></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>