<link rel="stylesheet" href="/spaceshipbattle/css/home.css">
<?php
require_once __DIR__ . '/spaceship.php';
class Battle {
    public Spaceship $spaceShip1;
    public Spaceship $spaceShip2;
    private int $maxRondes = 4; // Maximum aantal rondes
    public function __construct(Spaceship $spaceShip1, Spaceship $spaceShip2) {
        $this->spaceShip1 = $spaceShip1;
        $this->spaceShip2 = $spaceShip2;
    }
    // Start de battle en retourneer de winnende Spaceship of null bij gelijkspel
    public function start(): ?Spaceship {
        $rondeNummer = 0;
        
        while ($rondeNummer < $this->maxRondes) {
            $rondeNummer++;
            echo "Ronde $rondeNummer:\n";
            
            $winner = $this->ronde();
            
            // Als er een winnaar is of beide vernietigd zijn
            if ($winner !== null) {
                return $winner;
            }
            
            if ($this->spaceShip1->isDestroyed() && $this->spaceShip2->isDestroyed()) {
                echo "Beide schepen vernietigd - het is gelijkspel!\n";
                return null;
            }
        }
        
        // Maximum rondes bereikt en beide schepen leven nog
        echo "<p class='gelijk'>Maximum aantal rondes ($this->maxRondes) bereikt - het is gelijkspel!</p>\n";
        echo $this->spaceShip1->getName() . " heeft nog " . $this->spaceShip1->getHealth() . " HP\n";
        echo $this->spaceShip2->getName() . " heeft nog " . $this->spaceShip2->getHealth() . " HP\n";
        return null;
    }
    // Voer één ronde uit: ship1 valt ship2 aan, daarna ship2 ship1 (als hij nog levend is)
    // Retourneert winnaar of null als nog geen winnaar
    public function ronde(): ?Spaceship {
        // Check aan het begin: zijn beide al vernietigd?
        if ($this->spaceShip1->isDestroyed() && $this->spaceShip2->isDestroyed()) {
            echo "Beide schepen zijn al vernietigd - het is gelijkspel!\n";
            return null;
        }
        
        // Beide schepen vallen aan (als ze nog leven)
        if (! $this->spaceShip1->isDestroyed()) {
            $this->spaceShip1->attack($this->spaceShip2);
        }
        
        if (! $this->spaceShip2->isDestroyed()) {
            $this->spaceShip2->attack($this->spaceShip1);
        }
        
        // na beide aanvallen: check wie er nog leeft
        if ($this->spaceShip1->isDestroyed() && $this->spaceShip2->isDestroyed()) {
            echo "Beide schepen vernietigd in dezelfde ronde - gelijkspel!\n";
            return null;
        }
        
        if ($this->spaceShip2->isDestroyed()) {
            return $this->spaceShip1;
        }
        
        if ($this->spaceShip1->isDestroyed()) {
            return $this->spaceShip2;
        }
        
        return null; // Nog geen winnaar
    }
    // Hulpfunctie: bepaal huidige winnaar
    public function winnaar(): ?Spaceship {
        if ($this->spaceShip1->isDestroyed() && $this->spaceShip2->isDestroyed()) {
            echo "het is gelijk spel";
            return null; // gelijkspel
        }
        if ($this->spaceShip1->isDestroyed()) {
            return $this->spaceShip2;
        }
        if ($this->spaceShip2->isDestroyed()) {
            return $this->spaceShip1;
        }
        
        return null; // geen winnaar
    }
}
?>