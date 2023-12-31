<?php


namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'category_id', 'author_id', 'created_at', 'updated_at'];

    protected static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getAllNews()
    {
        return $this->findAll();
    }

    // NewsModel.php
    public function getAllNewsByAuthor($authorId)
    {
        return $this->where('author_id', $authorId)->findAll();
    }


    public function getNewsWithAuthorAndCategory($id = null)
    {
        return $this->join('users', 'users.id = news.author_id')
            ->join('categories', 'categories.id = news.category_id')
            ->where('news.id', $id)
            ->first();
    }

    public function getNewsByCategory($category_id)
    {
        return $this->where('category_id', $category_id)->findAll();
    }

    public function searchNewsByTitle($keyword)
    {
        return $this->like('title', $keyword)->findAll();
    }
}