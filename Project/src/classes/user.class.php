<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');

  class User {

    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public string $address;
    public int $phoneNumber;

    public function __construct(int $id, string $name, string $email, string $password, string $address, int $phoneNumber) { 
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->address = $address;
      $this->phoneNumber = $phoneNumber;
    }

    public function getName() : string {
      $names = explode(" ", $this->name);
      return count($names) > 1 ? $names[0] . " " . $names[count($names)-1] : $names[0];
    }

    static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {

      $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
      $stmt->execute(array(strtolower($email)));
      $user = $stmt->fetch();
      if ($user !== false && password_verify($password, $user['password'])) {
        return new User(
          intval($user['id']),
          $user['name'],
          $user['email'],
          $user['password'],
          $user['address'],
          intval($user['phoneNumber']),
        );
      } else return null;
    }

    static function getUsers(PDO $db, int $count) : array {

      $stmt = $db->prepare('SELECT id, name, email, password, address, phoneNumber FROM User LIMIT ?');
      $stmt->execute(array($count));
  
      $users = array();
      while ($user = $stmt->fetch()) {
        $users[] = new User(
          intval($user['id']),
          $user['name'],
          $user['email'],
          $user['password'],
          $user['address'],
          intval($user['phoneNumber']),
        );
      }
  
      return $users;
    }

    static function getUser(PDO $db, int $id) : User {

      $stmt = $db->prepare('SELECT id, name, email, password, address, phoneNumber FROM User WHERE id = ?');
      $stmt->execute(array($id));
  
      $user = $stmt->fetch();
  
      return new User(
          intval($user['id']),
          $user['name'],
          $user['email'],
          $user['password'],
          $user['address'],
          intval($user['phoneNumber']),
      );
    }  

    function save($db) {
      $stmt = $db->prepare('
        UPDATE User SET name = ?, email = ?, password = ?, address = ?, phoneNumber = ?
        WHERE id = ?
      ');

      $stmt->execute(array($this->name, $this->email, $this->password, 
                                    $this->address, $this->phoneNumber, $this->id));
    }

    function getPhoto() : string {

      $default = "/img/profiles/default.png";
      $attemp = "/img/profiles/profile$this->id.png";
      if (file_exists(dirname(__DIR__).$attemp)) {
        $_SESSION['photo'] = $attemp;
        return $attemp;
      } else return $default;
    }  

    function getFavoriteDishes(PDO $db) : ?array {

      $stmt = $db->prepare('SELECT * FROM FavoriteDish WHERE idUser = ?');
      $stmt->execute(array($this->id));

      $dishes = array();
      while ($line = $stmt->fetch()) {
        $dishes[] = Dish::getDish($db, intval($line['idDish']));
      }

      return $dishes;
    }

    function getFavoriteRestaurants(PDO $db) : array {

      $stmt = $db->prepare('SELECT * FROM FavoriteRestaurant WHERE idUser = ?');
      $stmt->execute(array($this->id));

      $restaurants = array();
      while ($line = $stmt->fetch()) {
        $restaurants[] = Restaurant::getRestaurant($db, intval($line['idRestaurant']));
      }

      return $restaurants;
    }

    function getOldOrders(PDO $db) : array {

      $stmt = $db->prepare("SELECT * FROM UserOrder WHERE idUser = ? AND (state = 'Cancelado' OR state = 'Entregue')");
      $stmt->execute(array($this->id));

      $orders = array();
      while ($line = $stmt->fetch()) {
        $dish = Dish::getDish($db, intval($line['idDish']));
        $orders[] = array(  Restaurant::getRestaurant($db, intval($dish->idRestaurant)),
                            $dish,
                            $dish->getPhoto(),
                            $line['data'],
                            $line['state'],
                            $line['quantity']                                                );
      }

      return $orders;
    }

    function getCarOrders(PDO $db) {

      $stmt = $db->prepare('SELECT * FROM Car WHERE idUser = ?');
      $stmt->execute(array($this->id));

      $orders = array();
      while ($line = $stmt->fetch()) {
        $orders[] = array(  Restaurant::getRestaurantByDish($db, intval($line['idDish'])),
                            Dish::getDish($db, intval($line['idDish'])),
                            $line['data'],   
                            $line['quantity']
                                                                       );
      }

      return $orders;
    }

    function getNewOrders(PDO $db) : array {

      $stmt = $db->prepare("SELECT * FROM UserOrder WHERE idUser = ? AND (state <> 'Cancelado' AND state <> 'Entregue')");
      $stmt->execute(array($this->id));

      $orders = array();
      while ($line = $stmt->fetch()) {
        $dish = Dish::getDish($db, intval($line['idDish']));
        $orders[] = array(  Restaurant::getRestaurant($db, intval($dish->idRestaurant)),
                            $dish,
                            $dish->getPhoto(),
                            $line['data'],
                            $line['state'],
                            $line['quantity']                                                );
      }

      return $orders;
    }

    static function buy(PDO $db, int $id) : bool {

      $stmt = $db->prepare("SELECT * FROM UserOrder, Dish WHERE UserOrder.idUser = ? AND Dish.idRestaurant = ? AND Dish.id = UserOrder.idDish");
      $stmt->execute(array(intval($_SESSION['id']), $id));
      $attemp = $stmt->fetch();

      return $attemp != NULL;
    }
  }
?>