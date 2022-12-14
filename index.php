<?php
include_once __DIR__ . '/partials/head.php';
?>


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