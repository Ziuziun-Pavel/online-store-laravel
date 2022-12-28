<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Cart;

class ArticleController extends Controller
{
    public function __construct(protected Article $article, protected Cart $cart) {}

    public function index()
    {
        $limit = 6;
        $pageNum = $_GET['page'] ?? 1;
        $start = ($pageNum - 1) * $limit;

        $products = $this->article->getList($limit, $pageNum, $start)['articles'];
        $pages = $this->article->getList($limit, $pageNum, $start)['pages'];

        $isCartEmpty = empty($this->cart->showAll());

        return view('articles', [
            'title' => 'Articles list',
            'pageNum' => $pageNum,
            'pages' => $pages,
            'products' => $products,
            'isCartEmpty' => $isCartEmpty,
        ]);
    }

    public function indexPage()
    {
        $productId = $_GET['id'];

        $product = $this->article->getById($productId);

        return view('articlePage', [
            'title' => 'Card Page',
            'article' => $product,
        ]);
    }
}
