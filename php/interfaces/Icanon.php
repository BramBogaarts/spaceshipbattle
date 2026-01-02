<?php
namespace Interfaces\Entities;

interface CanonInterface {
    public function getCanonDamage(): int;
    public function getCanonHp(): int;
    public function getCanonName(): string;
    public function setCanonDamage(int $damage): void;
    public function setCanonHp(int $hp): void;
    public function setCanonName(string $name): void;
}
?>