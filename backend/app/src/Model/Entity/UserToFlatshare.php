<?php

namespace App\Entity;

class UserToFlatshare extends BaseEntity
{
    private string $id;
    private string $user_id;
    private string $flatshare_id;
    private string $role;
    private float $due;
}