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
        $sql = "SELECT articles.id, articles.name, articles.cost, products.manufacture, products.releaseDate, services.deadline
                FROM articles
                    LEFT JOIN products
                        ON articles.id = products.id
                    LEFT JOIN services
                        ON articles.id = services.id
                    WHERE articles.id = $id   ";

        $sql1 = "SELECT product_types.type
                 FROM articles
                     LEFT JOIN connections
                         ON articles.id = connections.id
                     LEFT JOIN product_types
                         ON product_types.type_id = connections.type_id
                     WHERE articles.id = $id   ";

        $rowType = DB::select($sql1);

        if ($rowType[0]->type === 'Service') {
            $service = new Service();

            $row = DB::select($sql);

            $service->setId($row[0]->id);
            $service->setType(2);
            $service->setName($row[0]->name);
            $service->setDeadLine($row[0]->deadline);
            $service->setCost($row[0]->cost);


            return $service;

        } elseif($rowType[0]->type === 'Product') {
            $product = new Product();

            $row = DB::select($sql);

            $product->setId($row[0]->id);
            $product->setName($row[0]->name);
            $product->setType(1);
            $product->setManufacture($row[0]->manufacture);
            $product->setReleaseDate($row[0]->releaseDate);
            $product->setCost($row[0]->cost);

            return $product;
        }
    }

    public function getList($limit, $pageNum, $start): array
    {
        $sql = "SELECT articles.id, articles.name, articles.cost, products.manufacture, products.releaseDate, services.deadline, connections.type_id
                FROM articles
                    LEFT JOIN products
                        ON articles.id = products.id
                    LEFT JOIN services
                        ON articles.id = services.id
                    LEFT JOIN connections
                        ON articles.id = connections.id
                        LIMIT $start, $limit";

        $sql1 = "SELECT count(articles.id) AS id
                FROM articles
                    LEFT JOIN products
                        ON articles.id = products.id
                    LEFT JOIN services
                        ON articles.id = services.id
                        ";

        $articles = [];


        $artCount = DB::select($sql1);
        $total = $artCount[0]->id;
        $pages = ceil($total / $limit);
        $rows = DB::select($sql);

        foreach ($rows as $key => $value) {

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
