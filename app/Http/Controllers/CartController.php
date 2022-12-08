<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public int $totalPrice = 0;

    public function index()
    {
        $cart = new Cart();

        $cartItems = $cart->showAll();

        foreach ($cartItems as $key => $value) {
            $this->totalPrice += $value->getItemTotalPrice();
        }

        return view('cart', [
            'title' => 'Card Page',
            'cartItems' => $cartItems,
            'totalPrice' => $this->totalPrice
        ]);
    }

    public function addToCart()
    {
        if (isset($_POST['article_id']) && is_numeric($_POST['article_id'])) {
            $articleId = $_POST['article_id'];
            $articleQty = $_POST['quantity'] ?? 1;

            $articleModel = new Article();

            $article = $articleModel->getById($articleId);

            $cartItem = new CartItem();
            $cartModel = new Cart();

            $cartItem->setProductId($articleId);
            $cartItem->setQty($articleQty);
            $cartItem->setTotalPrice(($articleQty !== '') ? $articleQty * $article->getCost() : $article->getCost());

            if ($cartModel->addToCart($cartItem)) {
                return Redirect::to('/articles');
            } else {
                return Redirect::to('/articles');
            }
        } else {
            return Redirect::to('/articles');
        }
    }

    public function deleteFromCart()
    {
        if (!empty($_GET) && !empty($_GET['id'])) {
            $cartItemId = $_GET['id'];
            $cartModel = new Cart();

            if ($cartModel->deleteFromCart($cartItemId)) {
                return Redirect::to('/cart');
            } else {
                return Redirect::to('/cart');
            }
        } else {
            return Redirect::to('/cart');
        }
    }
}
