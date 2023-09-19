<?php
  class Bicycle {
    public $brand;
    public $model;
    public $category;
    public $year;
    public $description;
    private $weight_kg = 0;
    protected static $wheels = 2;
    public static $instance_count = 0;
    public const CATEGORIES = ['road', 'mountain', 'all-terrain', 'cruiser', 'city', 'bmx'];

    public function name() {
      return '<p>Brand: ' . $this->brand . '. Model: ' . $this->model . '. Category: ' . $this->category . '. Year: ' . $this->year . '.</p>';
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

    public static function create() {
      self::$instance_count++;
      $newClass = get_called_class();
      return new $newClass;
    }
  }

  class Unicycle extends Bicycle {
    protected static $wheels = 1;
  }

  $bicycle = Bicycle::create();
  $bicycle->brand = "Brand X";
  $bicycle->model = "Townie";
  $bicycle->category = Bicycle::CATEGORIES[2];
  $bicycle->year = "2005";
  $bicycle->description = "Well used.";
  $bicycle->set_weight_kg(3.5);
  
  $unicycle = Unicycle::create();
  $unicycle->brand = "Brand Y";
  $unicycle->model = "Electric";
  $unicycle->category = Bicycle::CATEGORIES[4];
  $unicycle->year = "2022";
  $unicycle->description = "Lightly used.";
  $unicycle->set_weight_lbs(9);

  echo $bicycle->name();
  echo $unicycle->name();
  
  echo '<p>Bicycle weighs ' . $bicycle->weight_kg() . ', which is ' . $bicycle->weight_lbs() . '. ' . Bicycle::wheel_details() . '</p>';

  echo '<p>unicycle weighs ' . $unicycle->weight_kg() . ', which is ' . $unicycle->weight_lbs() . '. ' . Unicycle::wheel_details() . '</p>';

  echo '<p>The number of bicycles and unicycles created is ' . Bicycle::$instance_count . '.</p>';
?>
