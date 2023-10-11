<?php
  class Bicycle {
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight_kg = 0;
    protected $wheels = 2;

    public function name() {
      return '<p>Brand: ' . $this->brand . '. Model: ' . $this->model . '. Year: ' . $this->year . '.</p>';
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

    public function wheel_details() {
      if($this->wheels == 2)
        return 'It has 2 wheels.';
      else
        return 'It has 1 wheel.';
    }
  }

  class Unicycle extends Bicycle {
    protected $wheels = 1;
  }

  $bicycle = new Bicycle;
  $bicycle->brand = "Brand X";
  $bicycle->model = "All-Terrain";
  $bicycle->year = "2005";
  $bicycle->description = "Well used.";
  $bicycle->set_weight_kg(3.5);
  
  $unicycle = new Unicycle;
  $unicycle->brand = "Brand Y";
  $unicycle->model = "Electric";
  $unicycle->year = "2022";
  $unicycle->description = "Lightly used.";
  $unicycle->set_weight_lbs(9);

  echo $bicycle->name();
  echo $unicycle->name();
  
  echo '<p>Bicycle weighs ' . $bicycle->weight_kg() . ', which is ' . $bicycle->weight_lbs() . '. ' . $bicycle->wheel_details() . '</p>';

  echo '<p>Unicycle weighs ' . $unicycle->weight_kg() . ', which is ' . $unicycle->weight_lbs() . '. ' . $unicycle->wheel_details() . '</p>';

?>