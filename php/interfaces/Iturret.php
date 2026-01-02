<?php
namespace Interfaces\Entities;

interface TurretInterface {
    public function getTurretAmmo(): int;
    public function getTurretSpeed(): int;
    public function getTurretDamage(): int;
    public function getTurretReload(): int;
    public function getTurretHp(): int;
    public function setTurretAmmo(int $ammo): void;
    public function setTurretSpeed(int $speed): void;
    public function setTurretDamage(int $damage): void;
    public function setTurretReload(int $reload): void;
    public function setTurretHp(int $hp): void;
}
?>
