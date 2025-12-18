<?php
class Canon {
    public int $damage;
    public int $hp;
    public string $name;
    
    public function __construct(int $damage, int $hp, string $name)
    {
       $this->damage = $damage;
       $this->hp = $hp;
       $this->name = $name;
    }
    
    public function getCanonDamage(): int {
        return $this->damage;
    }
    
    public function getCanonHp(): int {
        return $this->hp;
    }
    
    public function getCanonName(): string { 
        return $this->name;
    }
    
    public function setCanonDamage(int $damage): void {
        $this->damage = $damage;
    }
    
    public function setCanonHp(int $hp): void {
        $this->hp = $hp;
    }
    
    public function setCanonName(string $name): void { 
        $this->name = $name;
    }
}
?>