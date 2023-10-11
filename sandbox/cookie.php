<?php
  class RoundCookie {
//class properties
    var $weight;
    var $color;
    var $icing;
  
//class methods
    function decorate() {
      return "drizzle " . $this->icing;
    }

    function consume() {

    }
  }

//instantiate object
  $cookie1 = new RoundCookie;
  $cookie1->weight = "2 oz";
  $cookie1->color = "green";
  $cookie1->icing = "cream cheese";
  $cookie1->decorate();

  $cookie2 = new RoundCookie;
  $cookie2->weight = "24 oz";
  $cookie2->color = "red";
  $cookie2->icing = "no";

  echo "<p>My first cookie weighs " . $cookie1->weight . ". It is " . $cookie1->color . " and is covered with " . $cookie1->icing . " icing.</p>";

  echo "<p>I will " . $cookie1->decorate() . " icing.</p>";

  echo "<p>My second cookie weighs " . $cookie2->weight . ". It is " . $cookie2->color . " and is covered with " . $cookie2->icing . " icing.</p>";
?>