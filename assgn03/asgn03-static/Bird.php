<?php

  class Bird {
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    public $flying = "yes";
    public static $instance_count = 0;
    public static $egg_num = 0;

    function can_fly() {
      ($this->flying == "yes") ? $flying_string = "can fly" : $flying_string = "is stuck on the ground";
      return  $flying_string;
    }

    public static function create() {
      self::$instance_count++;
      $newClass = get_called_class();
      return new $newClass;
    }
  }

  class YellowBelliedFlyCatcher extends Bird {
    public $name = "yellow-bellied flycatcher";
    public $diet = "mostly insects.";
    public $song = "flat chilk";
    public static $egg_num = "3-4, sometimes 5.";
  }

  class Kiwi extends Bird {
    public $name = "kiwi";
    public $diet = "omnivorous";
    public $flying = "no";
  }
