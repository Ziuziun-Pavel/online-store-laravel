<?php

namespace App\Interfaces;
use App\Models\CartItem;

interface ICart
{
    /**
     * Add product to cart
     * @param CartItem $cartItem
     */
    public function addToCart(CartItem $cartItem);

    /**
     * Delete product from cart
     * @param int $id
     */
    public function deleteFromCart($id);

    /**
     * Return all products from cart
     * @return ICartItem[]
     */
    public function showAll();
}
