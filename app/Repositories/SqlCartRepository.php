<?php

namespace App\Repositories;
use App\Interfaces\ICart;
use App\models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SqlCartRepository extends Model implements ICart
{
    public function addToCart(CartItem $cartItem): bool
    {
        $data=['product_id'=>$cartItem->getProductId(),"qty"=>$cartItem->getQty(),"totalCost"=>$cartItem->getItemTotalPrice()];
        DB::table('cart')->insert($data);
        return true;
    }

    public function deleteFromCart($id): bool
    {
        DB::delete("DELETE FROM cart WHERE id = $id");
        return true;
    }

    public function showAll(): array
    {
        $cartItems = DB::table('cart')
            ->select('*')
            ->get();

        $result = [];

        foreach ($cartItems as $key => $value) {
            $cartItem = new CartItem();
            $cartItem->setCartItemId($value->id);
            $cartItem->setProductId($value->product_id);
            $cartItem->setQty($value->qty);
            $cartItem->setTotalPrice($value->totalCost);

            $result[] = $cartItem;
        }

        return $result;
    }
}
