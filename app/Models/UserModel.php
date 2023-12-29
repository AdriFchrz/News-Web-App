<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email','password', 'role'];

    public function getAllUsers()
    {
        return $this->findAll();
    }
}
