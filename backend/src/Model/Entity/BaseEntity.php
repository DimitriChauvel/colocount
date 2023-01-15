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

    public function jsonSerialize(): mixed
    {
        $return = [];

        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $explodedKey = explode('_', $property->getName());
            for ($i = 0; $i < count($explodedKey); $i++) {
                $explodedKey[$i] = ucfirst($explodedKey[$i]);
            }
            $method = 'get' . implode('', $explodedKey);
            if (is_callable([$this, $method])) {
                $return[$property->getName()] = $this->$method();
            }
        }

        return $return;
    }
}