<?php

namespace App\Interfaces\Article;
use App\Interfaces\IArticle;

interface IService extends IArticle
{
    /**
     * Return service deadline
     * @return int
     */
    public function getDeadLine();

    /**
     * Set service deadline
     * @param int $deadline
     */
    public function setDeadLine($deadline);
}
