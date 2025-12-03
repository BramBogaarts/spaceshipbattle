
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/spaceshipbattle//css/home.css">
</head>
<body>
<?php
require_once __DIR__ . '/php/objecten/spaceship.php';
require_once __DIR__ . '/php/objecten/turret.php';
require_once __DIR__ . '/php/objecten/battle.php';
$turret = new Turret(20,10,5,5,10);
$spaceship = new Spaceship("millennium falcon", 10, 2, 5);
$spaceship->setName("millennium falcon");
$spaceship->setHealth(10);
$spaceship->setPower(rand(1,4)); 
$spaceship->setLength(5);
echo ($spaceship->getName());
echo "\n";
echo "hp =";
echo "\n";
echo ($spaceship->getHealth());
echo "\n";
echo "power = ";
echo "\n";
echo ($spaceship->getPower());
echo "<br>";
$spaceship2 = new Spaceship("tie-fighter",5,6,10);
$spaceship2->setName("tie-fighter");
$spaceship2->setHealth(10);
$spaceship2->setPower(rand(1,5)); 
$spaceship2->setLength(10);
// geeft de turret aan spaceship2
$spaceship2->setTurret($turret);
echo ($spaceship2->getName());
echo "\n";
echo "hp = ";
echo "\n";
echo ($spaceship2->getHealth());







echo "\n";
echo "power = ";
echo "\n";
echo ($spaceship2->getPower());
echo "<br>";
echo "<br>";
$gevecht = new battle($spaceship, $spaceship2);
$gevecht -> start();
?>
</body>
</html>