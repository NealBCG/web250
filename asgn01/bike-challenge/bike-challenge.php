<?php
  class Bicycle {
    var $brand;
    var $model;
    var $year;
    var $description;
    var $weight_kg;
    var $weight_lbs;

    function name() {
      return "<p>Brand: " . $this->brand . ". Model: " . $this->model . ". Year: " . $this->year . ".</p>";
    }

    function weight_lbs() {
      return $this->weight_kg * 2.2046226218;
    }

    function set_weight_lbs() {
      return $this->weight_kg = $this->weight_lbs / 2.2046226218;
    }
  }

  $bicycle1 = new Bicycle;
  $bicycle1->brand = "Brand X";
  $bicycle1->model = "All-Terrain";
  $bicycle1->year = "2005";
  $bicycle1->description = "Well used.";
  $bicycle1->weight_kg = 3.5;
  $bicycle1->weight_lbs = 0;
  

  $bicycle2 = new Bicycle;
  $bicycle2->brand = "Brand Y";
  $bicycle2->model = "Electric";
  $bicycle2->year = "2022";
  $bicycle2->description = "Lightly used.";
  $bicycle2->weight_kg = 0;
  $bicycle2->weight_lbs = 12;

  echo $bicycle1->name();
  echo $bicycle2->name();

  echo "<p>Bicycle1 weighs " . round($bicycle1->weight_lbs()) . "lbs.</p>";

  $bicycle2->set_weight_lbs();
  echo "<p>Bicycle2 weighs " . round($bicycle2->weight_kg, 1) . "kg.</p>";

?>