<?php
  declare(strict_types = 1);
  require_once('user.class.php');

  class Restaurant {

    public int $id;
    public string $name;
    public string $address;
    public int $phoneNumber;
    public int $idOwner;
    
    public function __construct(int $id, string $name, string $address, int $phoneNumber, int $idOwner) { 
      $this->id = $id;
      $this->name = $name;
      $this->address = $address;
      $this->phoneNumber = $phoneNumber;
      $this->idOwner = $idOwner;
    }

    static function getRestaurants(PDO $db, int $count) : array {

      $stmt = $db->prepare('SELECT id, name, address, phoneNumber, idOwner FROM Restaurant LIMIT ?');
      $stmt->execute(array($count));
  
      $restaurants = array();
      while ($restaurant = $stmt->fetch()) {
        $restaurants[] = new Restaurant(
          intval($restaurant['id']),
          $restaurant['name'],
          $restaurant['address'],
          intval($restaurant['phoneNumber']),
          intval($restaurant['idOwner']),
        );
      }
  
      return $restaurants;
    }

    static function getRestaurant(PDO $db, int $id) : Restaurant {

      $stmt = $db->prepare('SELECT id, name, address, phoneNumber, idOwner FROM Restaurant WHERE id = ?');
      $stmt->execute(array($id));
  
      $restaurant = $stmt->fetch();
  
      return new Restaurant(
          intval($restaurant['id']),
          $restaurant['name'],
          $restaurant['address'],
          intval($restaurant['phoneNumber']),
          intval($restaurant['idOwner']),
      );
    }  

    static function getRestaurantByDish(PDO $db, int $id) : Restaurant {

      $stmt = $db->prepare('SELECT Restaurant.* FROM Restaurant, Dish WHERE Dish.idRestaurant = Restaurant.id AND Dish.id = ?');
      $stmt->execute(array($id));
  
      $restaurant = $stmt->fetch();
  
      return new Restaurant(
          intval($restaurant['id']),
          $restaurant['name'],
          $restaurant['address'],
          intval($restaurant['phoneNumber']),
          intval($restaurant['idOwner']),
      );
    }  

    static function getRestaurantsByOwner(PDO $db, int $id) : ?array {

      $stmt = $db->prepare('SELECT * FROM Restaurant WHERE idOwner = ?');
      $stmt->execute(array($id));

      $result = array();
      while ($restaurant = $stmt->fetch()) {
        $result[] = new Restaurant(
          intval($restaurant['id']),
          $restaurant['name'],
          $restaurant['address'],
          intval($restaurant['phoneNumber']),
          intval($restaurant['idOwner']),
        );
      }
      return count($result) ? $result : null;
    }

    static function getStars(PDO $db, int $id) : float {

      $stmt = $db->prepare('SELECT round(avg(Review.stars), 2) as stars
                            FROM Review
                            WHERE Review.idRestaurant = ?
                            GROUP BY Review.idRestaurant');
      $stmt->execute(array($id));
      $result = $stmt->fetch()['stars'] ?? 0;
      return floatval($result);
    } 
    
    function getPhoto() : string {

      $default = "/img/restaurants/default.png";
      $attemp =  "/img/restaurants/restaurant$this->id.png";
      return file_exists(dirname(__DIR__).$attemp) ? $attemp : $default;
    }
    
    function save($db) {
      $stmt = $db->prepare('
        UPDATE Restaurant SET name = ?, address = ?, phoneNumber = ?
        WHERE id = ?
      ');

      $stmt->execute(array($this->name, $this->address, $this->phoneNumber, 
                            $this->id));
    }

    static function search(PDO $db, string $search, string $type) : array {

      $querie = '';
      $result = array();

      switch ($type) {
        case "nameR":
            $querie = 'SELECT * FROM Restaurant WHERE name LIKE ?';
            break;
        case "nameD":
            $querie = 'SELECT Restaurant.* 
                       FROM Restaurant, Dish
                       WHERE Restaurant.id = Dish.idRestaurant AND 
                             Dish.name LIKE ?
                       GROUP BY Restaurant.id';
            break;
        case "averageR":
            $querie = 'SELECT Restaurant.*
                       FROM Restaurant, (
                            SELECT round(avg(Review.stars), 2) AS tempSTARS, Review.idRestaurant AS tempID
                            FROM Review
                            GROUP BY Review.idRestaurant
                            HAVING tempStars LIKE ?
                            ) AS Temp
                        WHERE Temp.tempID = Restaurant.id';
            break;
        default:  
            return $result;
      }

      $stmt = $db->prepare($querie);
      $stmt->execute(array('%'.$search.'%'));

      while ($restaurant = $stmt->fetch()) {
        $result[] = new Restaurant(
          intval($restaurant['id']),
          $restaurant['name'],
          $restaurant['address'],
          intval($restaurant['phoneNumber']),
          intval($restaurant['idOwner']),
        );
      }
      return $result;
    }
  }
?>