<?php

require_once __DIR__ . '/../objecten/rooms.php';
use Entities\Room;
class armory extends Room
{
        public int $ammo;
        public function __construct(string $Name, int $Length, int $Width, int $ammo)
    {
        $this->ammo = $ammo;
        parent::__construct($Name,$Length,$Width);
    }


}
?>