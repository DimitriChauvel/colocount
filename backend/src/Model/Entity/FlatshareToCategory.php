<?php

namespace App\Entity;

class FlatshareToCategory extends BaseEntity
{
    private string $id;
    private string $flatshare_id;
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
     * @return FlatshareToCategory
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return FlatshareToCategory
     */
    public function setFlatshareId($flatshare_id)
    {
        $this->flatshare_id = $flatshare_id;
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
     * @return FlatshareToCategory
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }



}