<?php

namespace App\Model\Entity;

class Flatshare extends BaseEntity
{
    private string $id;
    private string $banner_picture;
    private string $name;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Flatshare
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getBannerPicture()
    {
        return $this->banner_picture;
    }

    /**
     * @param string $banner_picture
     * @return Flatshare
     */
    public function setBannerPicture($banner_picture)
    {
        $this->banner_picture = $banner_picture;
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
     * @return Flatshare
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}