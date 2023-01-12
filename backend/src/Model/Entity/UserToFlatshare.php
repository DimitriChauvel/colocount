<?php

namespace App\Model\Entity;

class UserToFlatshare extends BaseEntity
{
    private string $id;
    private string $user_id;
    private string $flatshare_id;
    private string $role;
    private float $due;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return UserToFlatshare
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     * @return UserToFlatshare
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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
     * @return UserToFlatshare
     */
    public function setFlatshareId($flatshare_id)
    {
        $this->flatshare_id = $flatshare_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return UserToFlatshare
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return float
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * @param float $due
     * @return UserToFlatshare
     */
    public function setDue($due)
    {
        $this->due = $due;
        return $this;
    }


}