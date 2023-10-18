<?php
  class Bird {

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
      $sql = 'SELECT * FROM birds';
      return self::find_by_sql($sql);
    }

    static public function find_by_id($id) {
      $sql = "SELECT * FROM birds ";
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
    public $common_name;
    public $habitat;
    public $food;
    public $nest_placement;
    public $behavior;
    public $conservation_id;
    public $backyard_tips;
    protected const CONSERVATION_OPTIONS = [1=> 'Low concern', 2=> 'Moderate concern', 3=> 'Extreme concern', 4=> 'Extinct'];

    public function __construct($args=[]) {
      $this->common_name = $args['common_name'] ?? NULL;
      $this->habitat = $args['habitat'] ?? NULL;
      $this->food = $args['food'] ?? NULL;
      $this->nest_placement = $args['$nest_placement'] ?? NULL;
      $this->behavior = $args['behavior'] ?? NULL;
      $this->conservation_id = $args['conservation_id'] ?? 1;
      $this->backyard_tips = $args['backyard_tips'] ?? NULL;
    }

    public function conservation() {
      if($this->conservation_id > 0 && $this->conservation_id < 5)
        return self::CONSERVATION_OPTIONS[$this->conservation_id];
      else
        return 'Error! Number must be between 1 and 4.';
    }
  }
?>
