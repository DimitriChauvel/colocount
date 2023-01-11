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

}