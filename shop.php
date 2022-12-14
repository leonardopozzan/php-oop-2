<?php
include_once __DIR__ . '/Models/Food.php';
include_once __DIR__ . '/Models/Game.php';
include_once __DIR__ . '/Models/Kennel.php';
include_once __DIR__ . '/Models/PremiumUser.php';

$filePath = './data/customers.json';

if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['cardNumber']) && isset($_POST['expireDate'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cardNumber = $_POST['cardNumber'];
    $expireDate = $_POST['expireDate'];
    $paymentCard = new PaymentCard($cardNumber,$expireDate);
    $premiumUser = new PremiumUser($email,$password,$paymentCard);
    $premiumUserTxt = json_encode(serialize($premiumUser));
    file_put_contents($filePath, $premiumUserTxt);
    // var_dump($paymentCard);
    // var_dump($premiumUser);
}
if(isset($_POST['guest'])){
    $user = new User();
    $userTxt = json_encode(serialize($user));
    file_put_contents($filePath, $userTxt);
}
if(isset($_POST['product'])){
    $myProduct = $_POST['product'];
    $textFile = file_get_contents($filePath);
    $customer = unserialize(json_decode($textFile));
    $customer->addToCart($myProduct);
    $customerTxt = json_encode(serialize($customer));
    file_put_contents($filePath, $customerTxt);
    // var_dump($myProduct);
}

$textFile = file_get_contents($filePath);
$customer =unserialize(json_decode($textFile));
var_dump($customer);

$categoryGatto = new Category('Gatto','icon-cat.png');
$categoryCane = new Category('Cane','icon-dog.png');
// var_dump($categoryGatto);
// var_dump($categoryCane);

$productFood = new Food('Croccantini per taglia media', 'croccantini-cane.jpg', -20.86, $categoryCane, 16, ['Carne di Manzo', 'Mix Verdure'],'2022-10-25');
$productFood2 = new Food('Croccantini naturali bio', 'croccantini-gatto.jpg', 4.53, $categoryGatto, -2, ['Pollo Vegano', 'Mix Verdure'],'2025-04-15');
// var_dump($productFood);

$productGame = new Game('Corde di diverse lunghezze', 'gioco-cane.jpg', 16.37, $categoryCane, ['Stoffa', 'Corda']);
$productGame2 = new Game('Pallina volante', 'gioco-gatto.jpg', 29.99, $categoryGatto, ['Plastica', 'Metallo','Cotone']);
$productGame->setsize('Variabile');
$productGame2->setsize('50x50cm');
// var_dump($productGame);

$productKennel = new Kennel('Cuccia con tetto', '', -114.50 , $categoryCane, 65 , ['Legno di Betulla']);
$productKennel2 = new Kennel('Cuccia chiusa con pelo', 'cuccia-gatto.jpg', 45 , $categoryGatto, 30 , []);
$productKennel->setsize('60x110x70cm');
$productKennel2->setsize('');
// var_dump($productKennel);

$products = [$productFood, $productFood2, $productGame, $productGame2, $productKennel, $productKennel2,];

include __DIR__ . '/partials/head.php';
?>

<body>
    <div class="container" id="app">
        <h1 class="text-center my-5 text-uppercase">Il tuo negozio sempre con te</h1>
        <div class="row">
            <?php foreach ($products as $product) { ?>
            <div class="my-card">
                <form action="shop.php" method="post" class="my-btn">
                    <button class="btn-primary btn">Add</button>
                    <input type="text" hidden value="<?php echo $product->getTitle()  ?>" name="product">
                </form>
                <div>
                    <img src="./img/<?php echo $product->category->getIcon() ?>" alt="" class="logo">
                </div>
                <div>
                    <img src="./img/<?php echo $product->getImage() ?>" alt="" class="img-box"></div>
                <div class="p-2 info">
                    <div class="title"><?php echo $product->getTitle() ?></div>
                    <div>
                        <?php
                            if ($product->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                        ?>
                    </div>
                    <div class="price"><?php echo $product->getPrice() . ' €' ?></div>
                    <div><?php if (get_class($product) == 'Food') {
                    echo $product->getExpirationDate();
                    }else if (get_class($product) == 'Kennel'){
                    echo ($product->getWeight()) ? ($product->getWeight() . ' Kg') : 'Leggero';
                    } ?></div>
                    <div><?php if (get_class($product) == 'Food') {
                    echo ($product->getWeight()) ? ($product->getWeight() . ' Kg') : 'Leggero';
                    } else {
                    echo '<span>Dimensioni:</span> ' . $productGame->getsize();
                    }?></div>
                    <div><?php if(get_class($product) == 'Food'){
                        echo '<span>Ingredienti:</span> ';
                        foreach ($product->getIngredients() as $ingredient) echo $ingredient . ' ' ;
                        }else{ 
                            echo '<span>Materiali:</span> '; 
                            foreach($productGame->getmaterial() as $ingredient) echo $ingredient . ' ';
                        }?></div>
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>
</body>
</html>