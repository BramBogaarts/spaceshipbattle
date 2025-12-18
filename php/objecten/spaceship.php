<link rel="stylesheet" href="/spaceshipbattle/css/home.css">
<?php
class Spaceship
{
    public string $name;
    public int $length;
    public int $health;
    // de ? zorgt ervoor dat het optioneel is.
    public ?Turret $turret = null;
    public array $canon;
    public function __construct(string $name, int $health, int $length, ?Turret $turret = null)
    {
        $this->name = $name;
        $this->health = $health;
        $this->length = $length;
        $this->turret = $turret;
        $this->canon = [];
    }

    public function attack(spaceship $target)
    {
        if ($this->isDestroyed()) {
            echo $this->getName() . " is al vernietigd en kan niet aanvallen!<br>";
            return;
        }

        // Bereken schade: als turret aanwezig is, gebruik turret damage, anders power
        $damage = 0;
        foreach ($this->canon as $canon) {
            $damage += $canon->damage;
        }

        if ($this->turret !== null) {
            $damage += $this->turret->getTurretDamage();
            echo $this->getName() . " valt " . $target->getName() . " aan met turret!<br>";
        } else {
            echo $this->getName() . " valt " . $target->getName() . " aan met canon!<br>";
        }

        $target->health -= $damage;

        echo $target->getName() . " heeft nog " . max(0, $target->getHealth()) . " HP over<br>";

        if ($target->isDestroyed()) {
            echo "<p class='verloren'>" . $target->getName() . " is vernietigd</p><p class='gewonnen'>" . $this->getName() . " heeft gewonnen met nog " . $this->getHealth() . " HP over </p>";
        }
    }

    public function isDestroyed(): bool
    {
        return $this->health <= 0;
    }

    // Get
    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }
    public function getLength(): int
    {
        return $this->length;
    }

    public function getTurret(): ?Turret
    {
        return $this->turret;
    }

    // Set
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;

        if ($this->isDestroyed()) {
            echo $this->getName() . " is vernietigd!<br>";
        }
    }
    public function setLength(int $length): void
    {
        $this->length = $length;
    }
    // er staat Turret omdat de parameter een turret object moet zijn.
    public function setTurret(Turret $turret): void
    {
        $this->turret = $turret;
    }
    // er staat Canon omdat de parameter een canon object moet zijn.
    public function addCanon(Canon $canon): void
    {
        $this->canon[] = $canon;
    }
}
?>