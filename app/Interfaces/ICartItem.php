<?php

namespace App\Interfaces;

interface ICartItem
{
    /**
     * Return cartItem id.
     * @return int
     */
    public function getCartItemId();

    /**
     * Set cart item id.
     * @param int $id
     */
    public function setCartItemId($id);

    /**
     * Return product id.
     * @return int
     */
    public function getProductId();

    /**
     * Set product id.
     * @param int $id
     */
    public function setProductId($id);

    /**
     * Return number of cartItem.
     * @return int
     */
    public function getQty();

    /**
     * Set qty.
     * @param int $qty
     */
    public function setQty($qty);

    /**
     * Return product price.
     * @return int
     */
    public function getItemTotalPrice();

    /**
     * Set Total price.
     * @param int $price
     */
    public function setTotalPrice($price);
}
