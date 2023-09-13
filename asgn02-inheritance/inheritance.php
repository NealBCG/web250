<?php
class Furniture {
  public $function;
  public $style;
  protected $yearMade;

  public function isAntique($yearMade, $currentYear) {
    if ($yearMade + 100 <= $currentYear)
      return " is an antique.";
    else
      return " is not an antique.";
  }

}

class Table extends Furniture {
  public $legs;
  public $flatTop;
}

class Chair extends Furniture {
  public $seatCushion;
  protected $arms;
}

class RockingChair extends Chair {
  private $rockers;
}

$chair1 = new Chair;
$chair1->function = "seat";
$chair1->style = "mid-century modern";
$chair1->yearMade = 2005;
$chair1->seatCushion = "has a cushion";
$chair1->arms = "has arms";

$chair2 = new RockingChair;
$chair2->function = "seat";
$chair2->style = "shaker";
$chair2->yearMade = 1920;
$chair2->seatCushion = "does not have a cushion";
$chair2->arms = "has arms";
$chair2->rockers = "has rockers";

Echo "<p>Chair1 functions as " . $chair1->function . ". It was made in a " . $chair1->style. " style. It was made in the year " . $chair1->yearMade . ". Chair1 " . $chair1->seatCushion . " and " . $chair1->arms . ". Chair1 " . $chair1->isAntique($chair1->yearMade, 2023) . "</p>";

Echo "<p>Chair2 functions as " . $chair2->function . ". It was made in a " . $chair2->style. " style. It was made in the year " . $chair2->yearMade . ". Chair2 " . $chair2->seatCushion . ", " . $chair2->arms . ", and ". $chair2->rockers . ". Chair2 " . $chair2->isAntique($chair2->yearMade, 2023) . "</p>";

?>
