<?php 
  declare(strict_types = 1); 
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');

  function drawNewOrders(array $orders) { ?>
    <section id="newOrders">
    <h2>Novos pedidos</h2>
    <?php 
    if (count($orders)) {
    $total = 0;
    foreach ($orders as $order) { 
      $total += intval($order[3]) * floatval($order[1]->price);
      ?>
        <article class="order" id="cardish<?=$order[1]->id?>">
            <img src="<?=$order[1]->getPhoto()?>" alt="prato escolhido no pedido">
            <h3><?=htmlentities($order[1]->name)?> no restaurante "<?=htmlentities($order[0]->name)?>"</h3>
            <h3><?=htmlentities($order[2])?></h3>
            <h3 class="quantity">Quantidade: <?=$order[3]?></h3>
            <h3 class="price">Preço por unidade: <?=$order[1]->price?> euros</h3>
            <button onclick="removeOrder(<?=$order[1]->id?>)">Remover do carrinho</button>
        </article>
    <?php } ?>
    </section>
    <section id = "actions">
      <h3 id="total">Total: <?=$total?> euros</h3>
      <a href="../actions/buy.action.php"><h3>Comprar</h3></a>
    </section> <?php } else { ?>
      <h3 class="error">Sem pedidos</h3>
      </section> <?php
    }
}