<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Cart;

class ArticleController extends Controller
{
    public int $limit;
    public int $pageNum;
    public int $start;

    public function __construct()
    {
        $this->limit = 6;
    }

    public function index()
    {
        $this->pageNum = $_GET['page'] ?? 1;
        $this->start = ($this->pageNum - 1) * $this->limit;

        $article= new Article();
        $cart= new Cart();

        $products = $article->getList($this->limit, $this->pageNum, $this->start)['articles'];
        $pages = $article->getList($this->limit, $this->pageNum, $this->start)['pages'];

        $isCartEmpty = empty($cart->showAll());

        return view('articles', [
            'title' => 'Articles list',
            'pageNum' => $this->pageNum,
            'pages' => $pages,
            'products' => $products,
            'isCartEmpty' => $isCartEmpty,
        ]);
    }

    public function indexPage()
    {
        $productId = $_GET['id'];

        $article= new Article();

        $article = $article->getById($productId);

        return view('articlePage', [
            'title' => 'Card Page',
            'article' => $article,
        ]);
    }
}
