<?php

namespace App\Models;
use App\Interfaces\ICart;
use App\Repositories\SqlCartRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model implements ICart
{
    use HasFactory;

    private SqlCartRepository $repo;

    public function __construct()
    {
        parent::__construct();
        $this->repo = new SqlCartRepository();
    }

    public function addToCart(CartItem $cartItem)
    {
        $this->repo->addToCart($cartItem);
    }

    public function deleteFromCart($id)
    {
        $this->repo->deleteFromCart($id);
    }

    public function showAll(): array
    {
        return $this->repo->showAll();
    }
}
