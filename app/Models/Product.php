<?php

namespace App\Models;
use App\Interfaces\Article\IProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Article implements IProduct
{
    use HasFactory;

    /** @var string */
    private $manufacture;

    /** @var int */
    private $releaseDate;

    public function getManufacture()
    {
        return $this->manufacture;
    }

    public function setManufacture($manufacture)
    {
        $this->manufacture = $manufacture;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }
}
