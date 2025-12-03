<?php
require_once __DIR__ . '/spaceship.php';

class Battle {
    public Spaceship $spaceShip1;
    public Spaceship $spaceShip2;

    public function __construct(Spaceship $spaceShip1, Spaceship $spaceShip2) {
        $this->spaceShip1 = $spaceShip1;
        $this->spaceShip2 = $spaceShip2;
    }

    // Start de battle en retourneer de winnende Spaceship of null bij gelijkspel
    public function start(): ?Spaceship {
        while (true) {
            $winner = $this->ronde();
            if ($winner !== null) {
                return $winner;
            }
        }
    }

    // Voer één ronde uit: ship1 valt ship2 aan, daarna ship2 ship1 (als hij nog levend is)
    // Retourneert winnaar of null als nog geen winnaar
    public function ronde(): ?Spaceship {
        if (! $this->spaceShip1->isDestroyed()) {
            $this->spaceShip1->attack($this->spaceShip2);
            if ($this->spaceShip2->isDestroyed()) {
                return $this->spaceShip1;
            }
        }

        if (! $this->spaceShip2->isDestroyed()) {
            $this->spaceShip2->attack($this->spaceShip1);
            if ($this->spaceShip1->isDestroyed()) {
                return $this->spaceShip2;
            }
        }

        return null;
    }

    // Hulpfunctie: bepaal huidige winnaar
    public function winnaar(): ?Spaceship {
        if ($this->spaceShip1->isDestroyed() && $this->spaceShip2->isDestroyed()) {
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