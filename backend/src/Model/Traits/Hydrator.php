<?php

namespace App\Model\Traits;

trait Hydrator
{
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $explodedKey = explode('_', $key);
            for ($i = 0; $i < count($explodedKey); $i++) {
                $explodedKey[$i] = ucfirst($explodedKey[$i]);
            }
            $method = 'set' . implode('', $explodedKey);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }

    }
}