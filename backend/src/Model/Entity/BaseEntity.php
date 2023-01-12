<?php

namespace App\Model\Entity;

use App\Model\Traits\Hydrator;


abstract class BaseEntity implements \JsonSerializable
{
    use Hydrator;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }
}