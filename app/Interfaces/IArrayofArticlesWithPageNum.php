<?php

namespace App\Interfaces;

interface IArrayofArticlesWithPageNum
{
    /**
     * Return array of articles
     * @return IArticle[]
     */
    public function getArticles();

    /**
     * Return number of pages
     * @return int
     */
    public function getPagesNum();
}
