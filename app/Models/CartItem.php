<?php

namespace App\Models;
use App\Interfaces\ICartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model implements ICartItem
{
    use HasFactory;

    /** @var int */
    private int $id;

    /** @var int */
    private int $productId;

    /** @var int */
    private int $qty;

    /** @var int */
    private int $totalCost;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCartItemId(): int
    {
        return $this->id;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function getItemTotalPrice(): int
    {
        return $this->totalCost;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId($id)
    {
        $this->productId = $id;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function setTotalPrice($price)
    {
        $this->totalCost = $price;
    }

    public function setCartItemId($id)
    {
        $this->id = $id;
    }
}
