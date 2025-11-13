<?php
require_once __DIR__ . '/php/objecten/spaceship.php';
require_once __DIR__ . '/php/objecten/turret.php';

$turret = new Turret(20,10,5,5,10);

$spaceship = new Spaceship("turret", 10, 2, 5);
$spaceship->setName("turret");
$spaceship->setHealth(10);
$spaceship->setPower(2); 
$spaceship->setLength(5);

echo ($spaceship->getName());
echo "\n";
echo ($spaceship->getHealth());
echo "\n";
echo ($spaceship->getPower());
echo "\n";
echo ($spaceship->getLength());
echo "\n";

$spaceship2 = new Spaceship("bomber",5,6,10);
$spaceship2->setName("bomber");
$spaceship2->setHealth(5);
$spaceship2->setPower(6); 
$spaceship2->setLength(10);

// geeft de turret aan spaceship2
$spaceship2->setTurret($turret);







echo ($spaceship2->getName());
echo "\n";
echo ($spaceship2->getHealth());
echo "\n";
echo "turret ammo";
echo "\n";
echo ($spaceship2->getTurret()->getAmmo());
echo "\n";
echo "snelheid kogels";
echo "\n";
echo ($spaceship2->getTurret()->getSpeed());
echo "\n";
echo ($spaceship2->getPower());
echo "\n";
echo ($spaceship2->getLength());
echo "\n";
?>