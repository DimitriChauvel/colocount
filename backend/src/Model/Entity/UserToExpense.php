<?php

// Entity of UserToExpense table
namespace App\Model\Entity;

class UserToExpense extends BaseEntity
{
    private string $id;
    private string $user_id;
    private string $expense_id;
    private string $due_amount;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return UserToExpense
     */
    public function setId($id): UserToExpense
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     * @return UserToExpense
     */
    public function setUserId(string $user_id): UserToExpense
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseId(): string
    {
        return $this->expense_id;
    }

    /**
     * @param string $expense_id
     * @return UserToExpense
     */
    public function setExpenseId(string $expense_id): UserToExpense
    {
        $this->expense_id = $expense_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDueAmount(): string
    {
        return $this->due_amount;
    }

    /**
     * @param string $due_amount
     * @return UserToExpense
     */
    public function setDueAmount(string $due_amount): UserToExpense
    {
        $this->due_amount = $due_amount;
        return $this;
    }
}