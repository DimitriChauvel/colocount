<?php

namespace App\Entity;

class Expense extends BaseEntity
{
    private string $id;
    private string $name;
    private string $paying_one_id;
    private string $flatshare_id;
    private float $sum;
    private string $category_id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Expense
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Expense
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayingOneId()
    {
        return $this->paying_one_id;
    }

    /**
     * @param string $paying_one_id
     * @return Expense
     */
    public function setPayingOneId($paying_one_id)
    {
        $this->paying_one_id = $paying_one_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlatshareId()
    {
        return $this->flatshare_id;
    }

    /**
     * @param string $flatshare_id
     * @return Expense
     */
    public function setFlatshareId($flatshare_id)
    {
        $this->flatshare_id = $flatshare_id;
        return $this;
    }

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     * @return Expense
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param string $category_id
     * @return Expense
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }





}