<?php 
  declare(strict_types = 1); 
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');
  require_once(dirname(__DIR__).'/classes/review.class.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/database/connection.db.php');
function drawPopularReviews(array $reviews) { ?>
  <h2>Popular neste momento</h2>
  <section id="popular">
    <?php foreach($reviews as $review) { 
        $content = $review->getInformation(); ?> 
      <article class="item">
        <a href="restaurant.php?id=<?=$review->idRestaurant?>">
          <img src="<?=$review->getPhoto()?>" alt="foto inserida numa review/comentário relativo ao serviço do restaurante">
        </a>
          <header><h3><?=$content['restaurantName']?></h3></header>
          <cite>
              <h4><?=$review->comment?></h4>
          </cite>
          <span>Estrelas: <?=$review->stars?></span>
          <footer><h4><autor><?=$content['user']->name?></autor>, <?=$review->data?></h4></footer>
      </article>
    <?php } ?>
  </section> <?php 
}
function drawReviews(array $reviews, int $isOwner) { ?>
  <section id="reviews">
    <?php foreach($reviews as $review) { 
        $content = $review->getInformation(); ?> 
      <article class="item">
          <article class="review">
          <img id="reviewI" src="<?=$review->getPhoto()?>" value="<?=$review->id?>" alt="foto inserida numa review/comentário relativo ao serviço do restaurante">
          <h4 id="reviewN"><?=$content['user']->name?></h4>
          <h4 id="reviewC"><?=$review->comment?></h4>
          <h4 id="reviewD"><?=$review->data?></h4>
          <h4 id="reviewS">Avaliação: <?=$review->stars?> estrelas</h4>
        </article>
          <?php if ($review->answer != "") { ?>
            <article class="answer">
              <h4><?=$content['owner']->name?> respondeu:</h4>
              <h4><?=$review->answer; }?></h4>
            </article>
          <?php if ($review->answer == "" && $isOwner) { ?> 
            <section id="answer<?=$review->id?>">
              <button onclick="answer(<?=$review->id?>)">Responder</button>
            </section>
          <?php } ?>
      </article>
    <?php } ?>
  </section> <?php 
}
function drawFormReview(int $id) { ?>
  <section id="newReview">
    <textarea id="review" cols="60" rows = "5"></textarea>
    <select id = "stars" selected="5">
        <option value = "1">1</option>
        <option value = "2">2</option>
        <option value = "3">3</option>
        <option value = "4">4</option>
        <option value = "5">5</option>
    </select>
    <input hidden id="idRestaurant" value="<?=$id?>">
    <button id="sendReview">Enviar review</button>
  </section> <?php 
}