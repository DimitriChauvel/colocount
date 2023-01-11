<?php

namespace App\Entity;

class User extends BaseEntity
{
    private string $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $phone;
    private string $profile_picture;
    private string $password;
}