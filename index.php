<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>
    <button class="knop1"><a href="index.php">opnieuw</a></button>
    <a href="php/DAL/data.php">database</a>
    <hr>
    <?php
    require_once __DIR__ . '/php/objecten/spaceship.php';
    require_once __DIR__ . '/php/objecten/turret.php';
    require_once __DIR__ . '/php/objecten/canon.php';
    require_once __DIR__ . '/php/objecten/battle.php';
    require_once __DIR__ . '/php/objecten/rooms.php';
    require_once __DIR__ . '/php/objecten/armory.php';
    $turret = new Turret(20, 10, 5, 5, 10);
    $canon = new Canon(10, 10, "Canon");
    $spaceship = new Spaceship("millennium falcon", 100, 5);
    $spaceship->setName("millennium falcon");
    $spaceship->setHealth(100);
    $spaceship->setLength(5);
    $canon->setCanonDamage(rand(0, 100));
    $spaceship->addCanon($canon);
    $spaceship->addCanon($canon);
    echo ($spaceship->getName());
    echo "\n";
    echo "hp = ";
    echo "\n";
    echo ($spaceship->getHealth());
    echo "\n";
    echo "canon power = ";
    echo "\n";
    echo ($canon->getCanonDamage());
    echo "\n";
    echo "<br>";

    $spaceship2 = new Spaceship("tie-fighter", 100, 10, $turret);
    $spaceship2->setName("tie-fighter");
    $spaceship2->setHealth(200);
    $spaceship2->setLength(10);
    $turret->setTurretHp(10);
    $turret->setTurretDamage(rand(0, 100));

    echo ($spaceship2->getName());
    echo "\n";
    echo "hp = ";
    echo "\n";
    echo ($spaceship2->getHealth());
    echo "\n";
    echo "turret damage = ";
    echo ($turret->getTurretDamage());
    echo "\n";
    echo "<br>";
    echo "<br>";

    $gevecht = new battle($spaceship, $spaceship2);
    $gevecht->start();
    $armory = new armory ("test", 8,2,3);
    echo "roomsize is " . $armory ->roomSize();
    
    ?>
    <br>
</body>

</html>