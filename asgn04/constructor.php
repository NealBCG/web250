<?php
  class Bird {
    public $commonName;
    public $latinName;

    public function __construct($commonName, $latinName) {
      $this->commonName = $commonName;
      $this->latinName = $latinName;
    }
  }
  $robin = new Bird("American Robin", "Turdus migratoris");

  echo "Common name: " . $robin->commonName . "<br>";
  echo "Latin name: ". $robin->latinName . "<br>";

  echo "<hr>";

  $towhee = new Bird("Eastern Towhee", "Pipilio erythrophthalmus");

  echo "Common name: " . $towhee->commonName . "<br>";
  echo "Latin name: ". $towhee->latinName . "<br>";
?>
