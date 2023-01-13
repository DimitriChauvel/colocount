<?php

namespace App\Model\Manager;

use App\Model\Entity\User;

class UserManager extends BaseManager
{
    public function getAll(): array {
        $query = $this->pdo->query('SELECT * FROM Users');
        $users = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        return $users;
    }

    public function getOne(string $id): ?User {
        $query = $this->pdo->prepare('SELECT * FROM Users WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data ? new User($data) : null;
    }

    public function getByEmail(string $email): ?User {
        $query = $this->pdo->prepare('SELECT * FROM Users WHERE email = :email');
        $query->bindValue(':email', $email, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data ? new User($data) : null;
    }

    public function postOne(): User
    {
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO Users (id, firstname, lastname, email, phone, profile_picture, password) 
            VALUES (:id, :firstname, :lastname, :email, :phone, :profile_picture, :password)
        EOT);
        $query->bindValue(':id', $entityBody['id']);
        $query->bindValue(':firstname', $entityBody["firstname"]);
        $query->bindValue(':lastname', $entityBody["lastname"]);
        $query->bindValue(':email', $entityBody["email"]);
        $query->bindValue(':phone', $entityBody["phone"]);
        $query->bindValue(':profile_picture', $entityBody["profile_picture"]);
        $query->bindValue(':password', $entityBody["password"]);
        $query->execute();

        return new User($entityBody);
    }

    public function putOne(): User
    {
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $query = $this->pdo->prepare(<<<EOT
            UPDATE Users 
            SET firstname = :firstname,
                lastname = :lastname,
                email = :email,
                phone = :phone,
                profile_picture = :profile_picture,
                password = :password
            WHERE id = :id
        EOT);
        $query->bindValue(':id', $entityBody['id']);
        $query->bindValue(':firstname', $entityBody["firstname"]);
        $query->bindValue(':lastname', $entityBody["lastname"]);
        $query->bindValue(':email', $entityBody["email"]);
        $query->bindValue(':phone', $entityBody["phone"]);
        $query->bindValue(':profile_picture', $entityBody["profile_picture"]);
        $query->bindValue(':password', $entityBody["password"]);
        $query->execute();

        return new User($entityBody);
    }
}