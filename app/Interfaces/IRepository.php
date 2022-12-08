<?php

namespace App\Interfaces;
use App\Models\Article;
use App\Models\ReturningTypeOfGetListFunc;

interface IRepository
{
    /**
     * Get Article by id
     * @param int $id
     * @return Article | null
     */
    public function getById(int $id): ?Article;

    /**
     * Get list of articles
     * @param int $limit
     * @param int $pageNum
     * @param int $start
     * @return ReturningTypeOfGetListFunc[]
     */
    public function getList(int $limit, int $pageNum, int $start): array;
}
