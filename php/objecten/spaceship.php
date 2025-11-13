<?php 
class Spaceship {
    public string $name;
    public int $length;
    public int $health;
    public int $power;
    // de ? zorgt ervoor dat het optioneel is.
    public ?Turret $turret = null; 
    
    public function __construct(string $name, int $health, int $attackPower, int $length, ?Turret $turret = null) {
        $this->name = $name;
        $this->health = $health;
        $this->power = $attackPower;
        $this->length = $length;
        $this->turret = $turret;
    }
    
    public function attack($target) {
        if ($this->isDestroyed()) {
            echo $this->getName() . " is al vernietigd en kan niet aanvallen!\n";
            return;
        }
        
        $target->health -= $this->power;
        if ($target->health < 0) {
            $target->health = 0;
        }
        
        if ($target->isDestroyed()) {
            echo $target->getName() . " is vernietigd!\n";
        }
    }
    
    public function isDestroyed(): bool {
        return $this->health <= 0;
    }
    
    // Get
    public function getName(): string {
        return $this->name;
    }
    
    public function getHealth(): int {
        return $this->health;
    }
    
    public function getPower(): int {
        return $this->power;
    }
    
    public function getLength(): int {
        return $this->length;
    }
    
    public function getTurret(): ?Turret {
        return $this->turret;
    }
    
    // Set
    public function setName(string $name): void {
        $this->name = $name;
    }
    
    public function setHealth(int $health): void {
        $this->health = $health;
        
        if ($this->isDestroyed()) {
            echo $this->getName() . " is vernietigd!\n";
        }
    }
    
    public function setPower(int $power): void {
        $this->power = $power;
    }
    
    public function setLength(int $length): void {
        $this->length = $length;
    }
    // er staat Turret omdat de parameter een turret object moet zijn.
    public function setTurret(Turret $turret): void {
        $this->turret = $turret;
    }
}
?>