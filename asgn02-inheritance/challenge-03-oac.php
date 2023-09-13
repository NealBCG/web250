<?php
  class Bicycle {
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight_kg;
    protected $wheels = 2;

    public function name() {
      return "<p>Brand: " . $this->brand . ". Model: " . $this->model . ". Year: " . $this->year . ".</p>";
    }

    public function weight_lbs() {
      return $this->weight_kg * 2.2046226218 . "lbs";
    }

    public function set_weight_lbs($num) {
      $this->weight_kg = $num / 2.2046226218;
    }

    protected function wheel_details() {
      if($this->wheels == 2)
        return "It has 2 wheels.";
      else
        return "It has 1 wheel.";
    }
    public function set_weight_kg($num) {
      return $this->weight_kg = $num;
    }

    public function weight_kg() {
      return $this->weight_kg . "kg";
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
  $bicycle1->set_weight_kg(4);

  echo $bicycle1->name();
  echo $bicycle2->name();
  
  echo "<p>Bicycle1 weighs " . $bicycle1->weight_lbs() . ". " . $this->wheel_details() . "</p>";

  $bicycle2->set_weight_lbs(9);
  echo "<p>Bicycle2 weighs " . round($bicycle2->weight_kg(), 1) . ". " . $this->wheel_details() . "</p>";

?>