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
    public function getTurretAmmo(): int {
        return $this->ammo;
    }
    
    public function getTurretSpeed(): int {
        return $this->speed;
    }
    
    public function getTurretDamage(): int {
        return $this->damage;
    }
    
    public function getTurretReload(): int {
        return $this->reload;
    }

    public function getTurretHp(): int {
        return $this->hp;
    }

    // Set
    public function setTurretAmmo(int $ammo): void {
        $this->ammo = $ammo;
    }
    
    public function setTurretSpeed(int $speed): void {
        $this->speed = $speed;
    }
    
    public function setTurretDamage(int $damage): void {
        $this->damage = $damage;
    }

    public function setTurretReload(int $reload): void {
        $this->reload = $reload;
    }

    public function setTurretHp(int $hp): void {
        $this->hp = $hp;
    }
}
?>