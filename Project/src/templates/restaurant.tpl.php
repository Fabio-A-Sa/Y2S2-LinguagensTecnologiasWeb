<?php 
  declare(strict_types = 1); 
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/templates/dish.tpl.php');
  require_once(dirname(__DIR__).'/templates/review.tpl.php');
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/classes/review.class.php');

function drawRestaurants(array $restaurants) { ?>
  <section id="restaurants">
    <h2>Top 3 restaurantes</h2>
    <?php foreach($restaurants as $restaurant) { ?> 
      <article class="restaurant" style="background-image: url(<?=htmlentities($restaurant->getPhoto())?>)">
        <a href="restaurant.php?id=<?=$restaurant->id?>">
          <h2><?=htmlentities($restaurant->name)?></h2>
        </a>
      </article>
    <?php } ?>
  </section> <?php 
} 

function drawRestaurantInfo(Restaurant $restaurant, float $stars, User $owner) { ?>
  <section id="info">
    <h1 id="infoRT"><?=htmlentities($restaurant->name)?>, com <?=$stars?> estrelas</h1>
    <img id="infoR" src="<?=htmlentities($restaurant->getPhoto())?>" alt="foto de capa do restaurante">
    <h2 id="infoRA">Morada: <?=htmlentities($restaurant->address)?></h2>
    <h3 id="infoRC">Contactos: <?=$restaurant->phoneNumber?></h3>
    <h3 id="infoRO">Dono/a: <?=htmlentities($owner->name)?></h3> 
    <h3 id="infoCSRF" value="<?=$_SESSION['csrf']?>" hidden></h3> <?php if (isset($_SESSION['id'])) { ?>
    <button onclick="addFavRestaurant(<?=$restaurant->id?>)">Adicionar aos restaurantes favoritos</button>
    <?php } ?>
  </section> <?php 
}

function drawRestaurant(int $id) { 
  $db = getDatabaseConnection();
  $restaurant = Restaurant::getRestaurant($db, $id);
  $stars = Restaurant::getStars($db, $id);
  $dishes = Dish::getDishesFromRestaurant($db, $id);
  $owner = User::getUser($db, $restaurant->idOwner);
  $reviews = Review::getReviews($db, $id);
  drawRestaurantInfo($restaurant, $stars, $owner);
  if (isset($_SESSION['id']) && $_SESSION['id'] == $restaurant->idOwner) {
    drawEditButtons($id);
    drawRestaurantDishes($dishes, 1);
    drawReviews($reviews, 1);
  } else {
    drawSearch($db, $id);
    if (isset($_SESSION['id']) && User::buy($db ,$id)) drawFormReview($id);
    drawReviews($reviews, 0);
  }
}

function drawEditButtons(int $id) { ?>
  <section id="editRestaurant">
      <a href="../edit/restaurant.edit.php?id=<?=$id?>"><button>Editar restaurante</button></a>
      <a href="../register/dish.register.php?restaurant=<?=$id?>"><button>Adicionar prato</button></a>
      <a href="order.php?id=<?=$id?>"><button>Todos os pedidos</button></a>
  </section> <?php 
}

function drawRestaurantsProfile(array $restaurants) { ?>
  <?php foreach ($restaurants as $restaurant) { ?>
    <article class="restaurantItem" id="restaurant<?=$restaurant->id?>">
      <a href="../pages/restaurant.php?id=<?=$restaurant->id?>"><img src="<?=htmlentities($restaurant->getPhoto())?>"></a>
      <h1><?=htmlentities($restaurant->name)?></h1>
      <button onclick="removeFavRestaurant(<?=$restaurant->id?>)">Remover dos favoritos</button>
    </article>
    <?php } 
}

function drawMyRestaurants(array $restaurants) { ?>
  <?php foreach ($restaurants as $restaurant) { ?>
    <article class="restaurantItem">
      <a href="../pages/restaurant.php?id=<?=$restaurant->id?>"><img src="<?=htmlentities($restaurant->getPhoto())?>"></a>
      <h1><?=htmlentities($restaurant->name)?></h1>
    </article>
    <?php }
}

function drawRestaurantSearch() { ?>
    <section id = "searching">
      <select id = "critério" >
        <option value = "nameR">Nome do Restaurante</option>
        <option value = "nameD">Nome do Prato</option>
        <option value = "averageR">Média de estrelas</option>
      </select>
      <input id="searchrestaurant" type="text" placeholder="pesquisa">
      <section id="searchrestaurants">
      </section>
  </section> <?php 
}

function drawEditRestaurantForm(int $id) { ?>
  <section id="editRestaurant">
    <h1>Editar restaurante</h1>
    <form action="../actions/editRestaurant.action.php?id=<?=$id?>" method="post">
      <label>Nome: <input type="text" name="name" required="required" value="<?=htmlentities($_SESSION['input']['name oldRestaurant'])?>"></label>
      <label>Morada: <input type="text" name="address" required="required" value="<?=htmlentities($_SESSION['input']['address oldRestaurant'])?>"></label>
      <label>Telefone: <input type="text" name="phoneNumber" required="required" value="<?=$_SESSION['input']['phoneNumber oldRestaurant']?>"></label>
      <input type="text" name="id" value="<?=$id?>" hidden>
      <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
      <input id="button" type="submit" value="Concluir edição">
    </form>
    <form action="../actions/uploadRestaurant.action.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
      <label>Foto do restaurante: <input type="file" name="image"></label>
      <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
      <input type="submit" value="Upload">
    </form>
  </section> <?php 
}

function drawRegisterRestaurant() { ?>
  <section id="registerRestaurant">
      <h1>Regista o teu restaurante</h1>
      <form action="../actions/addRestaurant.action.php" method="post">
          <label>Nome do restaurante: <input type="text" name="name" required="required" value="<?=htmlentities($_SESSION['input']['name newRestaurant'])?>"></label>
          <label>Morada: <input type="text" name="address" required="required" value="<?=htmlentities($_SESSION['input']['address newRestaurant'])?>"></label>
          <label>Telefone: <input type="text" name="phoneNumber" required="required" value="<?=$_SESSION['input']['phoneNumber newRestaurant']?>"></label>
          <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
          <input id="button" type="submit" value="Concluir registo do restaurante">    
      </form>
  </section> <?php 
}