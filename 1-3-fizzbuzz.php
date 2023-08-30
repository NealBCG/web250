<?php

function fizzBuzz($i) {

if($i % 3 == 0 && $i % 5 == 0)
  return "FizzBuzz<br>";
elseif($i % 3 == 0)
  return "Fizz<br>";
elseif($i % 5 == 0)
  return "Buzz<br>";
else
  return $i . "<br>";
}
$i = 1;

while($i <= 100) {
  echo fizzBuzz($i);
  $i = $i + 1;
}
?>