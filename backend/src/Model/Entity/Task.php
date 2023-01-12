<?php

namespace App\Entity;

class Task extends BaseEntity
{
    private string $id;
    private string $name;
    private string $flatshare_id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Task
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
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Task
     */
    public function setFlatshareId($flatshare_id)
    {
        $this->flatshare_id = $flatshare_id;
        return $this;
    }

}