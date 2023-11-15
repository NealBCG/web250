<?php
  class Bird extends DatabaseObject {
    static protected $table_name = 'birds';
    static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

    public $id;
    public $common_name;
    public $habitat;
    public $food;
    public $conservation_id;
    public $backyard_tips;
    public const CONSERVATION = [1=>'Low concern', 2=>'Moderate concern', 3=>'Extreme concern', 4=>'Extinct'];

    public function __construct($args=[]) {
      $this->common_name = $args['common_name'] ?? 'American Black Bear';
      $this->habitat = $args['habitat'] ?? 'Your neighborhood';
      $this->food = $args['food'] ?? 'Everything';
      $this->conservation_id = $args['conservation_id'] ?? 1;
      $this->backyard_tips = $args['backyard_tips'] ?? 'Hang a bird feeder in your yard to watch a bear open the top and devour the seeds. Refill often.';
    }

    public function conservation() {
      if($this->conservation_id > 0 && $this->conservation_id < 5)
        return self::CONSERVATION [$this->conservation_id];
      else
        return 'Error! Number must be between 1 and 4.';
    }

    protected function validate() {
      $this->errors = [];
      if(is_blank($this->common_name))
        $this->errors[] = "Common name cannot be blank.";
      if(is_blank($this->habitat))
        $this->errors[] = "Habitat cannot be blank.";
      return $this->errors;
    }
  }
?>
