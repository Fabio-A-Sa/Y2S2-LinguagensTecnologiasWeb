<?php 
    declare(strict_types = 1);

function drawHeader() { ?>
<!DOCTYPE html>
<html lang="PT-pt">
    <head>
        <title>O Comilão - Take Away</title>
        <meta
            name = "LTW Project"
            encoding = "utf-8"
            author = "Fábio Sá, Inês Gaspar, Lourenço Gonçalves"
        >
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/layout.css">
        <link rel="stylesheet" href="../css/interactions.css">
        <link rel="stylesheet" href="../css/restaurant.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/register.css">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/order.css">
        <script src="../javascript/searchRestaurants.js" defer></script>
        <script src="../javascript/searchDishes.js" defer></script>
        <script src="../javascript/searchOrders.js" defer></script>
        <script src="../javascript/sendReview.js" defer></script>
        <script src="../javascript/buttons.js" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <header>
            <nav id="topbar" >
                <a href="../pages/index.php"><img href="../pages/index.php" src="../img/logo.png" alt="O Comilao logo" id="logo"></a>
                <a class="item" href="../pages/index.php"><h3>O Comilão</h3></a>
                <a class="item" href="../register/restaurant.register.php"><h3>Regista o teu restaurante</h3></a>
                <a class="item" href="../pages/car.php"><img src="../img/car.png"></a>
                <?php 
                    if (isset($_SESSION['id'])) drawLoginUser($_SESSION['id'], $_SESSION['name'], $_SESSION['photo']);
                    else drawDefaultUser(); 
                ?>
            </nav>
        </header>
    <main> <?php 
} 

function drawLoginUser(int $id, string $name, string $photo) { ?>
    <section id="login">
        <h3 class="loginItem"><a href="../actions/logout.action.php">Logout</a></h3>
        <h3 class="loginItem"><?=$name?></h3>
        <a href="../pages/profile.php?id=<?=$id?>" ><img src="<?=$photo?>" alt="profile image" id="profile"></a>
    </section>
<?php 
}

function drawDefaultUser() { ?>
    <section id="login">
        <h3 class="loginItem"><a href="../pages/login.php">Login</a></h3>
        <h3 class="loginItem"><a href="../register/user.register.php">Register</a></h3>
        <a href="../register/user.register.php"><img src="../img/profiles/default.png" alt="default profile image" id="profile"></a>
    </section>
<?php 
}

function drawFooter() { ?>
    </main>
        <footer>
            <nav>
                <h3><a href="../pages/index.php">Termos e Serviços</a></h3>
                <h3><a href="../pages/index.php">Fale connosco</a></h3>
                <h3><a href="../pages/index.php">Sobre nós</a></h3>
                <a href="twitter.com"><img src="../img/social/twitter.png" alt="twitter logo"></a>
                <a href= "instagram.com"><img src="../img/social/instagram.png" alt="instagram logo"></a>
                <a href="facebook.com"><img src="../img/social/facebook.png" alt="facebook logo"></a>
            </nav>
            <h3>&#169; O Comilão 2022</h3>
        </footer>
    </body>
</html> <?php 
}

function drawBanner() { ?>
    <section id="banner">
        <h1>O Comilão</h1>
        <h2>De comer e pagar por mais</h2>
    </section> <?php 
}

function drawLogin(Session $session) { ?>
    <section id="loginpage">
        <h1>Login</h1>
        <form action = "../actions/login.action.php" method = "post">
            <label>Email: <input type="email" name="email" value="<?=htmlentities($_SESSION['input']['email login'])?>"></label>
            <label>Password:<input type="password" name="password" value="<?=htmlentities($_SESSION['input']['password login'])?>"></label>
            <input id="button" type="submit" value="Entrar">
        </form>
    </section> <?php 
}

function drawMessages(Session $session) { ?>
    <section id="messages">
    <?php foreach ($session->getMessages() as $message) { ?>
        <article class="<?=$message['type']?>">
        <i class='fas fa-exclamation-circle'></i>
        <?=$message['text']?>
        </article>
    <?php } ?> </section> 
<?php 
}

function drawAcessDenied() { ?>
    <section id="accessDenied">
        <img src="/../img/denied.png" alt="acesso negado"> 
        <h2>Voltar para a <a href="../pages/index.php">página principal</a></h2>  
    </section> 
<?php } 
?>