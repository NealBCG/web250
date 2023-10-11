<?php
  class Bird {
    public $commonName;
    public $latinName;

    public function __construct($args=[]) {
      $this->commonName = $args['commonName'] ?? NULL;
      $this->latinName = $args['latinName'] ?? NULL;
    }
  }

$flyCatcher = new Bird(['commonName'=>'Acadian Flycatcher', 'latinName'=>'Empidonax Virescens']);

echo "Common name: " . $flyCatcher->commonName . "<br>";
echo "Latin name: ". $flyCatcher->latinName . "<br>";

echo "<hr>";

$wren = new Bird(['commonName'=>'Carolina Wren', 'latinName'=>'Thryothorus Ludovicianus']);

echo "Common name: " . $flyCatcher->commonName . "<br>";
echo "Latin name: ". $flyCatcher->latinName . "<br>";
?>
