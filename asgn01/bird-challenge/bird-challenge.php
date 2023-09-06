<?php
  Class Bird {
    var $commonName;
    var $food;
    var $nestPlacement;
    var $conservationLevel;

    function song() {
      if($this->commonName == "Eastern Towhee")
        return "drink-your-tea!";
      elseif($this->commonName == "Indigo Bunting")
        return "what-what!";
    }

    function canFly() {
      if($this->commonName == "Eastern Towhee" || $this->commonName == "Indigo Bunting")
        return "This bird can fly";
    }
  }

  $bird1 = new Bird;
  $bird1->commonName = "Eastern Towhee";
  $bird1->food = "seeds, fruits, insects, spiders";
  $bird1->nestPlacement = "on the ground";
  $bird1->conservationLevel = "low";

  $bird2 = new Bird;
  $bird2->commonName = "Indigo Bunting";
  $bird2->food = "small seeds, berries, buds, and insects";
  $bird2->nestPlacement = "along roadsides, and railroad rights-of-ways, and on the edges of fields";
  $bird2->conservationLevel = "low";

  echo "<p>The first bird is the " . $bird1->commonName . ". This bird eats " . $bird1->food . ". This bird builds nests " . $bird1->nestPlacement . ". This bird's conservation level is " . $bird1->conservationLevel . ". This bird's song is " . $bird1->song() . " " . $bird1->canFly() . ".</p>";

  echo "<p>The second bird is the " . $bird2->commonName . ". This bird eats " . $bird2->food . ". This bird builds nests " . $bird2->nestPlacement . ". This bird's conservation level is " . $bird2->conservationLevel . ". This bird's song is " . $bird2->song() . " " . $bird2->canFly() . ".</p>";
?>