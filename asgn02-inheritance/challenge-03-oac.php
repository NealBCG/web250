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

  $bicycle1 = new Bicycle;
  $bicycle1->brand = "Brand X";
  $bicycle1->model = "All-Terrain";
  $bicycle1->year = "2005";
  $bicycle1->description = "Well used.";
  $bicycle1->set_weight_kg(3.5);
  
  $bicycle2 = new Unicycle;
  $bicycle2->brand = "Brand Y";
  $bicycle2->model = "Electric";
  $bicycle2->year = "2022";
  $bicycle2->description = "Lightly used.";
  $bicycle2->set_weight_lbs(9);

  echo $bicycle1->name();
  echo $bicycle2->name();
  
  echo '<p>Bicycle1 weighs ' . $bicycle1->weight_kg() . ', which is ' . $bicycle1->weight_lbs() . '. ' . $bicycle1->wheel_details() . '</p>';

  echo '<p>Bicycle2 weighs ' . $bicycle2->weight_kg() . ', which is ' . $bicycle2->weight_lbs() . '. ' . $bicycle2->wheel_details() . '</p>';

?>