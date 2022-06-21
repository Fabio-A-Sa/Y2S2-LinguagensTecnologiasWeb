<?php
  declare(strict_types = 1);

  class Review {

    public int $id;
    public int $idUser;
    public int $idRestaurant;
    public int $stars;
    public string $comment;
    public string $data;
    public string $answer;

    public function __construct(int $id, int $idUser, int $idRestaurant, int $stars, string $comment, string $data, string $answer)
    {
      $this->id = $id;
      $this->idUser = $idUser;
      $this->idRestaurant = $idRestaurant;
      $this->stars = $stars;
      $this->comment = $comment;
      $this->data = $data;
      $this->answer = $answer;
    }

    static function getPopularReviews(PDO $db, int $count) : array {
      $stmt = $db->prepare('SELECT id, idUser, idRestaurant, stars, comment, data
                            FROM Review 
                            ORDER BY stars DESC
                            LIMIT ?');
      $stmt->execute(array($count));
  
      $reviews = array();
      while ($review = $stmt->fetch()) {
          $reviews[] = new Review(
          intval($review['id']),
          intval($review['idUser']),
          intval($review['idRestaurant']),
          intval($review['stars']),
          $review['comment'],
          $review['data'],
          ""
        );
      }
  
      return $reviews;
    }

    static function getReviews(PDO $db, int $id) : array {
      $stmt = $db->prepare('SELECT id, idUser, idRestaurant, stars, comment, data, answer FROM Review WHERE idRestaurant = ?');
      $stmt->execute(array($id));
  
      $review = $stmt->fetch();
  
      $reviews = array();
      while ($review = $stmt->fetch()) {
        $reviews[] = new Review(
          intval($review['id']),
          intval($review['idUser']),
          intval($review['idRestaurant']),
          intval($review['stars']),
          $review['comment'],
          $review['data'],
          $review['answer'] = $review['answer'] != NULL ? $review['answer'] : "",
        );
      }
  
      return $reviews;
    }  

    function getPhoto() : string {
      $default = "/img/reviews/default.png";
      $attemp = "/img/reviews/review$this->id.png";
      return file_exists(dirname(__DIR__).$attemp) ? $attemp : $default;
    }

    function getInformation() : array { 

      $db = getDatabaseConnection();

      $stmt = $db->prepare('SELECT name FROM Restaurant WHERE id = ?');
      $stmt->execute(array($this->idRestaurant));
      $restaurantName = $stmt->fetch()['name'];

      $stmt = $db->prepare('SELECT User.* FROM User WHERE id = ?');
      $stmt->execute(array($this->idUser));
      $u = $stmt->fetch();
      $user = new User(
        intval($u['id']),
        $u['name'],
        $u['email'],
        $u['password'],
        $u['address'],
        intval($u['phoneNumber'])
      );

      $stmt = $db->prepare('SELECT User.* FROM User, Restaurant WHERE Restaurant.id = ? AND User.id = Restaurant.idOwner');
      $stmt->execute(array($this->idRestaurant));
      $u = $stmt->fetch();
      $owner = new User(
        intval($u['id']),
        $u['name'],
        $u['email'],
        $u['password'],
        $u['address'],
        intval($u['phoneNumber'])
      );

      $result = array('user' => $user, 'owner' => $owner, 'restaurantName' => $restaurantName);
      return $result;
  }
}
?>