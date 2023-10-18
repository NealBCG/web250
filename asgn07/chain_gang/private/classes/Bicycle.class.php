<?php
  class Bicycle {
    static protected $database;

    static public function set_database($database) {
      self::$database = $database;
    }

    static public function find_by_sql($sql) {
      $result = self::$database->query($sql);
      if(!$result)
        exit("Database query failed");

        $object_array = [];
      while($record = $result->fetch_assoc()) {
        $object_array[] = self::instantiate($record);
      }
      $result->free();
      return $object_array;
    }

    static public function find_all() { 
      $sql = 'SELECT * FROM bicycles';
      return self::find_by_sql($sql);
    }

    static public function find_by_id($id) {
      $sql = "SELECT * FROM bicycles ";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
      $obj_array =  self::find_by_sql($sql);
      if(!empty($obj_array))
        return array_shift($obj_array);
      else
        return false;
    }

    static protected function instantiate($record) {
      $object = new self;
      foreach($record as $property => $value) {
        if(property_exists($object, $property))
          $object->$property = $value;
      }
      return $object;
    }

    public $id;
    public $brand;
    public $model;
    public $year;
    public $category;
    public $color;
    public $description;
    public $gender;
    public $price;
    public $condition_id;
    private $weight_kg = 0;
    protected static $wheels = 2;
    public static $instance_count = 0;
    public const GENDER = ['male', 'female', 'unisex'];
    public const CATEGORIES = ['road', 'mountain', 'hybrid', 'cruiser', 'city', 'bmx'];
    public const CONDITION = [1=>'Beat up', 2=>'Decent', 3=>'Good', 4=>'Great', 5=>'Like new'];

    public function __construct($args=[]) {
      $this->brand = $args['brand'] ?? NULL;
      $this->model = $args['model'] ?? NULL;
      $this->year = $args['year'] ?? NULL;
      $this->category = $args['category'] ?? NULL;
      $this->color = $args['color'] ?? NULL;
      $this->description = $args['description'] ?? NULL;
      $this->gender = $args['gender'] ?? NULL;
      $this->price = $args['price'] ?? 0;
      $this->condition_id = $args['condition_id'] ?? 1;
      $this->weight_kg = $args['weight_kg'] ?? 0;
    }

    public function name() {
      return "{$this->brand} {$this->model} {$this->year}";
    }
    public function weight_kg() {
      return $this->weight_kg . ' kg';
    }
  
    public function set_weight_kg($value) {
      $this->weight_kg = floatval($value);
    }
  
    public function weight_lbs() {
      $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
      return round($weight_lbs) . ' lbs';
    }
  
    public function set_weight_lbs($value) {
      $this->weight_kg = round((float)$value / 2.2046226218);
    }

    public static function wheel_details() {
      if(self::$wheels == 2)
        return 'It has 2 wheels.';
      else
        return 'It has 1 wheel.';
    }

    // The condition function looks through the CONDITION array and pulls out the string that corresponds to the number assigned to condition_id. We could also forgo the array and use a series of ifelse statements for each value, but it is more efficient to use an array with a single if statement. 
    public function condition() {
      if($this->condition_id > 0)
        return self::CONDITION[$this->condition_id];
      else
        return 'Error!';
    }

    public static function create() {
      self::$instance_count++;
      $newClass = get_called_class();
      return new $newClass;
    }
  }
?>