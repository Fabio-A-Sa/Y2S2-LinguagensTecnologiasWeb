<?php 
  declare(strict_types = 1); 
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');

function drawRestaurantDishes(array $dishes, int $owner) { ?>
  <section id="dishes">
  <?php foreach($dishes as $dish) { ?>
    <article class="dish">
      <img src="<?=htmlentities($dish->getPhoto())?>" alt="foto de um prato num restaurante">
      <h2><?=$dish->name?></h2>
      <h3>Tipo: <?=$dish->type?></h3>
      <h3>Categoria: <?=$dish->category?></h3>
      <h3>Preço: <?=$dish->price?> euros</h3>
      <?php if ($owner) {?>
      <a href="../edit/dish.edit.php?id=<?=$dish->id?>"><h3>Editar prato</h3></a>
      <?php } else { ?>
      <a href="../actions/addOrder.action.php?restaurant=<?=$dish->idRestaurant?>&quantity=1&dish=<?=$dish->id?>"><h3>Adicionar ao carrinho</h3></a>
      <a href="../actions/addFavDish.action.php?dish=<?=$dish->id?>"><h3>Adicionar aos pratos favoritos</h3></a>
      <?php } ?>
    </article>
  <?php } ?>
  </section> <?php 
}

function drawDishes(array $dishes) { ?>
  <?php foreach($dishes as $dish) { ?>
    <article class="dish" id="dish<?=$dish->id?>" alt="foto de um prato num restaurante">
      <img src="<?=$dish->getPhoto()?>">
      <h2><?=htmlentities($dish->name)?></h2>
      <h3>Tipo: <?=htmlentities($dish->type)?></h3>
      <h3>Categoria: <?=htmlentities($dish->category)?></h3>
      <button onclick="removeFavDish(<?=$dish->id?>)">Remover dos favoritos</button>
    </article>
  <?php }
}

function drawSearch(PDO $db, int $id) { 
  $types = Dish::getAttributes($db, "type");
  $categories = Dish::getAttributes($db, "category");
  ?>
  <section id="searchingDishes">
    <select id = "dishType" >
    <?php foreach($types as $type) { ?>
          <option value = "<?=$type?>"><?=$type?></option>
      <?php } ?>
    </select>
    <select id = "dishCategory" >
      <?php foreach($categories as $category) { ?>
          <option value = "<?=$category?>"><?=$category?></option>
      <?php } ?>
    </select>
    <button id="pesquisar" value="<?=$id?>">Pesquisar</button>
    <section id = "dishResults">
        
    </section>
  </section> <?php 
}

function drawEditDishForm(Dish $dish) { ?>
  <section id="editDish">
    <h1>Editar prato</h1>
    <form action="../actions/editDish.action.php" method="post">
      <label>Nome: <input type="text" name="name" required="required" value="<?=$_SESSION['input']['name oldDish']?>"></label>
      <label>Tipo: <input type="text" name="type" required="required" value="<?=$_SESSION['input']['type oldDish']?>"></label>
      <label>Categoria: <input type="text" name="category" required="required" value="<?=$_SESSION['input']['category oldDish']?>"></label>
      <label>Preço: <input type="text" name="price" required="required" value="<?=$_SESSION['input']['price oldDish']?>"></label>
      <input name="id" value="<?=$dish->id?>" hidden>
      <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
      <input id="button" type="submit" value="Concluir edição" >
    </form>
    <a href="../actions/removeDish.action.php?restaurant=<?=$dish->idRestaurant?>&id=<?=$dish->id?>"><h2>Eliminar prato</h2></a>
    <form action="../actions/uploadDish.action.php?restaurant=<?=$dish->idRestaurant?>&id=<?=$dish->id?>" method="post" enctype="multipart/form-data">
        <label>Foto do prato: <input type="file" name="image"></label>
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <input type="submit" value="Upload">
    </form>
  </section> <?php 
}

function newDishForm() { ?>
  <section id="newDish">
    <h1>Novo prato</h1>
    <form action="../actions/addDish.action.php" method="post">
      <label>Nome: <input type="text" name="name" required="required" value="<?=$_SESSION['input']['name newDish']?>"></label>
      <label>Tipo: <input type="text" name="type" required="required" value="<?=$_SESSION['input']['type newDish']?>"></label>
      <label>Categoria: <input type="text" name="category" required="required" value="<?=$_SESSION['input']['category newDish']?>"></label>
      <label>Preço: <input type="text" name="price" required="required" value="<?=$_SESSION['input']['price newDish']?>"></label>
      <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
      <input id="button" type="submit" value="Concluir" >
    </form>
  </section> <?php 
}