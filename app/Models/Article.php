<?php

namespace App\Models;
use App\Interfaces\IArticle;
use App\Repositories\SqlArticleRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements IArticle
{
    use HasFactory;
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $cost;

    /** @var int */
    private $type;

    private $repo;

    public function __construct()
    {
        parent::__construct();
        $this->repo = new SqlArticleRepository();
    }

    public function getById($id): Article
    {
        return $this->repo->getById($id);
    }

    public function getList($limit, $pageNum, $start): array
    {
        return $this->repo->getList($limit, $pageNum, $start);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

}
