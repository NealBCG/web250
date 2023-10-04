<?php
  class Bicycle {
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
    public const CATEGORIES = ['road', 'mountain', 'all-terrain', 'cruiser', 'city', 'bmx'];
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