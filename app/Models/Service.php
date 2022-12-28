<?php

namespace App\Models;
use App\Interfaces\Article\IService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Article implements IService
{
    use HasFactory;

    /** @var int */
    private $deadline;

    public function getDeadLine()
    {
        return $this->deadline;
    }

    public function setDeadLine($deadline)
    {
        $this->deadline = $deadline;
    }
}
