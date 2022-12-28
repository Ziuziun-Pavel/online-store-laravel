<?php

namespace App\Repositories;
use App\Interfaces\IRepository;
use App\Models\Article;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SqlArticleRepository extends Model implements IRepository
{
    public function getById(int $id): Article
    {
        $article = DB::table('articles')
            ->leftJoin('products', 'articles.id', '=', 'products.id')
            ->leftJoin('services', 'articles.id', '=', 'services.id')
            ->select('articles.id', 'articles.name', 'articles.cost', 'products.manufacture', 'products.releaseDate', 'services.deadline')
            ->where('articles.id', '=', $id)
            ->first();

        $rowType = DB::table('articles')
            ->leftJoin('connections', 'articles.id', '=', 'connections.id')
            ->leftJoin('product_types', 'product_types.type_id', '=', 'connections.type_id')
            ->select('product_types.type')
            ->where('articles.id', '=', $id)
            ->first();

        if ($rowType[0]->type === IRepository::serviceType) {
            $service = new Service();

            $service->setId($article[0]->id);
            $service->setType(2);
            $service->setName($article[0]->name);
            $service->setDeadLine($article[0]->deadline);
            $service->setCost($article[0]->cost);


            return $service;

        } elseif($rowType[0]->type === IRepository::productType) {
            $product = new Product();

            $product->setId($article[0]->id);
            $product->setName($article[0]->name);
            $product->setType(1);
            $product->setManufacture($article[0]->manufacture);
            $product->setReleaseDate($article[0]->releaseDate);
            $product->setCost($article[0]->cost);

            return $product;
        }
    }

    public function getList($limit, $pageNum, $start): array
    {
        $articles = DB::table('articles')
            ->leftJoin('products', 'articles.id', '=', 'products.id')
            ->leftJoin('services', 'articles.id', '=', 'services.id')
            ->leftJoin('connections', 'articles.id', '=', 'connections.id')
            ->select('articles.id', 'articles.name', 'articles.cost', 'products.manufacture', 'products.releaseDate', 'services.deadline', 'connections.type_id')
            ->limit($limit)
            ->get();

        $countArticles = DB::table('articles')
            ->leftJoin('products', 'articles.id', '=', 'products.id')
            ->leftJoin('services', 'articles.id', '=', 'services.id')
            ->select('articles.id')
            ->count();

        $total = $countArticles;
        $pages = ceil($total / $limit);

        foreach ($articles as $key => $value) {

            if ($value->type_id === 2) {
                $service = new Service();

                $service->setId($value->id);
                $service->setName($value->name);
                $service->setDeadLine($value->deadline);
                $service->setCost($value->cost);
                $service->setType($value->type_id);

                $articles[] = $service;

            } elseif($value->type_id === 1) {
                $product = new Product();

                $product->setId($value->id);
                $product->setName($value->name);
                $product->setManufacture($value->manufacture);
                $product->setReleaseDate($value->releaseDate);
                $product->setCost($value->cost);
                $product->setType($value->type_id);

                $articles[] = $product;
            }
        }

        return [
          'articles' => $articles,
          'pages' => $pages
        ];
    }
}
