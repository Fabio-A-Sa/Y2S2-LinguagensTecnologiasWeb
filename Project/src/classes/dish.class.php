<?php
  declare(strict_types = 1);

  class Dish {

    public int $id;
    public string $name;
    public string $type;
    public string $category;
    public float $price;
    public string $photo;
    public int $idRestaurant;

    public function __construct(int $id, string $name, string $type, string $category, float $price, int $idRestaurant) { 
      $this->id = $id;
      $this->name = $name;
      $this->type = $type;
      $this->category = $category;
      $this->price = $price;
      $this->photo = $this->getPhoto();
      $this->idRestaurant = $idRestaurant;
    }

    static function getDishes(PDO $db, int $count) : array {

      $stmt = $db->prepare('SELECT * FROM Dish LIMIT ?');
      $stmt->execute(array($count)); 
  
      $dishes = array();
      while ($dish = $stmt->fetch()) {
        $dishes[] = new Dish(
            intval($dish['id']),
            $dish['name'],
            $dish['type'],
            $dish['category'],
            floatval($dish['price']),
            intval($dish['idRestaurant']),
        );
      }
  
      return $dishes;
    }

    static function getDishesFromRestaurant(PDO $db, int $id) : array {

      $stmt = $db->prepare('SELECT * FROM Dish WHERE Dish.idRestaurant = ?');
      $stmt->execute(array($id));
  
      $dishes = array();
      while ($dish = $stmt->fetch()) {
        $dishes[] = new Dish(
            intval($dish['id']),
            $dish['name'],
            $dish['type'],
            $dish['category'],
            floatval($dish['price']),
            intval($dish['idRestaurant']),
        );
      }
      return $dishes;
    }

    static function getPendingOrders(PDO $db, int $id) : array {

      $stmt = $db->prepare('SELECT Dish.*, UserOrder.quantity, UserOrder.state, User.name AS owner, User.id AS userID
                            FROM Dish, UserOrder, User 
                            WHERE Dish.idRestaurant = ? 
                            AND UserOrder.state <> "Cancelado" AND UserOrder.state <> "Entregue"
                            AND UserOrder.idDish = Dish.id
                            AND UserOrder.idUser = User.id');
      $stmt->execute(array($id));
  
      $orders = array();
      while ($dish = $stmt->fetch()) {
        $currentDish = new Dish(
          intval($dish['id']),
          $dish['name'],
          $dish['type'],
          $dish['category'],
          floatval($dish['price']),
          intval($dish['idRestaurant']));
        $orders[] = array($currentDish, $dish['quantity'], $dish['owner'], $dish['userID'], $dish['state']);
      }
      return $orders;
    }

    static function getDish(PDO $db, int $id) : Dish {

      $stmt = $db->prepare('SELECT * FROM Dish WHERE id = ?');
      $stmt->execute(array($id));
  
      $dish = $stmt->fetch();

      return new Dish(
        intval($dish['id']),
        $dish['name'],
        $dish['type'],
        $dish['category'],
        floatval($dish['price']),
        intval($dish['idRestaurant']),
      );
    }  

    static function getAttributes(PDO $db, string $attribute) : array {
      
      $result = array();
      $querie = "SELECT $attribute FROM Dish GROUP BY $attribute";
      $stmt = $db->prepare($querie);
      $stmt->execute();

      while ($attemp = $stmt->fetch()) {
        $result[] = $attemp[$attribute];
      }
      return $result;
    }

    function getPhoto() : string {

      $default = "/img/dishes/default.png";
      $attemp =  "/img/dishes/dish$this->id.png";
      return file_exists(dirname(__DIR__).$attemp) ? $attemp : $default;
      
    } 
    
    static function search(PDO $db, int $id, string $type, string $category) : array {

      $result = array();
      $querie = ' SELECT Dish.*
                  FROM Dish
                  WHERE Dish.idRestaurant = ? AND
                        Dish.type = ? AND
                        Dish.category = ?                               ';
      
      $stmt = $db->prepare($querie);
      $stmt->execute(array($id, $type, $category));

      while ($dish = $stmt->fetch()) {

        $dish = new Dish(intval($dish['id']),
                          $dish['name'],
                          $dish['type'],
                          $dish['category'],
                          floatval($dish['price']),
                          intval($dish['idRestaurant']),
                        );
                        
        $result[] = array(
                   "id" => $dish->id,
                   "name" => $dish->name,
                   "type" => $dish->type,
                   "category" => $dish->category,
                   "price" => $dish->price,
                   "photo" => $dish->getPhoto(),
                   "idRestaurant" => $dish->idRestaurant,
                  );
      }
      return $result;
    }

    function save($db) {
      $stmt = $db->prepare('
        UPDATE Dish SET name = ?, type = ?, category = ?, price = ?
        WHERE id = ?
      ');
  
      $stmt->execute(array($this->name, $this->type, $this->category, $this->price,
                            $this->id));
    }
  }
?>