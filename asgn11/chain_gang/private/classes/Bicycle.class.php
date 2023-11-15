<?php
  class Bicycle extends DatabaseObject {
    static protected $table_name = 'bicycles';
    static protected $db_columns = ['id', 'brand', 'model', 'year', 'category', 'color', 'description', 'gender', 
      'price', 'condition_id', 'weight_kg', 'description'];

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
    public $weight_kg = 0;
    protected static $wheels = 2;
    public const GENDER = ['male', 'female', 'unisex'];
    public const CATEGORIES = ['road', 'mountain', 'hybrid', 'cruiser', 'city', 'bmx'];
    public const CONDITION = [1=>'Beat up', 2=>'Decent', 3=>'Good', 4=>'Great', 5=>'Like new'];

    public function __construct($args=[]) {
      $this->brand = $args['brand'] ?? '';
      $this->model = $args['model']?? '';
      $this->year = $args['year']?? '';
      $this->category = $args['category']?? '';
      $this->color = $args['color']?? '';
      $this->description = $args['description']?? '';
      $this->gender = $args['gender']?? '';
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

    public function condition() {
      if($this->condition_id > 0)
        return self::CONDITION[$this->condition_id];
      else
        return 'Error!';
    }

    protected function validate() {
      $this->errors = [];
      if(is_blank($this->brand))
        $this->errors[] = "Brand cannot be blank.";
      if(is_blank($this->model))
        $this->errors[] = "Model cannot be blank.";
      return $this->errors;
    }
  }
?>