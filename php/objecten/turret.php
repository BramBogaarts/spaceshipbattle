<?php 
class Turret {
    public int $ammo;
    public int $speed;
    public int $damage;
    public int $reload;
    public int $hp;

    public function __construct(int $ammo, int $speed, int $damage, int $reload, int $hp) {
        $this->ammo = $ammo;
        $this->speed = $speed;
        $this->damage = $damage;
        $this->reload = $reload;
        $this->hp = $hp;
    }

    // Get
    public function getAmmo(): int {
        return $this->ammo;
    }
    
    public function getSpeed(): int {
        return $this->speed;
    }
    
    public function getDamage(): int {
        return $this->damage;
    }
    
    public function getReload(): int {
        return $this->reload;
    }

    public function getHp(): int {
        return $this->hp;
    }

    // Set
    public function setAmmo(int $ammo): void {
        $this->ammo = $ammo;
    }
    
    public function setSpeed(int $speed): void {
        $this->speed = $speed;
    }
    
    public function setDamage(int $damage): void {
        $this->damage = $damage;
    }

    public function setReload(int $reload): void {
        $this->reload = $reload;
    }

    public function setHp(int $hp): void {
        $this->hp = $hp;
    }
}
?>