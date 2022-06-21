<?php 
  declare(strict_types = 1); 
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');

  function drawOrders(array $orders) { ?>
    <section id="orders">
    <h2>Todos os pedidos</h2>
    <?php if (count($orders)) {
    foreach ($orders as $order) { ?>
        <article class="newOrder">
            <section id="info">
              <img src="<?=$order[0]->getPhoto()?>" alt="foto do prato pedido">
              <h3>Nome do Prato: <?=htmlentities($order[0]->name)?></h3>
              <h3>Categoria: <?=htmlentities($order[0]->category)?></h3>
              <h3>Tipo: <?=htmlentities($order[0]->type)?></h3>
              <h3>Preço: <?=$order[0]->price?></h3>
              <h3>Quantidade: <?=$order[1]?></h3>
              <h3>Quem pediu: <?=htmlentities($order[2])?></h3>
              <h3 id="state<?=$order[0]->id?><?=$order[3]?>">Estado do pedido: <?=htmlentities($order[4])?></h3>
            </section>
            <section class = "changeStatus" id = "changeState<?=$order[0]->id?><?=$order[3]?>">
                <input list="stateList">
                <datalist name="state" id="stateList">
                  <option>Pendente</option>
                  <option>Cancelado</option>
                  <option>Em preparação</option>
                  <option>Pronto</option>
                  <option>Entregue</option>
                </datalist>
                <input type="hidden" name="id" value="<?=$order[3]?>">
                <input type="hidden" name="idDish" value="<?=$order[0]->id?>">
                <input type="hidden" name="restaurant" value="<?=$order[0]->idRestaurant?>">
                <button onclick="changeState(<?=$order[0]->id?>,<?=$order[3]?>)">Guardar alteração</button>
            </section>
        </article> <?php } } else { ?> <h3 class="error">Sem pedidos pendentes</h3>
    </section> <?php 
} }