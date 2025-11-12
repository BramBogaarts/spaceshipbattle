<?php
require_once __DIR__ . '/php/objecten/spaceship.php';
$spaceship = new Spaceship("cheese", 10, 2, 5);
$spaceship->__getname();
$spaceship->__setname("aaaaa");
$spaceship->__gethp();
$spaceship->__sethp(5);
$spaceship->__getpower();
$spaceship->__setpower(6);
$spaceship->__getlength();
$spaceship->__setlength(1);
echo ($spaceship->__getname());
echo "\n";
echo ($spaceship->__gethp());
echo "\n";
echo ($spaceship->__getpower());
echo "\n";
echo ($spaceship->__getlength());
?>