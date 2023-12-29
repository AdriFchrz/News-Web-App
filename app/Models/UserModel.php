<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email','password', 'role'];

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function deleteUser($id)
    {
        $this->where('id', $id)->delete();
    }

}
