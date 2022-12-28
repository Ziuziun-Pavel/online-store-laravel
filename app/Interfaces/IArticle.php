<?php

namespace App\Interfaces;

interface IArticle
{
    /**
     * Return item id
     * @return int
     */
    public function getId();

    /**
     * Return item name
     * @return string
     */
    public function getName();

    /**
     * Set item name
     * @param string $name
     */
    public function setName($name);

    /**
     * Return item cost
     * @return int
     */
    public function getCost();

    /**
     * Set item cost
     * @param int $cost
     */
    public function setCost($cost);

    /**
     * Set item id
     * @param int $id
     */
    public function setId($id);

    /**
     * Get item type
     * @return string $type
     */
    public function getType();

    /**
     * Set item type
     * @param string $type
     */
    public function setType($type);
}
