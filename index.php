<?php  
$date = new DateTime("2022-02");
var_dump($date);
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
        <div class="form">
            <div class="inner-form">
                <form action="shop.php" method="post" v-show="viewForm == 'login'">
                    <input type="text" hidden name="guest" value="guest">
                    <button class="btn btn-dark">Entra come Ospite</button>
                </form>
                <button class="btn btn-dark ms-5 " @click="setView('user')" v-show="viewForm == 'login'">Registrati</button>
                <form action="shop.php" method="post" v-show="viewForm == 'user'">
                    <div class="row">
                        <label for="" class="p-0">Indirizzo e-mail</label>
                        <input type="email" class="p-0" required name="email">
                        <label for="" class="p-0">Password</label>
                        <input type="password" class="p-0" required name="password">
                    </div>
                    <div class="row">
                        <label for="" class="p-0">Numero della carta</label>
                        <input type="text" class="p-0" required name="cardNumber">
                        <label for="" class="p-0">Data di scadenza della carta (es. 2025-05)</label>
                        <input type="text" class="p-0" required name="expireDate">
                    </div>
                    <button class="btn btn-dark my-2 w-100">Invia</button>
                    <button class="btn btn-dark" @click.prevent="setView('login')">Indietro</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>