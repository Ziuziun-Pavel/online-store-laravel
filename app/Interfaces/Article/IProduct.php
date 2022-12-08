<?php

namespace App\Interfaces\Article;
use App\Interfaces\IArticle;

interface IProduct extends IArticle
{
    /**
     * Return product manufacture
     * @return string
     */
    public function getManufacture();

    /**
     * Set product manufacture
     * @param string $manufacture
     */
    public function setManufacture($manufacture);

    /**
     * Return product release data
     * @return int
     */
    public function getReleaseDate();

    /**
     * Set product release data
     * @param int $releaseDate
     */
    public function setReleaseDate($releaseDate);
}
