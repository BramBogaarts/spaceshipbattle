<?php 
class Spaceship {
    public string $name;
    public int $length;
    public int $health;
    public int $power;
    
    public function __construct(string $name,int $health,int $attackPower,int $length) {
        $this->name = $name;
        $this->health = $health;
        $this->power = $attackPower;
        $this->length = $length;
    }
    
    public function attack($target) {
        $target->health -= $this->power;
        if ($target->health < 0) {
            $target->health = 0;
        }
    }
    
    public function isDestroyed() {
        return $this->health <= 0;
    }
    
    public function __getname(): string {
        return $this->name;
    }
    
    public function __setname($name): void {
        $this->name = $name;
    }
    public function __gethp(): int {
        return $this->health;
    }
        public function __sethp(int $health): void {
        $this->health = $health;
    } 
        public function __getpower(): int {
        return $this->power;
    }
        public function __setpower(int $attackPower): void {
        $this->power = $attackPower;
    }
        public function __getlength(): int {
        return $this->length;
    }
        public function __setlength(int $length): void {
        $this->length = $length;
    }
}
 