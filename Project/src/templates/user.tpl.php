<?php 
  declare(strict_types = 1); 
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/templates/restaurant.tpl.php');
  require_once(dirname(__DIR__).'/templates/dish.tpl.php');

function drawUserInfo(User $user) { ?>
  <section id="user">
    <img src="<?=htmlentities($user->getPhoto())?>" alt="foto do utilizador">
    <h1><?=htmlentities($user->name)?></h1>
    <h3><?=htmlentities($user->email)?></h3>
    <h3><?=htmlentities($user->address)?></h3>
    <h3><?=$user->phoneNumber?></h3>
    <a href="../edit/profile.edit.php"><h2>Editar perfil</h2></a>
    <button id="allOrders">Ver Pedidos</button>
  </section> <?php 
}

function drawRegisterUser() { ?>
  <section id="registerUser">
      <h1>Register</h1>
      <form action="../actions/addUser.action.php" method="post">
          <label>Nome: <input type="text" name = "name" required="required" value="<?=htmlentities($_SESSION['input']['nome newUser'])?>"></label>
          <label>Morada: <input type="text" name="address" required="required" value="<?=htmlentities($_SESSION['input']['morada newUser'])?>"></label>
          <label>Telemóvel: <input type="text" name="phoneNumber" required="required" value="<?=$_SESSION['input']['telemovel newUser']?>"></label>
          <label>Email: <input type="email" name="email" required="required" value="<?=htmlentities($_SESSION['input']['email newUser'])?>"></label>
          <label>Password: <input type="password" name="password1" required="required" value="<?=htmlentities($_SESSION['input']['password1 newUser'])?>"></label>
          <label>Confirme password: <input type="password" name="password2" required="required" value="<?=htmlentities($_SESSION['input']['password2 newUser'])?>"></label>
          <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
          <input id="button" type="submit" value="Concluir registo">
      </form>
  </section> <?php 
}

function drawEditUserForm() { ?>
    <section id="editProfile">
        <h1>Editar perfil</h1>
        <form action="../actions/editProfile.action.php" method="post">
            <label>Nome: <input type="text" name="name" required="required" value="<?=htmlentities($_SESSION['input']['nome oldUser'])?>"></label>
            <label>Morada: <input type="text" name="address" required="required" value="<?=htmlentities($_SESSION['input']['morada oldUser'])?>"></label>
            <label>Telemóvel: <input type="text" name="phoneNumber" required="required" value="<?=$_SESSION['input']['telemovel oldUser']?>"></label>
            <label>Email: <input type="email" name="email" required="required" value="<?=htmlentities($_SESSION['input']['email oldUser'])?>"></label>
            <label>Antiga password: <input type="password" name="password1"></label>
            <label>Nova password: <input type="password" name="password2"></label>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input id="button" type="submit" value="Concluir edição" >
        </form>
        <form action="../actions/uploadProfileImage.action.php" method="post" enctype="multipart/form-data">
          <label>Foto de perfil: <input type="file" name="image"></label>
          <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
          <input type="submit" value="Upload">
        </form>
    </section> <?php 
}

function drawUser(int $id) {

  $db = getDatabaseConnection();
  $user = User::getUser($db, $id);
  drawUserInfo($user);

  ?><section id="more"><?php

  $restaurants = Restaurant::getRestaurantsByOwner($db, $id);
  if ($restaurants) {
    ?><section id="myRestaurants"><h2>Os meus restaurantes:</h2><?php
    drawMyRestaurants($restaurants);
    ?></section><?php
  }

  $favoriteRestaurants = $user->getFavoriteRestaurants($db);
  if ($favoriteRestaurants) {
    ?><section id="favoriteRestaurant"><h2>Os meus restaurantes favoritos:</h2><?php
    drawRestaurantsProfile($favoriteRestaurants);
    ?></section><?php
  }

  $favoriteDishes = $user->getFavoriteDishes($db);
  if ($favoriteDishes) {
    ?><section id="favoriteDish"><h2>Os meus pratos favoritos:</h2><?php
    drawDishes($favoriteDishes);
    ?></section><?php
  }
  ?></section><?php
}