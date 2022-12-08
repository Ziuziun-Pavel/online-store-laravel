<?php

namespace App\Models;
use App\Interfaces\IArrayofArticlesWithPageNum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturningTypeOfGetListFunc extends Model implements IArrayofArticlesWithPageNum
{
    use HasFactory;

    private array $articles;

    private int $pages;

    public function getPagesNum()
    {
        return $this->pages;
    }

    public function getArticles()
    {
        return $this->articles;
    }
}
