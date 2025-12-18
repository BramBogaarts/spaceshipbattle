<?php
Namespace Entities;

require_once __DIR__ . '/../interfaces/Iroom.php';
use Interfaces\Entities\IRoom;
class Room implements IRoom
{
    public string $Name;
    public int $Length;
    public int $Width;

    public function __construct(string $Name, int $Length, int $Width)
    {
        $this->Name = $Name;
        $this->Length = $Length;
        $this->Width = $Width;
    }

    public function roomSize()
    {
        return $this->Length * $this->Width;
    }
}